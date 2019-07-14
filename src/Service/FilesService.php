<?php

/*
 * This file is part of the "Contact list " test project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use App\DTO\ContactDTO;

/**
 * Realise file service.
 *
 * Class FilesService
 */
class FilesService implements FilesServiceInterface
{
    /**
     * Upload dir path.
     *
     * @var string
     */
    private $uploadDirectory;
    private $dirName;

    public function __construct($uploadDirectory, $dirName)
    {
        $this->uploadDirectory = $uploadDirectory;

        $this->dirName = $dirName;
    }

    /**
     * Upload contact photo if it set.
     *
     * @param ContactDTO $contactDTO
     *
     * @return ContactDTO
     */
    public function uploadContactPhotoIfItSet(ContactDTO $contactDTO): ContactDTO
    {
        $file = $contactDTO->getFileToUpload();

        if ($file) {
            $ext = $file->getClientOriginalExtension();
            $fileName = uniqid().'.'.$ext;
            $filePath = date('Y-m-d').'/';

            $file->move($this->uploadDirectory.$filePath, $fileName);

            $contactDTO->setPhoto($this->dirName.$filePath.$fileName);
        }

        return $contactDTO;
    }
}

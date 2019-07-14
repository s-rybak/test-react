<?php


namespace App\Service;

use App\DTO\ContactDTO;

/**
 * Realise file service
 *
 * Class FilesService
 * @package App\Service
 */
class FilesService implements FilesServiceInterface
{

    /**
     * Upload dir path
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
     * Upload contact photo if it set
     *
     * @param ContactDTO $contactDTO
     * @return ContactDTO
     */
    public function uploadContactPhotoIfItSet(ContactDTO $contactDTO): ContactDTO
    {

        $file = $contactDTO->getFileToUpload();

        if ($file) {

            $ext = $file->getClientOriginalExtension();
            $fileName = uniqid() . '.' . $ext;
            $filePath = $this->dirName . date("Y-m-d") . '/';

            $file->move($this->uploadDirectory . $filePath, $fileName);

            $contactDTO->setPhoto($filePath . $fileName);

        }

        return $contactDTO;

    }
}
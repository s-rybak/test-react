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
 * Describe file service.
 *
 * Interface FilesServiceInterface
 */
interface FilesServiceInterface
{
    /**
     * Upload contact photo if it set.
     *
     * @param ContactDTO $contactDTO
     *
     * @return ContactDTO
     */
    public function uploadContactPhotoIfItSet(ContactDTO $contactDTO): ContactDTO;
}

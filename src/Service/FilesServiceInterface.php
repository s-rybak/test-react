<?php


namespace App\Service;

use App\DTO\ContactDTO;

/**
 * Describe file service
 *
 * Interface FilesServiceInterface
 * @package App\Service
 */
interface FilesServiceInterface
{

    /**
     * Upload contact photo if it set
     *
     * @param ContactDTO $contactDTO
     * @return ContactDTO
     */
    public function uploadContactPhotoIfItSet(ContactDTO $contactDTO): ContactDTO;

}
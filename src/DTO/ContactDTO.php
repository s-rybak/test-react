<?php

namespace App\DTO;

use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\HttpFoundation\FileBag;

/**
 * Realise contact entity DTO
 *
 * Class ContactDTO
 */
class ContactDTO
{
    /**
     * Contact id
     *
     * @var int|null
     */
    private $id;

    /**
     * Contact name
     *
     * @var string
     */
    private $name;

    /**
     * Contact phone
     *
     * @var string
     */
    private $phone;

    /**
     * Contact info
     *
     * @var string|null
     */
    private $info;

    /**
     * Contact photo
     *
     * @var string|null
     */
    private $photo;

    /**
     * @var UploadedFile|null
     */
    private $fileToUpload;

    /**
     * @param int|null $id
     * @return ContactDTO
     */
    public function setId(?int $id): ContactDTO
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param string $name
     * @return ContactDTO
     */
    public function setName(string $name): ContactDTO
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $phone
     * @return ContactDTO
     */
    public function setPhone(string $phone): ContactDTO
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string|null $info
     * @return ContactDTO
     */
    public function setInfo(?string $info): ContactDTO
    {
        $this->info = $info;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getInfo(): ?string
    {
        return $this->info;
    }

    /**
     * @param string|null $photo
     * @return ContactDTO
     */
    public function setPhoto(?string $photo): ContactDTO
    {
        $this->photo = $photo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    /**
     * @param UploadedFile|null $fileToUpload
     * @return ContactDTO
     */
    public function setFileToUpload(?UploadedFile $fileToUpload): ContactDTO
    {
        $this->fileToUpload = $fileToUpload;
        return $this;
    }

    /**
     * @return UploadedFile|null
     */
    public function getFileToUpload(): ?UploadedFile
    {
        return $this->fileToUpload;
    }

}
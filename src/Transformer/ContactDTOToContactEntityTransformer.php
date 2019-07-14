<?php


namespace App\Transformer;

use App\DTO\ContactDTO;
use App\Entity\Contact;

/**
 * Transform contact dto to contact entity
 *
 * Class ContactDTOToContactEntityTransformer
 * @package App\Transformer
 */
class ContactDTOToContactEntityTransformer
{


    /**
     * @var ContactDTO
     */
    private $contactDTO;

    public function __construct(ContactDTO $contactDTO)
    {

        $this->contactDTO = $contactDTO;

    }

    /**
     * Transform data
     *
     * @param Contact|null $contact
     * @return Contact
     */
    public function transform(Contact $contact = null): Contact
    {

        return ($contact ?? new Contact())
            ->setPhoto($this->contactDTO->getPhoto() === null ? $contact->getPhoto() : $this->contactDTO->getPhoto())
            ->setInfo($this->contactDTO->getInfo() === null ? $contact->getInfo() : $this->contactDTO->getInfo())
            ->setPhone($this->contactDTO->getPhone() ? $this->contactDTO->getPhone() : $contact->getPhone())
            ->setName($this->contactDTO->getName() ? $this->contactDTO->getName() : $contact->getName());

    }

}
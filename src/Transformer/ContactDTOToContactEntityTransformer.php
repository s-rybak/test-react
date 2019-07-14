<?php

/*
 * This file is part of the "Contact list " test project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Transformer;

use App\DTO\ContactDTO;
use App\Entity\Contact;

/**
 * Transform contact dto to contact entity.
 *
 * Class ContactDTOToContactEntityTransformer
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
     * Transform data.
     *
     * @param Contact|null $contact
     *
     * @return Contact
     */
    public function transform(Contact $contact = null): Contact
    {
        return ($contact ?? new Contact())
            ->setPhoto(null === $this->contactDTO->getPhoto() && $contact ? $contact->getPhoto() : $this->contactDTO->getPhoto())
            ->setInfo(null === $this->contactDTO->getInfo() ? $contact->getInfo() : $this->contactDTO->getInfo())
            ->setPhone($this->contactDTO->getPhone() ? $this->contactDTO->getPhone() : $contact->getPhone())
            ->setName($this->contactDTO->getName() ? $this->contactDTO->getName() : $contact->getName());
    }
}

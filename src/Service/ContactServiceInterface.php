<?php


namespace App\Service;

use App\DTO\ContactDTO;
use App\Entity\Contact;

/**
 * Describe contact service
 *
 * Interface ContactServiceInterface
 * @package App\Service
 */
interface ContactServiceInterface extends BasicEntityServiceInterface
{

    /**
     * Create new entity
     *
     * @param $entityDTO
     * @return Contact
     */
    public function create(ContactDTO $entityDTO): Contact;

    /**
     * Update entity
     *
     * @param Contact $contact
     * @param ContactDTO $data new data
     * @return Contact
     */
    public function update(Contact $contact, ContactDTO $data): Contact;


}
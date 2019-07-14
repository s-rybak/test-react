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
     * @param $entity
     * @return Contact
     */
    public function update(ContactDTO $entity): Contact;


}
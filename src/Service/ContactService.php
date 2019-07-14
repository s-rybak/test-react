<?php


namespace App\Service;

use App\Entity\Contact;
use App\Repository\BasicRepositoryInterface;
use App\Repository\BasicRepositoryTrait;
use App\Repository\ContactRepositoryInterface;
use App\DTO\ContactDTO;

/**
 * Implements Contact service
 *
 * Class ContactService
 * @package App\Service
 */
class ContactService implements ContactServiceInterface
{

    use BasicEntityServiceTrait;
    /**
     * @var ContactRepositoryInterface
     */
    private $repository;

    public function __construct(ContactRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Create new entity
     *
     * @param $entityDTO
     * @return Contact
     */
    public function create(ContactDTO $entityDTO): Contact
    {
        // TODO: Implement create() method.
    }

    /**
     * Update entity
     *
     * @param $entity
     * @return Contact
     */
    public function update(ContactDTO $entity): Contact
    {
        // TODO: Implement update() method.
    }
}
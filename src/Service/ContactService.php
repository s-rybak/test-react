<?php


namespace App\Service;

use App\Entity\Contact;
use App\Repository\BasicRepositoryInterface;
use App\Repository\BasicRepositoryTrait;
use App\Repository\ContactRepositoryInterface;
use App\DTO\ContactDTO;
use App\Transformer\ContactDTOToContactEntityTransformer;

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
    /**
     * @var FilesServiceInterface
     */
    private $filesService;

    public function __construct(
        ContactRepositoryInterface $repository,
        FilesServiceInterface $filesService
    )
    {
        $this->repository = $repository;
        $this->filesService = $filesService;
    }

    /**
     * Create new entity
     *
     * @param $entityDTO
     * @return Contact
     */
    public function create(ContactDTO $entityDTO): Contact
    {

        return $this->repository->save(
            (new ContactDTOToContactEntityTransformer(
                $this->filesService->uploadContactPhotoIfItSet($entityDTO)
            ))
                ->transform()
        );

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
<?php

/*
 * This file is part of the "Contact list " test project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use App\Entity\Contact;
use App\Repository\ContactRepositoryInterface;
use App\DTO\ContactDTO;
use App\Transformer\ContactDTOToContactEntityTransformer;

/**
 * Implements Contact service.
 *
 * Class ContactService
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
    ) {
        $this->repository = $repository;
        $this->filesService = $filesService;
    }

    /**
     * Create new entity.
     *
     * @param $entityDTO
     *
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
     * Update entity.
     *
     * @param Contact    $contact
     * @param ContactDTO $data
     *
     * @return Contact
     */
    public function update(Contact $contact, ContactDTO $data): Contact
    {
        return $this->repository->save(
            (new ContactDTOToContactEntityTransformer(
                $this->filesService->uploadContactPhotoIfItSet($data)
            ))
                ->transform($contact)
        );
    }
}

<?php

/*
 * This file is part of the "Contact list " test project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use App\Repository\BasicRepositoryInterface;
use App\DTO\RepositoryQueriesDTO;

/**
 * Realise basic entity service methods.
 *
 * Trait BasicEntityServiceTrait
 *
 * @property BasicRepositoryInterface $repository
 */
trait BasicEntityServiceTrait
{
    /**
     * Remove entity.
     *
     * @param $entity
     */
    public function remove($entity): void
    {
        $this->repository->remove($entity);
    }

    /**
     * Get entities count.
     *
     * @return int
     */
    public function count(): int
    {
        return $this->repository->length();
    }

    /**
     * Get all entities.
     *
     * @return iterable
     */
    public function all(): iterable
    {
        return $this->repository->all();
    }

    /**
     * Get entities slice.
     *
     * @param int                       $page
     * @param int                       $perPage
     * @param RepositoryQueriesDTO|null $query
     *
     * @return iterable
     */
    public function list(int $page, int $perPage = 10, ?RepositoryQueriesDTO $query = null): iterable
    {
        return $this->repository->list($page, $perPage, $query);
    }

    /**
     * Get entity by id.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function getById(int $id)
    {
        return $this->repository->getById($id);
    }
}

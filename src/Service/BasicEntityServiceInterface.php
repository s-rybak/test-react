<?php

/*
 * This file is part of the "Contact list " test project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use App\DTO\RepositoryQueriesDTO;

/**
 * Describe basic entity service methods.
 *
 * Interface BasicEntityServiceInterface
 */
interface BasicEntityServiceInterface
{
    /**
     * Remove entity.
     *
     * @param $entity
     */
    public function remove($entity): void;

    /**
     * Get entities count.
     *
     * @return int
     */
    public function count(): int;

    /**
     * Get all entities.
     *
     * @return iterable
     */
    public function all(): iterable;

    /**
     * Get entities slice.
     *
     * @param int                       $page
     * @param int                       $perPage
     * @param RepositoryQueriesDTO|null $query
     *
     * @return iterable
     */
    public function list(int $page, int $perPage = 10, ?RepositoryQueriesDTO $query = null): iterable;

    /**
     * Get entity by id.
     *
     * @param int $id
     *
     * @return mixed
     */
    public function getById(int $id);
}

<?php

/*
 * This file is part of the "Contact list " test project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Repository;

use RepositoryQueriesDTO;

/**
 * Provides standard save read
 * remove functionality.
 *
 * Interface BasicRepositoryInterface
 * @package App\Repository
 */
interface BasicRepositoryInterface
{

    /**
     * Save entity
     *
     * @param $entity
     * @return mixed
     */
    public function save($entity);

    /**
     * Remove entity
     *
     * @param $entity
     * @return void
     */
    public function remove($entity): void;

    /**
     * Get entities count
     * @return int
     */
    public function length(): int;

    /**
     * Get all entities
     *
     * @return iterable
     */
    public function all(): iterable;

    /**
     * Get entities slice
     *
     * @param int $page
     * @param int $perPage
     * @param RepositoryQueriesDTO|null $query
     * @return iterable
     */
    public function list(int $page, int $perPage = 10, ?RepositoryQueriesDTO $query = null): iterable;

}

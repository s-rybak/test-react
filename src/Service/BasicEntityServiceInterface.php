<?php


namespace App\Service;

use App\Repository\BasicRepositoryInterface;
use RepositoryQueriesDTO;

/**
 * Describe basic entity service methods
 *
 * Interface BasicEntityServiceInterface
 * @package App\Service
 */
interface BasicEntityServiceInterface
{
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
    public function count(): int;

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
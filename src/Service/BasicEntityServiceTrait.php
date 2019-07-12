<?php


namespace App\Service;

use App\Repository\BasicRepositoryInterface;
use RepositoryQueriesDTO;

/**
 * Realise basic entity service methods
 *
 * Trait BasicEntityServiceTrait
 * @package App\Service
 * @property BasicRepositoryInterface $repository
 */
trait BasicEntityServiceTrait
{

    /**
     * Remove entity
     *
     * @param $entity
     * @return void
     */
    public function remove($entity): void
    {

        $this->repository->remove($entity);

    }

    /**
     * Get entities count
     * @return int
     */
    public function count(): int
    {

        return $this->repository->length();

    }

    /**
     * Get all entities
     *
     * @return iterable
     */
    public function all(): iterable
    {

        return $this->repository->all();

    }

    /**
     * Get entities slice
     *
     * @param int $page
     * @param int $perPage
     * @param RepositoryQueriesDTO|null $query
     * @return iterable
     */
    public function list(int $page, int $perPage = 10, ?RepositoryQueriesDTO $query = null): iterable
    {

        return $this->repository->list($page, $perPage, $query);

    }

}
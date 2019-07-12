<?php


namespace App\Repository;

use RepositoryQueriesDTO;

/**
 * Realise basic repository functions
 *
 * Trait BasicRepositoryTrait
 * @package App\Repository
 */
trait BasicRepositoryTrait
{

    /**
     * Save entity
     *
     * @param $entity
     * @return mixed
     */
    public function save($entity)
    {
        $em = $this->getEntityManager();
        $em->persist($entity);
        $em->flush();

        return $entity;
    }

    /**
     * Remove entity
     *
     * @param $entity
     * @return void
     */
    public function remove($entity): void
    {
        $em = $this->getEntityManager();
        $em->remove($entity);
        $em->flush();
    }

    /**
     * Get entities count
     * @return int
     */
    public function length(): int
    {
        $qb = $this->createQueryBuilder('a');
        $qb->select('COUNT(a)');

        return intval($qb->getQuery()->getSingleScalarResult());
    }

    /**
     * Get all entities
     *
     * @return iterable
     */
    public function all(): iterable
    {
        return $this->findAll();
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
        $qb = $this->createQueryBuilder('t');

        if (null !== $query) {

            foreach ($query->getQueries() as $i => $queryDTO) {

                $qb->where("t.{$queryDTO->getColumn()} {$queryDTO->getExpr()} :{$i}");
                $qb->setParameter($i, $queryDTO->getValue());

            }

        }

        return $qb
            ->getQuery()
            ->setMaxResults($perPage)
            ->setFirstResult(($page - 1) * $perPage)
            ->execute();
    }

}
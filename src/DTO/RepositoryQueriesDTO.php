<?php

namespace App\DTO;

/**
 * Custom simple queries
 *
 * Class RepositoryQueriesDTO
 */
class RepositoryQueriesDTO
{

    /**
     * All added queries
     *
     * @var RepositoryQueryDTO[]
     */
    private $queries;

    /**
     * Add new query
     *
     * @param string $column
     * @param string $expr
     * @param $value
     * @return RepositoryQueriesDTO
     */
    public function addQuery(string $column, string $expr, $value = null): self
    {

        $this->queries[] = (new RepositoryQueryDTO())
            ->setColumn($column)
            ->setExpr($value ? $expr : "=")
            ->setValue($value ?? $expr);

        return $this;

    }

    /**
     * Get all seed queries
     *
     * @return RepositoryQueryDTO[]
     */
    public function getQueries(): array
    {
        return $this->queries;
    }

}
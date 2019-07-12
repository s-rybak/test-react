<?php

namespace App\DTO;

/**
 * Custom simple query
 *
 * Class RepositoryQueryDTO
 */
class RepositoryQueryDTO
{

    /**
     * Query column
     *
     * @var string
     */
    private $column;
    /**
     * Query expression
     *
     * @var string
     */
    private $expr;
    /**
     * Query value
     *
     * @var mixed
     */
    private $value;

    /**
     * @param string $column
     * @return RepositoryQueryDTO
     */
    public function setColumn(string $column): RepositoryQueryDTO
    {
        $this->column = $column;
        return $this;
    }

    /**
     * @return string
     */
    public function getColumn(): string
    {
        return $this->column;
    }

    /**
     * @param string $expr
     * @return RepositoryQueryDTO
     */
    public function setExpr(string $expr): RepositoryQueryDTO
    {
        $this->expr = $expr;
        return $this;
    }

    /**
     * @return string
     */
    public function getExpr(): string
    {
        return $this->expr;
    }

    /**
     * @param mixed $value
     * @return RepositoryQueryDTO
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

}
<?php

namespace App\Api\DTO;

use App\Api\Entity\ApiEntityInterface;

/**
 * Realise entities pack response options DTO
 *
 * Class EntitiesPackDTO
 * @package App\Api\DTO
 */
class EntitiesPackDTO
{

    /**
     * @var ApiEntityInterface[]
     */
    private $entities;
    /**
     * @var integer|null
     */
    private $total;
    /**
     * @var integer|null
     */
    private $page;
    /**
     * @var integer|null
     */
    private $perPage;

    /**
     * @param ApiEntityInterface[] $entities
     * @return EntitiesPackDTO
     */
    public function setEntities(iterable $entities): EntitiesPackDTO
    {
        $this->entities = $entities;
        return $this;
    }

    /**
     * @return ApiEntityInterface[]
     */
    public function getEntities(): iterable
    {
        return $this->entities;
    }

    /**
     * @param int|null $total
     * @return EntitiesPackDTO
     */
    public function setTotal(?int $total): EntitiesPackDTO
    {
        $this->total = $total;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getTotal(): ?int
    {
        return $this->total;
    }

    /**
     * @param int|null $page
     * @return EntitiesPackDTO
     */
    public function setPage(?int $page): EntitiesPackDTO
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPage(): ?int
    {
        return $this->page;
    }

    /**
     * @param int|null $perPage
     * @return EntitiesPackDTO
     */
    public function setPerPage(?int $perPage): EntitiesPackDTO
    {
        $this->perPage = $perPage;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getPerPage(): ?int
    {
        return $this->perPage;
    }

}
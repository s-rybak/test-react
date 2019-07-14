<?php

/*
 * This file is part of the "Gen RabbitMQ test" project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Api\Transformer;

/**
 * Transorm entity to resource interface.
 */
interface ResourceTransformerInterface
{
    /**
     * Get entity type.
     *
     * @return string
     */
    public function getType(): string;

    /**
     * Gets entity attributes.
     *
     * @param $entity
     *
     * @return iterable
     */
    public function getAttributes($entity): iterable;

    /**
     * Gets entity links.
     *
     * @param $entity
     *
     * @return iterable
     */
    public function getEntityLinks($entity = null): iterable;

    /**
     * Gets entity links.
     *
     * @param int $page
     * @param int $perPage
     * @param bool $next
     * @return iterable
     */
    public function getEntitiesLinks(int $page = null, int $perPage = 10, bool $next = false): iterable;
}

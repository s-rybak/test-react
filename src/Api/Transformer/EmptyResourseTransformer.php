<?php

/*
 * This file is part of the "Gen RabbitMQ test" project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Api\Transformer;

class EmptyResourseTransformer implements ResourceTransformerInterface
{
    /**
     * Get entity type.
     *
     * @return string
     */
    public function getType(): string
    {
        return 'no_resource';
    }

    /**
     * Gets entity attributes.
     *
     * @param $entity
     *
     * @return iterable
     */
    public function getAttributes($entity): iterable
    {
        return [];
    }

    /**
     * Gets entity links.
     *
     * @param $entity
     *
     * @return iterable
     */
    public function getEntityLinks($entity = null): iterable
    {
        return [
            'api_docs' => '/docs/api',
        ];
    }

    /**
     * Gets entity links.
     *
     * @param null $page
     * @param int $perPage
     * @return iterable
     */
    public function getEntitiesLinks(int $page = null, int $perPage = 10, bool $next = false): iterable
    {
        return [
            'api_docs' => '/docs/api',
        ];
    }
}

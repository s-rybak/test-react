<?php

/*
 * This file is part of the "Gen RabbitMQ test" project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Api\Transformer;

class ContactResourseTransformer implements ResourceTransformerInterface
{
    /**
     * Get entity type.
     *
     * @return string
     */
    public function getType(): string
    {
        return 'contact';
    }

    /**
     * Gets entity attributes.
     *
     * @param $entity
     *
     * @return array
     */
    public function getAttributes($entity): array
    {
        return [
            'name' => $entity->getName(),
            'phone' => $entity->getPhone(),
            'info' => $entity->getInfo(),
            'photo' => $entity->getPhoto(),
        ];
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
            'all' => [
                'rel' => 'all contacts',
                'href' => '/api/getList',
            ],
            'add' => [
                'rel' => 'add new contact',
                'href' => "/api/add/",
            ],
            'edit' => [
                'rel' => 'edit contact',
                'href' => "/api/edit/{$entity->getId()}",
            ],
            'delete' => [
                'rel' => 'delete contact',
                'href' => "/api/delete/{$entity->getId()}",
            ]
        ];
    }

    /**
     * Gets entity links.
     *
     * @param int $page
     * @param int $perPage
     * @param bool $next
     * @return iterable
     */
    public function getEntitiesLinks(int $page = null, int $perPage = 10, bool $next = false): iterable
    {

        $links = [
            'self' => [
                'href' => "/api/getList?page={$page}&perpage={$perPage}",
            ]
        ];

        $page = $page ? $page + 1 : 2;

        if ($next) {

            $links['next'] = [
                'href' => "/api/getList?page={$page}&perpage={$perPage}",
            ];

        }

        if ($page > 2) {

            $page -= 2;

            $links['prev'] = [
                'href' => "/api/getList?page={$page}&perpage={$perPage}",
            ];

        }

        return $links;
    }
}

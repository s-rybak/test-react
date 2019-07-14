<?php

/*
 * This file is part of the "Contact list " test project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Service;

use App\DTO\ContactDTO;
use App\Entity\Contact;

/**
 * Describe contact service.
 *
 * Interface ContactServiceInterface
 */
interface ContactServiceInterface extends BasicEntityServiceInterface
{
    /**
     * Create new entity.
     *
     * @param $entityDTO
     *
     * @return Contact
     */
    public function create(ContactDTO $entityDTO): Contact;

    /**
     * Update entity.
     *
     * @param Contact    $contact
     * @param ContactDTO $data    new data
     *
     * @return Contact
     */
    public function update(Contact $contact, ContactDTO $data): Contact;
}

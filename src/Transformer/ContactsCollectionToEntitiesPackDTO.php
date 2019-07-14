<?php

namespace App\Transformer;

use App\Api\DTO\EntitiesPackDTO;
use App\Entity\Contact;

/**
 * Transform Contacts array/iterable to EntitiesPackDTO
 *
 * Class ContactsCollectionToEntitiesPackDTO
 * @package App\Transformer
 */
class ContactsCollectionToEntitiesPackDTO
{

    /**
     * @var Contact[]
     */
    private $contacts;
    /**
     * @var integer|string
     */
    private $page;
    /**
     * @var integer|string
     */
    private $perPage;


    public function __construct(iterable $contacts, $page = 1, $perPage = 10)
    {

        $this
            ->setContacts($contacts)
            ->setPage(intval($page))
            ->setPerPage(intval($perPage));

    }

    public function transform()
    {

        return (new EntitiesPackDTO())
            ->setPerPage($this->perPage)
            ->setPage($this->page)
            ->setEntities($this->contacts)
            ->setTotal(count($this->contacts));

    }

    /**
     * @param Contact[] $contacts
     * @return ContactsCollectionToEntitiesPackDTO
     */
    public function setContacts(iterable $contacts): ContactsCollectionToEntitiesPackDTO
    {
        $this->contacts = $contacts;
        return $this;
    }

    /**
     * @param int $page
     * @return ContactsCollectionToEntitiesPackDTO
     */
    public function setPage(int $page): ContactsCollectionToEntitiesPackDTO
    {
        $this->page = $page;
        return $this;
    }

    /**
     * @param int $perPage
     * @return ContactsCollectionToEntitiesPackDTO
     */
    public function setPerPage(int $perPage): ContactsCollectionToEntitiesPackDTO
    {
        $this->perPage = $perPage;
        return $this;
    }

}
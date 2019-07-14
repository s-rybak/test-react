<?php


namespace App\Transformer;

use App\DTO\ContactDTO;

/**
 * Transform valid request data array to ContactDTO
 *
 * Class ArrayToContactDTOTransformer
 * @package App\Transformer
 */
class ArrayToContactDTOTransformer
{

    /**
     * @var array
     */
    private $data;

    public function __construct(array $data)
    {

        $this->setData($data);

    }

    public function transform(): ContactDTO
    {

        return (new ContactDTO())
            ->setName($this->data['name'])
            ->setPhone($this->data['phone'])
            ->setInfo($this->data['info'] ?? null)
            ->setId($this->data['id'] ?? null)
            ->setPhoto(key_exists('photo', $this->data) && is_string($this->data['photo']) ? $this->data['photo'] : null)
            ->setFileToUpload(key_exists('photo', $this->data) && !is_string($this->data['photo']) ? $this->data['photo'] : null);

    }

    /**
     * @param array $data
     * @return ArrayToContactDTOTransformer
     */
    public function setData(array $data): ArrayToContactDTOTransformer
    {
        $this->data = $data;
        return $this;
    }

}
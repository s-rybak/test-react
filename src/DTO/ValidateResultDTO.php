<?php


namespace App\DTO;

/**
 * Contains validate process result
 *
 * Class ValidateResultDTO
 * @package App\DTO
 */
class ValidateResultDTO
{

    /**
     * @var bool
     */
    private $valid;
    /**
     * @var string
     */
    private $message;
    /**
     * @var array
     */
    private $data;

    /**
     * @param bool $valid
     * @return ValidateResultDTO
     */
    public function setValid(bool $valid): ValidateResultDTO
    {
        $this->valid = $valid;
        return $this;
    }

    /**
     * @return bool
     */
    public function isValid(): bool
    {
        return $this->valid;
    }

    /**
     * @param string $message
     * @return ValidateResultDTO
     */
    public function setMessage(string $message): ValidateResultDTO
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }

    /**
     * @param array $data
     * @return ValidateResultDTO
     */
    public function setData(array $data): ValidateResultDTO
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return array
     */
    public function getData(): array
    {
        return $this->data;
    }

}
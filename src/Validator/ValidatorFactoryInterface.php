<?php


namespace App\Validator;

use App\Exceptions\ValidatorNotFoundException;

/**
 * Describe validator factory interface
 *
 * Interface ValidatorFactoryInterface
 * @package App\Validator
 */
interface ValidatorFactoryInterface
{

    /**
     * Get validator
     *
     * @param string $validator
     * @return mixed
     * @throws ValidatorNotFoundException
     */
    public function get(string $validator): BasicValidatorInterface;

    /**
     * Get all loaded validators
     *
     * @return array
     */
    public function registeredValidators(): array;

}
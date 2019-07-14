<?php

namespace App\Validator;

use App\DTO\ValidateResultDTO;

/**
 * Describe validator
 *
 * Interface RequestValidatorInterface
 */
interface BasicValidatorInterface
{

    /**
     * Get validator name
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Validate data
     *
     * @param $data
     * @return ValidateResultDTO
     */
    public function validate($data): ValidateResultDTO;

}
<?php

/*
 * This file is part of the "Contact list " test project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Validator;

use App\DTO\ValidateResultDTO;

/**
 * Describe validator.
 *
 * Interface RequestValidatorInterface
 */
interface BasicValidatorInterface
{
    /**
     * Get validator name.
     *
     * @return string
     */
    public function getName(): string;

    /**
     * Validate data.
     *
     * @param $data
     *
     * @return ValidateResultDTO
     */
    public function validate($data): ValidateResultDTO;
}

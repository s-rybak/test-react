<?php

/*
 * This file is part of the "Contact list " test project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Validator\Factory;

use App\Exceptions\ValidatorNotFoundException;
use App\Validator\BasicValidatorInterface;

/**
 * Describe validator factory interface.
 *
 * Interface ValidatorFactoryInterface
 */
interface ValidatorFactoryInterface
{
    /**
     * Get validator.
     *
     * @param string $validator
     *
     * @return mixed
     *
     * @throws ValidatorNotFoundException
     */
    public function get(string $validator): BasicValidatorInterface;

    /**
     * Get all loaded validators.
     *
     * @return array
     */
    public function registeredValidators(): array;
}

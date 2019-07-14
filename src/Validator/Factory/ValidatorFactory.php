<?php

/*
 * This file is part of the "Contact list " test project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Validator\Factory;

use App\Exceptions\ValidatorNotFoundException;
use App\Validator\AddContactRequestValidatorInterface;
use App\Validator\BasicValidatorInterface;
use App\Validator\GetListValidatorInterface;
use App\Validator\UpdateContactRequestValidatorInterface;

/**
 * Realise validator factory.
 *
 * Class ValidatorFactory
 */
class ValidatorFactory implements ValidatorFactoryInterface
{
    /**
     * All validators.
     *
     * @var array
     */
    private $validators = [];

    public function __construct(
        GetListValidatorInterface $getListValidator,
        AddContactRequestValidatorInterface $addContactRequestValidator,
        UpdateContactRequestValidatorInterface $contactRequestValidator
    ) {
        $this->addValidator($getListValidator);
        $this->addValidator($addContactRequestValidator);
        $this->addValidator($contactRequestValidator);
    }

    /**
     * Get validator.
     *
     * @param string $validator
     *
     * @return mixed
     *
     * @throws ValidatorNotFoundException
     */
    public function get(string $validator): BasicValidatorInterface
    {
        if (key_exists($validator, $this->validators)) {
            return $this->validators[$validator];
        }

        throw new ValidatorNotFoundException("Validator {$validator} not registered");
    }

    /**
     * Get all loaded validators.
     *
     * @return array
     */
    public function registeredValidators(): array
    {
        return array_keys($this->validators);
    }

    /**
     * Add validator.
     *
     * @param BasicValidatorInterface $basicValidator
     */
    private function addValidator(BasicValidatorInterface $basicValidator)
    {
        $this->validators[$basicValidator->getName()] = $basicValidator;
    }
}

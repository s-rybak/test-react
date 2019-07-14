<?php


namespace App\Validator;

use App\Exceptions\ValidatorNotFoundException;

/**
 * Realise validator factory
 *
 * Class ValidatorFactory
 * @package App\Validator
 */
class ValidatorFactory implements ValidatorFactoryInterface
{

    /**
     * All validators
     *
     * @var array
     */
    private $validators = [];

    public function __construct(
        GetListValidatorInterface $getListValidator
    )
    {

        $this->addValidator($getListValidator);

    }

    /**
     * Get validator
     *
     * @param string $validator
     * @return mixed
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
     * Get all loaded validators
     *
     * @return array
     */
    public function registeredValidators(): array
    {

        return array_keys($this->validators);

    }

    /**
     * Add validator
     *
     * @param BasicValidatorInterface $basicValidator
     */
    private function addValidator(BasicValidatorInterface $basicValidator)
    {

        $this->validators[$basicValidator->getName()] = $basicValidator;


    }
}
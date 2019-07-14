<?php


namespace App\Validator;


use App\DTO\ValidateResultDTO;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Implements basic abstract validator
 *
 * Class BasicValidatorAbstract
 * @package App\Validator
 */
abstract class BasicValidatorAbstract implements BasicValidatorInterface
{

    /**
     * @var ValidatorInterface
     */
    private $validator;

    /**
     * Get validator collection
     *
     * @return Collection
     */
    abstract function getConstraints(): Collection;


    public function __construct(ValidatorInterface $validator)
    {

        $this->validator = $validator;

    }

    /**
     * Get defaults values
     *
     * @return array
     */
    public function getDefaults(): array
    {

        return [];

    }

    /**
     * Get validator name
     *
     * @return string
     */
    public function getName(): string
    {

        $path = explode('\\', static::class);

        return array_pop($path);

    }

    /**
     * Validate data
     *
     * @param $data
     * @return ValidateResultDTO
     */
    public function validate($data): ValidateResultDTO
    {

        $constraints = $this->getConstraints();

        $violation = $this->validator->validate($data, $constraints);

        $res = new ValidateResultDTO();

        if (count($violation) > 0) {

            $res->setValid(false);
            $msgs = [];

            foreach ($violation as $item) {

                $msgs[] = $item->getMessage();

            }

            $res->setMessage(implode("\r\n", $msgs));
            $res->setData([]);

        } else {

            $res->setValid(true);
            $res->setMessage("Data valid");
            $resData = $this->getDefaults();

            foreach ($constraints->fields as $key => $val) {

                if (isset($data[$key])) {

                    $resData[$key] = $data[$key];

                }


            }

            $res->setData($resData);

        }

        return $res;

    }
}
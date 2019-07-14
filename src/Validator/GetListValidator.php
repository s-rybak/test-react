<?php


namespace App\Validator;


use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Optional;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Type;

class GetListValidator extends BasicValidatorAbstract implements GetListValidatorInterface
{

    /**
     * Get validator collection
     *
     * @return Collection
     */
    function getConstraints(): Collection
    {

        return new Collection([
            'page' => new Optional([
                new Positive()
            ]),
            'perpage' => new Optional([
                new Positive()
            ])
        ]);

    }

    /**
     * Request defaults values
     *
     * @return array
     */
    public function getDefaults(): array
    {

        return [
            'page' => 1,
            'perpage' => 10
        ];

    }
}
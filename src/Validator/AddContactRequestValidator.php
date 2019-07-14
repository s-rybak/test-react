<?php


namespace App\Validator;

use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Optional;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Required;
use Symfony\Component\Validator\Constraints\Type;

class AddContactRequestValidator extends BasicValidatorAbstract implements AddContactRequestValidatorInterface
{

    /**
     * Get validator collection
     *
     * @return Collection
     */
    function getConstraints(): Collection
    {

        return new Collection([
            'name' => new Required([
                new Type("string"),
                new NotBlank(),
                new Length(['min' => 3, 'max' => 255])
            ]),
            'phone' => new Required([
                new Type("string"),
                new NotBlank(),
                new Length(['min' => 3, 'max' => 255]),
                new Regex([
                    'pattern' => '/^[0-9()\-\s\+]+$/',
                    'message' => "You can use '+','(',')', symbols and numbers"
                ])

            ]),
            'info' => new Optional([
                new Type("string"),
            ]),
            'photo' => new Optional([
                new Image([
                    'maxSize' => '5M',
                ])
            ]),
        ]);

    }

    /**
     * Request defaults values
     *
     * @return array
     */
    public function getDefaults(): array
    {

        return [];

    }
}
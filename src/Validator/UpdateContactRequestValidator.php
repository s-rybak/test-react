<?php

/*
 * This file is part of the "Contact list " test project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Validator;

use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Image;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Optional;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Constraints\Type;

class UpdateContactRequestValidator extends BasicValidatorAbstract implements UpdateContactRequestValidatorInterface
{
    /**
     * Get validator collection.
     *
     * @return Collection
     */
    public function getConstraints(): Collection
    {
        return new Collection([
            'name' => new Optional([
                new Type('string'),
                new NotBlank(),
                new Length(['min' => 3, 'max' => 255]),
            ]),
            'phone' => new Optional([
                new Type('string'),
                new NotBlank(),
                new Length(['min' => 3, 'max' => 255]),
                new Regex([
                    'pattern' => '/^[0-9()\-\s\+]+$/',
                    'message' => "You can use '+','(',')', symbols and numbers",
                ]),
            ]),
            'info' => new Optional([
                new Type('string'),
            ]),
            'photo' => new Optional([
                new Image([
                    'maxSize' => '5M',
                ]),
            ]),
        ]);
    }

    /**
     * Request defaults values.
     *
     * @return array
     */
    public function getDefaults(): array
    {
        return [];
    }
}

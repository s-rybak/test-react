<?php

/*
 * This file is part of the "Contact list " test project.
 * (c) Sergey Rybak <srybak007@gmail.com>
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Validator;

use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Validator\Constraints\Optional;
use Symfony\Component\Validator\Constraints\Positive;

class GetListValidator extends BasicValidatorAbstract implements GetListValidatorInterface
{
    /**
     * Get validator collection.
     *
     * @return Collection
     */
    public function getConstraints(): Collection
    {
        return new Collection([
            'page' => new Optional([
                new Positive(),
            ]),
            'perpage' => new Optional([
                new Positive(),
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
        return [
            'page' => 1,
            'perpage' => 10,
        ];
    }
}

<?php

declare(strict_types=1);

namespace Silverback\ApiComponentBundle\Entity;

use Doctrine\Common\Collections\Collection;

interface ValidComponentInterface
{
    public function getValidComponents(): Collection;

    public function addValidComponent(string $component);

    public function removeValidComponent(string $component);
}

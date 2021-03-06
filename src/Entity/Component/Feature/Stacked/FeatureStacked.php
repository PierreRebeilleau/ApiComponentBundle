<?php

declare(strict_types=1);

namespace Silverback\ApiComponentBundle\Entity\Component\Feature\Stacked;

use Doctrine\ORM\Mapping as ORM;
use Silverback\ApiComponentBundle\Entity\Component\Feature\AbstractFeature;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity()
 */
class FeatureStacked extends AbstractFeature
{
    /**
     * @ORM\Column(type="boolean")
     * @Groups({"component", "content"})
     * @var bool
     */
    protected $reverse = false;

    /**
     * @return bool
     */
    public function isReverse(): bool
    {
        return $this->reverse;
    }

    /**
     * @param bool $reverse
     */
    public function setReverse(bool $reverse): void
    {
        $this->reverse = $reverse;
    }
}

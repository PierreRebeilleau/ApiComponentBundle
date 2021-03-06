<?php

declare(strict_types=1);

namespace Silverback\ApiComponentBundle\Entity\Component\Gallery;

use Doctrine\ORM\Mapping as ORM;
use Silverback\ApiComponentBundle\Entity\Component\AbstractComponent;
use Silverback\ApiComponentBundle\Entity\Content\ComponentGroup\ComponentGroup;

/**
 * @ORM\Entity()
 */
class Gallery extends AbstractComponent
{
    public function __construct()
    {
        parent::__construct();
        $this->addValidComponent(GalleryItem::class);
        $this->addComponentGroup(new ComponentGroup($this));
    }

    public function onDeleteCascade(): bool
    {
        return true;
    }
}

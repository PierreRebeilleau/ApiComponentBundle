<?php

declare(strict_types=1);

namespace Silverback\ApiComponentBundle\Entity\Core;

use ApiPlatform\Core\Annotation\ApiResource;
use Doctrine\ORM\Mapping as ORM;

/**
 * @author Daniel West <daniel@silverback.is>
 * @ApiResource
 * @ORM\Entity
 * @ORM\AssociationOverrides({
 *     @ORM\AssociationOverride(name="routes", inversedBy="pageData")
 * })
 */
class PageData extends AbstractPage implements PageDataInterface
{
    /*
     * Extend this class for pages where the same page template should be used for multiple entities.
     * A good example is an article page. You would create an Article entity in your project that extends this class.
     * That article can then be accessed via a route on the API and the data in this class will override whatever is in the template.
     * You can create a ComponentPopulator service to use the data provided here to populate the template. You could update text
     * within entities with interpolation, or add new components on the fly depending on what you have defined here. It is a very flexible
     * way of generating different layouts depending on the data in your entity.
     */
}

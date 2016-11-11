<?php
/**
 * Created by PhpStorm.
 * User: peter.self
 * date: 08/11/16
 */

namespace QueueBundle\Entity\Customer;

use Doctrine\ORM\Mapping\InheritanceType;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\DiscriminatorColumn;
use Doctrine\ORM\Mapping\DiscriminatorMap;

/**
 * @Entity
 * @InheritanceType("JOINED")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"citizen" = "Citizen",
 *      "organisation" = "Organisation",
 *      "anonymous" = "Anonymous"
 *     })
 */
abstract class Customer
    implements CustomerInterface
{

    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @return string
     */
    abstract public function getDisplayName();

    /**
     * @return string
     */
    abstract public function getType();

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

}
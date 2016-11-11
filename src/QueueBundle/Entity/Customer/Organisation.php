<?php
/**
 * Created by PhpStorm.
 * User: peter.self
 * Date: 08/11/16
 */

namespace QueueBundle\Entity\Customer;

use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;

/**
 * @Entity
 * @Table(name="queue_customer_organisation")
 */
class Organisation
    extends Customer
{

    const TYPE = 'Organisation';

    /**
     * @Column(type="string", length=200)
     */
    private $name;

    /**
     * {@inheritdoc}
     */
    public function getDisplayName()
    {
        return ucwords($this->getName());
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return self::TYPE;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}
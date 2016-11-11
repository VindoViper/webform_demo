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
 * @Table(name="queue_customer_anon")
 */
class Anonymous
    extends Customer
{

    const TYPE = 'Anonymous';

    /**
     * @var string
     */
    private $name = self::TYPE;

    /**
     * {@inheritdoc}
     */
    public function getDisplayName()
    {
        return self::TYPE;
    }

    /**
     * {@inheritdoc}
     */
    public function getType()
    {
        return self::TYPE;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}
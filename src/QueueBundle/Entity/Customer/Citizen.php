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
 * @Table(name="queue_customer_citizen")
 */
class Citizen
    extends Customer
{

    const TYPE = 'Citizen';

    /**
     * @Column(type="string", length=5)
     */
    private $title;

    /**
     * @Column(type="string", length=150)
     */
    private $firstName;

    /**
     * @Column(type="string", length=150)
     */
    private $lastName;

    /**
     * {@inheritdoc}
     */
    public function getDisplayName()
    {
        return ucwords($this->getTitle() . ' ' . $this->getFirstName() . ' ' . $this->getLastName());
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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

}
<?php
/**
 * Created by PhpStorm.
 * User: peter.self
 * Date: 08/11/16
 */

namespace QueueBundle\Entity;

use QueueBundle\Entity\Customer\CustomerInterface;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\OneToOne;
use Doctrine\ORM\Mapping\Table;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\JoinColumn;
use \DateTime;

/**
 * @Entity(repositoryClass="QueueBundle\Entity\Repository\QueueEntryRepository")
 * @Table(name="queue_entry")
 */
class QueueEntry
{

    /**
     * @var int
     * @Column(type="integer")
     * @Id
     * @GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var CustomerInterface
     * @OneToOne(targetEntity="QueueBundle\Entity\Customer\Customer")
     * @JoinColumn(name="customer", referencedColumnName="id")
     */
    private $customer;

    /**
     * @var string
     * @Column(type="string", length=15)
     */
    private $serviceName;

    /**
     * @var DateTime
     * @Column(type="datetime")
     */
    private $queuedAt;


    /**
     * @param CustomerInterface $customer
     * @param DateTime $queuedAt
     * @param string $serviceName
     */
    public function __construct(CustomerInterface $customer, DateTime $queuedAt, $serviceName)
    {
        $this->customer = $customer;
        $this->queuedAt = $queuedAt;
        $this->serviceName = $serviceName;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getServiceName()
    {
        return $this->serviceName; //@todo parse against
    }

    /**
     * @return DateTime
     */
    public function getQueuedAt()
    {
        return $this->queuedAt->format('d-m-Y::H:i');
    }

    /**
     * @return CustomerInterface
     */
    public function getCustomer()
    {
        return $this->customer;
    }

}
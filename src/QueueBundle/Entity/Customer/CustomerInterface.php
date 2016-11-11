<?php
/**
 * Created by PhpStorm.
 * User: peter.self
 * Date: 08/11/16
 */

namespace QueueBundle\Entity\Customer;

interface CustomerInterface
{
    /**
     * @return int
     */
    public function getId();

    /**
     * @return string
     */
    public function getDisplayName();

    /**
     * @return string
     */
    public function getType();

}
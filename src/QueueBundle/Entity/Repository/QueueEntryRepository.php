<?php
/**
 * Created by PhpStorm.
 * User: peter.self
 * Date: 08/11/16
 */

namespace QueueBundle\Entity\Repository;

use Doctrine\ORM\EntityRepository;
use QueueBundle\Entity\QueueEntry;

class QueueEntryRepository
    extends EntityRepository
{

    /**
     * @param int $maxResults
     * @return array
     */
    public function getOldestBatch($maxResults)
    {
        $qb = $this->createQueryBuilder('b');
        $batch = $qb->select('e')
            ->from(QueueEntry::class, 'e')
            ->orderBy('e.queuedAt')
            ->setMaxResults($maxResults)
            ->getQuery()
            ->execute()
        ;

        return $batch;
    }

}
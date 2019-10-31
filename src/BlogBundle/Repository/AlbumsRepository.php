<?php

namespace BlogBundle\Repository;

/**
 * AlbumsRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AlbumsRepository extends \Doctrine\ORM\EntityRepository
{
        public function search($recherche){
        $q = $this->createQueryBuilder('p')
            ->where('p.titre LIKE :recherche')
            ->setParameter('recherche', '%'.$recherche.'%')
            ->orderBy('p.id', 'ASC')
            ->getQuery();
            return $q;
    }

         public function findArray($array)
    {
        $qb = $this->createQueryBuilder('c')
                    ->select('c')
                    ->Where('c.id IN (:array)')
                    ->setParameter('array', $array);
                    
    return $qb->getQuery()->getResult();
    }
}

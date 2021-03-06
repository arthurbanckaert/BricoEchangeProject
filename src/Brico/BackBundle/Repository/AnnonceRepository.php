<?php

namespace Brico\BackBundle\Repository;

/**
 * AnnonceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class AnnonceRepository extends \Doctrine\ORM\EntityRepository
{
    public function getLastAnnonces(){
        $annonces = $this->getEntityManager()
                        ->createQueryBuilder()
                        ->select('a')->from('BricoBackBundle:Annonce', 'a')
                        ->orderBy('a.date', 'desc')->setMaxResults(10);

        /*$categories = $this->getEntityManager()
                        ->createQueryBuilder()
                        ->select('c,a')
                        ->from('BricoBackBundle:Categorie', 'c')
                        //->groupBy('a.categories')
                        ->join('c.annonces', 'a')
                        ->where($annonces);*/

        return $annonces->getQuery()->getResult();
    }
}

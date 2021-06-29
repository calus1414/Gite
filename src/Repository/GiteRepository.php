<?php

namespace App\Repository;

use App\Entity\Gite;
use App\Entity\Equipement;
use App\Entity\PropertySearch;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Gite|null find($id, $lockMode = null, $lockVersion = null)
 * @method Gite|null findOneBy(array $criteria, array $orderBy = null)
 * @method Gite[]    findAll()
 * @method Gite[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class GiteRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Gite::class);
    }




    /**
     * @return Gite[] Returns an array of Gite objects
     */

    public function find9LastGite()
    {


        return $this->createQueryBuilder('g')
            ->orderBy('g.created_at', 'DESC')
            ->setMaxResults(9)
            ->getQuery()
            ->getResult();
    }



    /**
     * @return Gite[] Returns an array of Gite objects
     */

    public function findForNavBar(PropertySearch $search)
    {
        $query =  $this->findVisibleQuery();


        if ($search->getMinBedroom()) {

            $query = $query
                ->andWhere('g.bedroom = :bedroom')
                ->setParameter("bedroom", $search->getMinBedroom());
        }
        if ($search->getMinSurface() !== 0 && $search->getMinSurface() !== null) {
            $query = $query
                ->andWhere('g.surface >= :surface')
                ->setParameter("surface", $search->getMinSurface());
        }
        if ($search->getAnimals() !== null) {
            $query = $query
                ->andWhere('g.animals = :animals')
                ->setParameter("animals", $search->getAnimals());
        } elseif ($search->getAnimals() === false) {
            $query = $query
                ->andWhere('g.animals = false');
        }

        if ($search->getEquipements()->count() > 0) {

            $k = 0;

            foreach ($search->getEquipements() as $equipement) {
                dump($search->getEquipements()->count());
                $k++;
                $query = $query

                    ->andWhere("  :equipement$k MEMBER OF g.equipements")

                    ->setParameter("equipement$k", $equipement->getId());
            }
        }
        if ($search->getEquipements()->count() > 0) {

            $k = 0;

            foreach ($search->getServices() as $service) {
                dump($search->getServices()->count());
                $k++;
                $query = $query
                    // ->innerJoin(Equipement::class, 'e.id', 'd')
                    ->andWhere("  :service$k MEMBER OF g.services")

                    ->setParameter("service$k", $service->getId());
            }
        }
        // if ($search->getServices()->count() > 0) {
        //     // dd($search->getServices());
        //     $k = 0;
        //     foreach ($search->getServices() as $service) {
        //         $k++;
        //         $query = $query
        //             ->andWhere(" :service$k MEMBER OF g.services")
        //             ->setParameter("service$k ", $service->getId());
        //     }
        // }
        if ($search->getCity() !== "") {

            $query = $query
                // ->andWhere('g.city LIKE  :city')
                ->andWhere('g.city LIKE  :city')
                ->setParameter('city', '%' . $search->getCity() . '%');
        }

        // dd($query->getQuery());

        return $query->getQuery();
    }



    private function findVisibleQuery()
    {


        return $this->createQueryBuilder('g')

            ->orderBy('g.created_at', 'DESC');
    }






    /*
    public function findOneBySomeField($value): ?Gite
    {
        return $this->createQueryBuilder('g')
            ->andWhere('g.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

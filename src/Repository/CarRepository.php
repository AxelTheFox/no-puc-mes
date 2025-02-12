<?php
namespace App\Repository;
use App\Entity\Car;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
/**
* @extends ServiceEntityRepository<Car>
*
* @method Car|null find($id, $lockMode = null, $lockVersion = null)
* @method Car|null findOneBy(array $criteria, array $orderBy = null)
* @method Car[] findAll()
* @method Car[] findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
*/
class CarRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Car::class);
    }
    
    public function save(Car $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
    public function remove(Car $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);
        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
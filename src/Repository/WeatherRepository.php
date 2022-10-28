<?php

namespace App\Repository;

use App\Entity\Weather;
use App\Entity\City;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Weather>
 *
 * @method Weather|null find($id, $lockMode = null, $lockVersion = null)
 * @method Weather|null findOneBy(array $criteria, array $orderBy = null)
 * @method Weather[]    findAll()
 * @method Weather[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WeatherRepository extends ServiceEntityRepository
{
	public function __construct(ManagerRegistry $registry)
	{
		parent::__construct($registry, Weather::class);
	}

	public function findByLocation(City $city)
	{
		$qb = $this->createQueryBuilder('m');
		$qb->where('m.city = :city')
			->setParameter('city', $city)
			->andWhere('m.Date > :now')
			->setParameter('now', date('Y-m-d'));

		$query = $qb->getQuery();
		$result = $query->getResult();
		return $result;
	}

	public function findByLocationName($name)
	{
		$qb = $this->createQueryBuilder('m');
		$qb->where('c.Name = :name')
			->setParameter('name', $name)
			->andWhere('m.Date > :now')
			->setParameter('now', date('Y-m-d'))
			->join('m.city', 'c');

		$query = $qb->getQuery();
		$result = $query->getResult();
		return $result;
	}
	
	public function save(Weather $weather, bool $flush = false)
    {
        $this->getEntityManager()->persist($weather);

        if ($flush) 
		{
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Weather $weather, bool $flush = false)
    {
        $this->getEntityManager()->remove($weather);

        if ($flush) 
		{
            $this->getEntityManager()->flush();
        }
    }
}

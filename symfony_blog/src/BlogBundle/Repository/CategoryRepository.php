<?php

namespace BlogBundle\Repository;

/**
 * CategoryRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategoryRepository extends \Doctrine\ORM\EntityRepository
{
	public function getAll()
    {
		$query = $this->createQueryBuilder('category')
		    ->orderBy('category.id', 'DESC')
		    ->getQuery();
    	
    	return $query->getResult();
    }
}

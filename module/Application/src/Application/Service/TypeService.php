<?php

namespace Application\Service;

class TypeService
{
    const REPO = 'Application\Entity\Type';
    protected $entityManager;
    
    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;
    }
    
    public function findAll()
    {
        return $this->entityManager->getRepository($this::REPO)->findAll();
    }
    
    public function findById($id)
    {
        return $this->entityManager->getRepository($this::REPO)->find($id);
    }
    
    public function findByDenomination($denomination)
    {
        $dql = 'SELECT t '
             .  'FROM Application\Entity\Type t '
             .  'JOIN t.monarch m WHERE t.denomination = :denomination';
        $query = $this->entityManager->createQuery($dql);
        $query->setParameter('denomination', $denomination);
        return $query->getResult();
        
        //return $this->entityManager->getRepository($this::REPO)->findBy(array(
        //    'denomination' => $denomination
        //));
    }
    
    public function persist($entity)
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }
    
    public function remove($entity)
    {
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
    }
    
}

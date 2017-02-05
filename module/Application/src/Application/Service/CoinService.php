<?php

namespace Application\Service;

class CoinService
{
    const REPO = 'Application\Entity\Coin';
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
        $dql = 'SELECT c, t '
             .  'FROM Application\Entity\Coin c '
             .  'JOIN c.type t WHERE t.denomination = :denomination';
        $query = $this->entityManager->createQuery($dql);
        $query->setParameter('denomination', $denomination);
        return $query->getResult();
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

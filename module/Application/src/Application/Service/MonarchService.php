<?php

namespace Application\Service;

class MonarchService
{
    const REPO = 'Application\Entity\Monarch';
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
    
    public function persist($entity)
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }
}

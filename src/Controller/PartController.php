<?php

namespace App\Controller;

use App\Repository\ElementRepository;
use App\Repository\PartRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations;

class PartController extends AbstractFOSRestController
{
    /**
     * @Annotations\Get(path="/parts", name="get_all_parts")
     * @Annotations\View(serializerGroups={"id"})
     * @param PartRepository $partRepository
     * @param ElementRepository $elementRepository
     * @return \App\Entity\Part[]
     */
    public function getPartsAction(PartRepository $partRepository, ElementRepository $elementRepository)
    {
        $allParts = $partRepository->findAll();
        return $allParts;

//        $allElements = $elementRepository->findAll();
//        return $allElements;
//        $viewElement = $this->view($allElements, 200);
//        $context = new Context();
//        $context->setGroups(['alias']);
//        $viewElement->setContext($context);
//        return $this->handleView($viewElement);
    }

    /**
     * @Annotations\Get(path="/part/{id}", name="part-detail")
     * @Annotations\View(serializerGroups={"name"})
     * @param PartRepository $partRepository
     * @param int $id
     */
    public function getPartAction(PartRepository $partRepository, int $id)
    {
        return $partRepository->find($id);
    }
}

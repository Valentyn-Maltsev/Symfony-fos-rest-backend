<?php

namespace App\Controller;

use App\Repository\ElementRepository;
use App\Repository\PartRepository;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\Controller\Annotations;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class PartController extends AbstractFOSRestController
{
    /**
     * @Annotations\Get(path="/api/parts", name="get_all_parts")
     * @Annotations\View(serializerGroups={"id"})
     * @IsGranted("ROLE_USER")
     *
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
//        $context = new Context();  // Устанавливаем контекст (можно и в аннотации)
//        $context->setGroups(['alias']);
//        $viewElement->setContext($context);
//        return $this->handleView($viewElement);
    }

    /**
     * @Annotations\Get(path="/api/part/{id}", name="part-detail")
     * @Annotations\View(serializerGroups={"name"})
     * @IsGranted("ROLE_USER")
     *
     * @param PartRepository $partRepository
     * @param int $id
     */
    public function getPartAction(PartRepository $partRepository, int $id)
    {
        return $partRepository->find($id);
    }
}

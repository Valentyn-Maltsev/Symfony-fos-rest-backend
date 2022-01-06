<?php

namespace App\Controller;

use App\Entity\Material;
use App\Form\User\MaterialType;
use App\Repository\MaterialRepository;
use Doctrine\ORM\EntityManagerInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations;

class MaterialController extends AbstractFOSRestController
{

    /**
     * @Annotations\Get(path="/materials", name="all_materials")
     * @Annotations\View(serializerGroups={"list"})
     * @param MaterialRepository $materialRepository
     * @return Material[]
     */
    public function getMaterialsAction(MaterialRepository $materialRepository)
    {
        return $materialRepository->findAll();
    }


    /**
     * @Annotations\Get(path="/material/{id}", name="material_detail")
     * @Annotations\View(serializerGroups={"details"})
     * @param int $id
     * @param MaterialRepository $materialRepository
     * @return Material|null
     */
    public function getMaterialAction(int $id, MaterialRepository $materialRepository)
    {
        return $materialRepository->find($id);
    }


    /**
     * @Annotations\Post(path="/add-material", name="add_material")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @return Material|\Symfony\Component\Form\FormErrorIterator
     */
    public function postMaterialAction(Request $request, EntityManagerInterface $entityManager)
    {
        $material = new Material();
        $form = $this->createForm(MaterialType::class, $material);

        $data = $request->request->all();
        $form->submit($data);

        if (!$form->isValid()) {
            return $form->getErrors();
        }

        $entityManager->persist($material);
        $entityManager->flush();

        return $material;
    }


    /**
     * @Annotations\Post(path="/material/edit/{id}", name="edit_material")
     * @param Request $request
     * @param EntityManagerInterface $entityManager
     * @param MaterialRepository $materialRepository
     */
    public function putMaterialAction(
        Request $request,
        EntityManagerInterface $entityManager,
        MaterialRepository $materialRepository,
        int $id
    )
    {
        $material = $materialRepository->find($id);

        if (!$material) {
            return false;
        }

        $form = $this->createForm(MaterialType::class, $material);
        $data = $request->request->all();
        $form->submit($data);

        if (!$form->isValid()) {
            return $form->getErrors();
        }

        $entityManager->persist($material);
        $entityManager->flush();

        return $material;
    }

}

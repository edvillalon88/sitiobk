<?php

namespace App\Controller;

use App\Entity\Proyecto;
use App\Form\ProyectoType;
use App\Repository\ProyectoRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ImageUploader;

/**
 * @Route("/admin/proyecto")
 */
class ProyectoController extends AbstractController
{
    /**
     * @Route("/", name="proyecto_index", methods={"GET"})
     */
    public function index(ProyectoRepository $proyectoRep)
    {
        return $this->render('proyecto/index.html.twig', [
            'proyectos' => $proyectoRep->findAll(),
            'error'=>''
        ]);
    }

    /**
     * @Route("/new", name="proyecto_new", methods={"GET","POST"})
     */
    public function new(Request $request, ImageUploader $imageUploader): Response
    {
        $proyecto = new Proyecto();
        $form = $this->createForm(ProyectoType::class, $proyecto);
        $form->handleRequest($request);
        if($form->isSubmitted()){

            if ($form->isValid()) {

                $entityManager = $this->getDoctrine()->getManager();

                $imageFile1 = $form->get('imagen1')->getData();
                if ($imageFile1) {
                    $imageName1 = $imageUploader->upload($imageFile1);
                    $proyecto->setImagen1($imageName1);
                }

                $imageFile2 = $form->get('imagen2')->getData();
                if ($imageFile2) {
                    $imageName2 = $imageUploader->upload($imageFile2);
                    $proyecto->setImagen2($imageName2);
                }

                $imageFile3 = $form->get('imagen3')->getData();
                if ($imageFile3) {
                    $imageName3 = $imageUploader->upload($imageFile3);
                    $proyecto->setImagen3($imageName3);
                }

                $entityManager->persist($proyecto);
                $entityManager->flush();
    
                return $this->redirectToRoute('proyecto_index');
            }

        }

        return $this->render('proyecto/new.html.twig', [
            'proyecto' => $proyecto,
            'form' => $form->createView(),
        ]);
    }    

    /**
     * @Route("/{id}", name="proyecto_show", methods={"GET"})
     */
    public function show(Proyecto $proyecto): Response
    {
        return $this->render('proyecto/show.html.twig', [
            'proyecto' => $proyecto,
        ]);
    }


    /**
     * @Route("/{id}/edit", name="proyecto_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Proyecto $proyecto): Response
    {
        $form = $this->createForm(ProyectoType::class, $proyecto);
        $form->handleRequest($request);
        if($form->isSubmitted()){

            if ($form->isValid()) {

                $imageFile1 = $form->get('imagen1')->getData();
                if ($imageFile1) {
                    $imageName1 = $imageUploader->upload($imageFile1);
                    $proyecto->setImagen1($imageName1);
                }

                $imageFile2 = $form->get('imagen2')->getData();
                if ($imageFile2) {
                    $imageName2 = $imageUploader->upload($imageFile2);
                    $proyecto->setImagen2($imageName2);
                }

                $imageFile3 = $form->get('imagen3')->getData();
                if ($imageFile3) {
                    $imageName3 = $imageUploader->upload($imageFile3);
                    $proyecto->setImagen3($imageName3);
                }

                $this->getDoctrine()->getManager()->flush();
    
                return $this->redirectToRoute('proyecto_index');
            }
        }
        

        return $this->render('proyecto/edit.html.twig', [
            'proyecto' => $proyecto,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="proyecto_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Proyecto $proyecto): Response
    {
        if ($this->isCsrfTokenValid('delete'.$proyecto->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($proyecto);
            $entityManager->flush();
        }

        return $this->redirectToRoute('proyecto_index');
    }

}

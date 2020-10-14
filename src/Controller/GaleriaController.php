<?php

namespace App\Controller;

use App\Entity\Galeria;
use App\Form\GaleriaType;
use App\Repository\GaleriaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ImageUploader;

/**
 * @Route("/admin/galeria")
 */
class GaleriaController extends AbstractController
{
    /**
     * @Route("/", name="galeria_index", methods={"GET"})
     */
    public function index(GaleriaRepository $galeriaRep)
    {
        return $this->render('galeria/index.html.twig', [
            'galerias' => $galeriaRep->findAll(),
            'error'=>''
        ]);
    }

    /**
     * @Route("/new", name="galeria_new", methods={"GET","POST"})
     */
    public function new(Request $request, ImageUploader $imageUploader): Response
    {
        $galeria = new Galeria();
        $form = $this->createForm(GaleriaType::class, $galeria);
        $form->handleRequest($request);
        if($form->isSubmitted()){

            if ($form->isValid()) {

                $entityManager = $this->getDoctrine()->getManager();

                $imageFile = $form->get('imagen')->getData();
                if ($imageFile) {
                    $imageName = $imageUploader->upload($imageFile);
                    $galeria->setImagen($imageName);
                }

                $entityManager->persist($galeria);
                $entityManager->flush();
    
                return $this->redirectToRoute('galeria_index');
            }

        }

        return $this->render('galeria/new.html.twig', [
            'galeria' => $galeria,
            'form' => $form->createView(),
        ]);
    }    

    /**
     * @Route("/{id}", name="galeria_show", methods={"GET"})
     */
    public function show(Galeria $galeria): Response
    {
        return $this->render('galeria/show.html.twig', [
            'galeria' => $galeria,
        ]);
    }


    /**
     * @Route("/{id}/edit", name="galeria_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Galeria $galeria, ImageUploader $imageUploader): Response
    {
        $form = $this->createForm(GaleriaType::class, $galeria);
        $form->handleRequest($request);
        if($form->isSubmitted()){

            if ($form->isValid()) {

                $imageFile = $form->get('imagen')->getData();
                if ($imageFile) {
                    $imageName = $imageUploader->upload($imageFile);
                    $galeria->setImagen($imageName);
                }

                $this->getDoctrine()->getManager()->flush();
    
                return $this->redirectToRoute('galeria_index');
            }
        }
        

        return $this->render('galeria/edit.html.twig', [
            'galeria' => $galeria,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="galeria_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Galeria $galeria): Response
    {
        if ($this->isCsrfTokenValid('delete'.$galeria->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($galeria);
            $entityManager->flush();
        }

        return $this->redirectToRoute('galeria_index');
    }

}

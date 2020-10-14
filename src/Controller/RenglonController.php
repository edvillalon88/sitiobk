<?php

namespace App\Controller;

use App\Entity\Renglon;
use App\Form\RenglonType;
use App\Repository\RenglonRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ImageUploader;

/**
 * @Route("/admin/renglon")
 */
class RenglonController extends AbstractController
{
    /**
     * @Route("/", name="renglon_index", methods={"GET"})
     */
    public function index(RenglonRepository $renglonRep)
    {
        return $this->render('renglon/index.html.twig', [
            'renglones' => $renglonRep->findAll(),
            'error'=>''
        ]);
    }

    /**
     * @Route("/new", name="renglon_new", methods={"GET","POST"})
     */
    public function new(Request $request, ImageUploader $imageUploader): Response
    {
        $renglon = new Renglon();
        $form = $this->createForm(RenglonType::class, $renglon);
        $form->handleRequest($request);
        if($form->isSubmitted()){

            if ($form->isValid()) {
                $imageFile = $form->get('imagen')->getData();
                if ($imageFile) {
                    $imageName = $imageUploader->upload($imageFile);
                    $renglon->setImagen($imageName);
                }
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($renglon);
                $entityManager->flush();
    
                return $this->redirectToRoute('renglon_index');
            }

        }

        return $this->render('renglon/new.html.twig', [
            'renglon' => $renglon,
            'form' => $form->createView(),
        ]);
    }    

    /**
     * @Route("/{id}", name="renglon_show", methods={"GET"})
     */
    public function show(Renglon $renglon): Response
    {
        return $this->render('renglon/show.html.twig', [
            'renglon' => $renglon,
        ]);
    }


    /**
     * @Route("/{id}/edit", name="renglon_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Renglon $renglon, ImageUploader $imageUploader): Response
    {
        $form = $this->createForm(RenglonType::class, $renglon);
        $form->handleRequest($request);
        if($form->isSubmitted()){

            if ($form->isValid()) {
                $imageFile = $form->get('imagen')->getData();
                if ($imageFile) {
                    $imageName = $imageUploader->upload($imageFile);
                    $renglon->setImagen($imageName);
                }
                $this->getDoctrine()->getManager()->flush();
    
                return $this->redirectToRoute('renglon_index');
            }
        }
        

        return $this->render('renglon/edit.html.twig', [
            'renglon' => $renglon,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="renglon_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Renglon $renglon): Response
    {
        if ($this->isCsrfTokenValid('delete'.$renglon->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($renglon);
            $entityManager->flush();
        }

        return $this->redirectToRoute('renglon_index');
    }

}

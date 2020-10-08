<?php

namespace App\Controller;

use App\Entity\Noticia;
use App\Form\EditNoticiaType;
use App\Repository\NoticiaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\ImageUploader;

/**
 * @Route("/noticia")
 */
class NoticiaController extends AbstractController
{
    /**
     * @Route("/", name="noticia_index", methods={"GET"})
     */
    public function index(NoticiaRepository $notaRep)
    {
        $nota = $notaRep->find(1);

        if(empty($nota)) {
            $nota = new Noticia();
     
            $nota->setFechaHora(null);
         
            $nota->setTitulo('');
            $nota->setTituloEn('');
    
            $nota->setSubtitulo('');
            $nota->setSubtituloEn('');
    
            $nota->setContenido('');
            $nota->setContenidoEn('');
    
            $nota->setImagen('');
    
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($nota);
            $entityManager->flush();
        }

        return $this->render('noticia/index.html.twig', [
            'nota' => $nota,
        ]);
    }
    
    /**
     * @Route("/{id}/edit", name="noticia_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Noticia $nota, ImageUploader $imageUploader): Response
    {
        $form = $this->createForm(EditNoticiaType::class, $nota);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            
            $imageFile = $form->get('imagen')->getData();
            if ($imageFile) {
                $imageName = $imageUploader->upload($imageFile);
                $nota->setImagen($imageName);
            }

            $nota->setFechaHora(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('noticia_index');
        }

        return $this->render('noticia/edit.html.twig', [
            'nota' => $nota,
            'form' => $form->createView(),
        ]);
    }

}

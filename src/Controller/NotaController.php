<?php

namespace App\Controller;

use App\Entity\Nota;
use App\Form\EditNotaType;
use App\Repository\NotaRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

/**
 * @Route("/nota")
 */
class NotaController extends AbstractController
{
    /**
     * @Route("/", name="nota_index", methods={"GET"})
     */
    public function index(NotaRepository $notaRep)
    {
        $nota = $notaRep->find(1);

        if(empty($nota)) {
            $nota = new Nota();
     
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

        return $this->render('nota/index.html.twig', [
            'nota' => $nota,
        ]);
    }
    
    /**
     * @Route("/{id}/edit", name="nota_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Nota $nota): Response
    {
        $form = $this->createForm(EditNotaType::class, $nota);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $nota->setFechaHora(new \DateTime());
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('nota_index');
        }

        return $this->render('nota/edit.html.twig', [
            'nota' => $nota,
            'form' => $form->createView(),
        ]);
    }

}

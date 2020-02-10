<?php

namespace App\Controller;

use App\Entity\Especialidad;
use App\Form\EspecialidadType;
use App\Repository\EspecialidadRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/especialidad")
 */
class EspecialidadController extends AbstractController
{
    /**
     * @Route("/", name="especialidad_index", methods={"GET"})
     */
    public function index(EspecialidadRepository $especialidadRepository): Response
    {
        return $this->render('especialidad/index.html.twig', [
            'especialidads' => $especialidadRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="especialidad_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $especialidad = new Especialidad();
        $form = $this->createForm(EspecialidadType::class, $especialidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($especialidad);
            $entityManager->flush();

            return $this->redirectToRoute('especialidad_index');
        }

        return $this->render('especialidad/new.html.twig', [
            'especialidad' => $especialidad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="especialidad_show", methods={"GET"})
     */
    public function show(Especialidad $especialidad): Response
    {
        return $this->render('especialidad/show.html.twig', [
            'especialidad' => $especialidad,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="especialidad_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Especialidad $especialidad): Response
    {
        $form = $this->createForm(EspecialidadType::class, $especialidad);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('especialidad_index');
        }

        return $this->render('especialidad/edit.html.twig', [
            'especialidad' => $especialidad,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="especialidad_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Especialidad $especialidad): Response
    {
        if ($this->isCsrfTokenValid('delete'.$especialidad->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($especialidad);
            $entityManager->flush();
        }

        return $this->redirectToRoute('especialidad_index');
    }
}

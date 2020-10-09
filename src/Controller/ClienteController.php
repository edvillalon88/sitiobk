<?php

namespace App\Controller;

use App\Entity\Cliente;
use App\Form\AddClienteType;
use App\Form\EditClienteType;
use App\Repository\ClienteRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use App\Service\ImageUploader;

/**
 * @Route("/cliente")
 */
class ClienteController extends AbstractController
{
    private $passwordEncoder;

    public function __construct(UserPasswordEncoderInterface $passwordEncoder)
    {
         $this->passwordEncoder = $passwordEncoder;
    }
    /**
     * @Route("/", name="cliente_index", methods={"GET"})
     */
    public function index(ClienteRepository $clienteRepository): Response
    {
        return $this->render('cliente/index.html.twig', [
            'clientes' => $clienteRepository->findAll(),
            'error'=>''
        ]);
    }
    private function validUsuario($form, $entity, $userRepository){
        $result = $userRepository->findOneBy(['username'=>$entity->getUserName()]);

        if(!empty($result))
            $form->get('usuario')->get('username')->addError(new FormError("El usuario ".$entity->getUserName()." ya existe"));
        
        return $form;
    }
    /**
     * @Route("/new", name="cliente_new", methods={"GET","POST"})
     */
    public function new(Request $request, UserRepository $userRepository, ImageUploader $imageUploader): Response
    {
        $cliente = new Cliente();
        $form = $this->createForm(AddClienteType::class, $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted()) {
            $form = $this->validUsuario($form, $cliente->getUsuario(), $userRepository);
            if($form->isValid()){
                $cliente->getUsuario()->setRoles(['ROLE_CLIENTE']);
                $cliente->getUsuario()->setPassword($this->passwordEncoder->encodePassword(
                    $cliente->getUsuario(),
                    $cliente->getUsuario()->getPassword()
                ));

                $imageFile = $form->get('imagen')->getData();
                if ($imageFile) {
                    $imageName = $imageUploader->upload($imageFile);
                    $cliente->setImagen($imageName);
                }

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($cliente);
                $entityManager->flush();
    
                return $this->redirectToRoute('cliente_index');
            }
            
        }

        return $this->render('cliente/new.html.twig', [
            'cliente' => $cliente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cliente_show", methods={"GET"})
     */
    public function show(Cliente $cliente): Response
    {
        return $this->render('cliente/show.html.twig', [
            'cliente' => $cliente,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="cliente_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Cliente $cliente, ImageUploader $imageUploader): Response
    {
        $form = $this->createForm(EditClienteType::class, $cliente);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $imageFile = $form->get('imagen')->getData();
            if ($imageFile) {
                $imageName = $imageUploader->upload($imageFile);
                $cliente->setImagen($imageName);
            }

            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cliente_index');
        }

        return $this->render('cliente/edit.html.twig', [
            'cliente' => $cliente,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="cliente_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Cliente $cliente
    , ClienteRepository $clienteRepository): Response
    {
        $error = '';

        $cliente = $clienteRepository->find($cliente->getId());
        if (!empty($cliente) && $this->isCsrfTokenValid('delete'.$cliente->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($cliente);
            $entityManager->flush();
        }else{
            $error = 'Este cliente ya no existe en el sistema';    
        }            
                
        if(empty($error)){
            return $this->redirectToRoute('cliente_index');
        }else{
            return $this->render('cliente/index.html.twig', [
                'clientes' => $clienteRepository->findAll(),
                'error'=>$error
            ]);
        }
        
    }
}

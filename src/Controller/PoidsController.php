<?php

namespace App\Controller;

use App\Entity\Poids;
use App\Entity\User;
use App\Form\PoidsType;
use App\Repository\PoidsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/poids')]
class PoidsController extends AbstractController
{
    #[Route('/', name: 'app_poids_index', methods: ['GET'])]
    public function index(PoidsRepository $poidsRepository): Response
    {
        return $this->render('poids/index.html.twig', [
            'poids' => $poidsRepository->findAll(),
        ]);
    }

    // #[Route('/new', name: 'app_poids_new', methods: ['GET', 'POST'])]
    // public function new(Request $request,User $user, EntityManagerInterface $entityManager): Response
    // {
    //     $poid = new Poids();
    //     $form = $this->createForm(PoidsType::class, $poid);
    //     $form->handleRequest($request);
        
    //     dump($user = $this->getUser());
        
    //     if ($form->isSubmitted() && $form->isValid()) {
    //         $entityManager->persist($poid);
    //         // $user->setPoids($form->get('poids')->getData());
    //         $entityManager->flush();


    //         return $this->redirectToRoute('profile', [], Response::HTTP_SEE_OTHER);
    //     }

    //     return $this->render('poids/new.html.twig', [
    //         'poid' => $poid,
    //         'form' => $form,
    //     ]);
    // }

    #[Route('/{id}', name: 'app_poids_show', methods: ['GET'])]
    public function show(Poids $poid): Response
    {
        return $this->render('poids/show.html.twig', [
            'poid' => $poid,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_poids_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Poids $poid, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(PoidsType::class, $poid);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_poids_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('poids/edit.html.twig', [
            'poid' => $poid,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_poids_delete', methods: ['POST'])]
    public function delete(Request $request, Poids $poid, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$poid->getId(), $request->request->get('_token'))) {
            $entityManager->remove($poid);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_poids_index', [], Response::HTTP_SEE_OTHER);
    }
}

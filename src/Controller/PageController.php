<?php

namespace App\Controller;

use App\Entity\Poids;
use App\Entity\User;
use App\Form\PoidsType;
use App\Form\RegistrationFormType;
use App\Repository\PoidsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class PageController extends AbstractController
{
    #[Route('/', name: 'home')]
    public function index(): Response
    {
        return $this->render('page/index.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/programmeperte', name: 'perte')]
    public function perte(): Response
    {
        return $this->render('page/programmeperte.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/programmeprise', name: 'prise')]
    public function prise(): Response
    {
        return $this->render('page/programmeprise.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/alimentaire', name: 'aliment')]
    public function aliment(): Response
    {
        return $this->render('page/alimentaire.html.twig', [
            'controller_name' => 'PageController',
        ]);
    }

    #[Route('/profile/{id}', name: 'profile')]
    public function profile(Request $request,User $user, EntityManagerInterface $entityManager, PoidsRepository $poidsRepository): Response
    {

        $poid = new Poids();
        $form = $this->createForm(PoidsType::class, $poid);
        $form->handleRequest($request);

        $form1 = $this->createForm(RegistrationFormType::class, $user);
        $form1->handleRequest($request);
        $us = $this->getUser();


        // $poidds = $poidsRepository->findBy(['id'=> $us]);
     

        if ($form->isSubmitted() && $form->isValid()) {

            $poid->setUser($this->getUser());
            $user->setPoids($form->get('poids')->getData());
            $entityManager->persist($poid);
            $entityManager->flush();

            return $this->redirectToRoute('profile', ['id' => $user->getId()], Response::HTTP_SEE_OTHER);
        }

        if ($form1->isSubmitted() && $form1->isValid()) {

            $entityManager->flush();

            return $this->redirectToRoute('profile', ['id' => $user->getId()], Response::HTTP_SEE_OTHER);
        }

        

        return $this->render('page/profile.html.twig', [
            'poid' => $poid,
            'form' => $form,
            'form1' => $form1,
            'p' => $poidsRepository->findOneBy(['user' => $this->getUser()],['date' => 'DESC'] ),
            'user' => $user
        ]);
    }
}

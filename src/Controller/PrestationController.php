<?php

namespace App\Controller;

use App\Entity\RendezVous;
use App\Form\RendezVousType;
use App\Repository\PrestationRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class PrestationController extends AbstractController
{
    #[Route('/prestation', name: 'app_prestation')]
    public function index(PrestationRepository $prestationRepository, Request $request, EntityManagerInterface $entityManager): Response
    {
        $prestations = $prestationRepository->findAll();
        $rendezvous = new RendezVous();
        $form = $this->createForm(RendezVousType::class, $rendezvous);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {

            $rendezvous->setStatut('en_attente');
            
            $entityManager->persist($rendezvous);
            $entityManager->flush();

            $this->addFlash('success', 'Votre Réservation a bien été prise en compte !');

            return $this->redirectToRoute('app_prestation');
        }

        return $this->render('prestation/index.html.twig', [
            'prestations' => $prestations,
            'form' => $form,
        ]);
    }
}

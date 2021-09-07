<?php

namespace App\Controller;

use App\Entity\Suggestion;
use App\Form\SuggestionType;
use App\Repository\SuggestionRepository;
use Doctrine\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SuggestionController extends AbstractController
{
    /**
     * @param SuggestionRepository $suggestionRepository
     * @return Response
     * @Route("/suggestion", name="suggestion_list")
     */
    public function list(SuggestionRepository $suggestionRepository): Response
    {
        return $this->render('suggestion/index.html.twig', [
            'suggestions' => $suggestionRepository->findAll()
        ]);
    }

    /**
     * @Route("/suggestion/create", name="suggestion_create")
     * @param Request $request
     * @param ObjectManager $entityManager
     * @return Response
     */
    public function create(Request $request): Response
    {
        $suggestion = new Suggestion();
        $form = $this->createForm(SuggestionType::class, $suggestion);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $suggestion = $form->getData();
            /** @var $suggestion Suggestion */
            $suggestion->setUser($this->getUser());
            $entityManager->persist($suggestion);
            $entityManager->flush();

            return $this->redirectToRoute("suggestion_list");
        }
        return $this->render("suggestion/create.html.twig", [
            'formSuggestion' => $form->createView()
        ]);
    }
}

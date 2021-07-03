<?php

namespace App\Controller;

use App\Entity\Macroprocessus;
use App\Form\MacroprocessusType;
use App\Repository\MacroprocessusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/macroprocessus")
 */
class MacroprocessusController extends AbstractController
{
    /**
     * @Route("/", name="macroprocessus_index", methods={"GET"})
     */
    public function index(MacroprocessusRepository $macroprocessusRepository): Response
    {
        return $this->render('macroprocessus/index.html.twig', [
            'macroprocessuses' => $macroprocessusRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="macroprocessus_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $macroprocessu = new Macroprocessus();
        $form = $this->createForm(MacroprocessusType::class, $macroprocessu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($macroprocessu);
            $entityManager->flush();

            return $this->redirectToRoute('macroprocessus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('macroprocessus/new.html.twig', [
            'macroprocessu' => $macroprocessu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="macroprocessus_show", methods={"GET"})
     */
    public function show(Macroprocessus $macroprocessu): Response
    {
        return $this->render('macroprocessus/show.html.twig', [
            'macroprocessu' => $macroprocessu,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="macroprocessus_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Macroprocessus $macroprocessu): Response
    {
        $form = $this->createForm(MacroprocessusType::class, $macroprocessu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('macroprocessus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('macroprocessus/edit.html.twig', [
            'macroprocessu' => $macroprocessu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="macroprocessus_delete", methods={"POST"})
     */
    public function delete(Request $request, Macroprocessus $macroprocessu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$macroprocessu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($macroprocessu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('macroprocessus_index', [], Response::HTTP_SEE_OTHER);
    }
}

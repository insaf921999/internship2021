<?php

namespace App\Controller;

use App\Entity\Processus;
use App\Form\ProcessusType;
use App\Repository\ProcessusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/processus")
 */
class ProcessusController extends AbstractController
{
    /**
     * @Route("/", name="processus_index", methods={"GET"})
     */
    public function index(ProcessusRepository $processusRepository): Response
    {
        return $this->render('processus/index.html.twig', [
            'processuses' => $processusRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="processus_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $processu = new Processus();
        $form = $this->createForm(ProcessusType::class, $processu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($processu);
            $entityManager->flush();

            return $this->redirectToRoute('processus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('processus/new.html.twig', [
            'processu' => $processu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="processus_show", methods={"GET"})
     */
    public function show(Processus $processu): Response
    {
        return $this->render('processus/show.html.twig', [
            'processu' => $processu,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="processus_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Processus $processu): Response
    {
        $form = $this->createForm(ProcessusType::class, $processu);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('processus_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('processus/edit.html.twig', [
            'processu' => $processu,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="processus_delete", methods={"POST"})
     */
    public function delete(Request $request, Processus $processu): Response
    {
        if ($this->isCsrfTokenValid('delete'.$processu->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($processu);
            $entityManager->flush();
        }

        return $this->redirectToRoute('processus_index', [], Response::HTTP_SEE_OTHER);
    }
}

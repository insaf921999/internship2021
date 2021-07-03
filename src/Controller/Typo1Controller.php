<?php

namespace App\Controller;

use App\Entity\Typo1;
use App\Form\Typo1Type;
use App\Repository\Typo1Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typo1")
 */
class Typo1Controller extends AbstractController
{
    /**
     * @Route("/", name="typo1_index", methods={"GET"})
     */
    public function index(Typo1Repository $typo1Repository): Response
    {
        return $this->render('typo1/index.html.twig', [
            'typo1s' => $typo1Repository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="typo1_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typo1 = new Typo1();
        $form = $this->createForm(Typo1Type::class, $typo1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typo1);
            $entityManager->flush();

            return $this->redirectToRoute('typo1_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('typo1/new.html.twig', [
            'typo1' => $typo1,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typo1_show", methods={"GET"})
     */
    public function show(Typo1 $typo1): Response
    {
        return $this->render('typo1/show.html.twig', [
            'typo1' => $typo1,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="typo1_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Typo1 $typo1): Response
    {
        $form = $this->createForm(Typo1Type::class, $typo1);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typo1_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('typo1/edit.html.twig', [
            'typo1' => $typo1,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typo1_delete", methods={"POST"})
     */
    public function delete(Request $request, Typo1 $typo1): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typo1->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typo1);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typo1_index', [], Response::HTTP_SEE_OTHER);
    }
}

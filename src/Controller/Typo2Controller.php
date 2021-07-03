<?php

namespace App\Controller;

use App\Entity\Typo2;
use App\Form\Typo2Type;
use App\Repository\Typo2Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typo2")
 */
class Typo2Controller extends AbstractController
{
    /**
     * @Route("/", name="typo2_index", methods={"GET"})
     */
    public function index(Typo2Repository $typo2Repository): Response
    {
        return $this->render('typo2/index.html.twig', [
            'typo2s' => $typo2Repository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="typo2_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typo2 = new Typo2();
        $form = $this->createForm(Typo2Type::class, $typo2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typo2);
            $entityManager->flush();

            return $this->redirectToRoute('typo2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('typo2/new.html.twig', [
            'typo2' => $typo2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typo2_show", methods={"GET"})
     */
    public function show(Typo2 $typo2): Response
    {
        return $this->render('typo2/show.html.twig', [
            'typo2' => $typo2,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="typo2_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Typo2 $typo2): Response
    {
        $form = $this->createForm(Typo2Type::class, $typo2);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typo2_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('typo2/edit.html.twig', [
            'typo2' => $typo2,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typo2_delete", methods={"POST"})
     */
    public function delete(Request $request, Typo2 $typo2): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typo2->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typo2);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typo2_index', [], Response::HTTP_SEE_OTHER);
    }
}

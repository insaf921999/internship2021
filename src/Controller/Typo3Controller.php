<?php

namespace App\Controller;

use App\Entity\Typo3;
use App\Form\Typo3Type;
use App\Repository\Typo3Repository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/typo3")
 */
class Typo3Controller extends AbstractController
{
    /**
     * @Route("/", name="typo3_index", methods={"GET"})
     */
    public function index(Typo3Repository $typo3Repository): Response
    {
        return $this->render('typo3/index.html.twig', [
            'typo3s' => $typo3Repository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="typo3_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $typo3 = new Typo3();
        $form = $this->createForm(Typo3Type::class, $typo3);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($typo3);
            $entityManager->flush();

            return $this->redirectToRoute('typo3_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('typo3/new.html.twig', [
            'typo3' => $typo3,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typo3_show", methods={"GET"})
     */
    public function show(Typo3 $typo3): Response
    {
        return $this->render('typo3/show.html.twig', [
            'typo3' => $typo3,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="typo3_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Typo3 $typo3): Response
    {
        $form = $this->createForm(Typo3Type::class, $typo3);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typo3_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('typo3/edit.html.twig', [
            'typo3' => $typo3,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="typo3_delete", methods={"POST"})
     */
    public function delete(Request $request, Typo3 $typo3): Response
    {
        if ($this->isCsrfTokenValid('delete'.$typo3->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($typo3);
            $entityManager->flush();
        }

        return $this->redirectToRoute('typo3_index', [], Response::HTTP_SEE_OTHER);
    }
}

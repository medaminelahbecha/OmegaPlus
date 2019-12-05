<?php

namespace BibliothequeBundle\Controller;

use BibliothequeBundle\Entity\Livres;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Livre controller.
 *
 */
class LivresController extends Controller
{
    /**
     * Lists all livre entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $livres = $em->getRepository('BibliothequeBundle:Livres')->findAll();

        return $this->render('@Bibliotheque/livres/index.html.twig', array(
            'livres' => $livres,
        ));
    }

    /**
     * Creates a new livre entity.
     *
     */
    public function newAction(Request $request)
    {
        $livre = new Livres();
        $form = $this->createForm('BibliothequeBundle\Form\LivresType', $livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($livre);
            $em->flush();

            return $this->redirectToRoute('livres_show', array('idLivre' => $livre->getIdlivre()));
        }

        return $this->render('@Bibliotheque/livres/new.html.twig', array(
            'livre' => $livre,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a livre entity.
     *
     */
    public function showAction(Livres $livre)
    {


        return $this->render('@Bibliotheque/livres/show.html.twig', array(
            'livre' => $livre,

        ));
    }

    /**
     * Displays a form to edit an existing livre entity.
     *
     */
    public function editAction(Request $request, Livres $livre)
    {
        $deleteForm = $this->createDeleteForm($livre);
        $editForm = $this->createForm('BibliothequeBundle\Form\LivresType', $livre);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('livres_edit', array('idLivre' => $livre->getIdlivre()));
        }

        return $this->render('@Bibliotheque/livres/edit.html.twig', array(
            'livre' => $livre,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a livre entity.
     *
     */
    public function deleteAction(Request $request, Livres $livre)
    {
        $form = $this->createDeleteForm($livre);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($livre);
            $em->flush();
        }

        return $this->redirectToRoute('livres_index');
    }

    /**
     * Creates a form to delete a livre entity.
     *
     * @param Livres $livre The livre entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Livres $livre)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('livres_delete', array('idLivre' => $livre->getIdlivre())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

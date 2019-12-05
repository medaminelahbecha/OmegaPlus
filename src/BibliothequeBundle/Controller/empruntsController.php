<?php

namespace BibliothequeBundle\Controller;

use BibliothequeBundle\Entity\Emprunts;
use BibliothequeBundle\Entity\FosUser;
use BibliothequeBundle\Entity\Livres;
use http\Env\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Emprunt controller.
 *
 */


class empruntsController extends Controller
{
    /**
     * Lists all emprunt entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();



        $emprunt = $em->createQuery('select i from BibliothequeBundle:Emprunts i where i.FosUser=:FosUser')->setParameter('FosUser',$user);
        $emprunts=$emprunt->getResult();
        return $this->render('@Bibliotheque/emprunts/index.html.twig', array(
            'emprunts' => $emprunts,
        ));
    }



    /**
     * Creates a new emprunt entity.
     *
     */
    public function newAction(Request $request )
    {

        $emprunt = new Emprunts();

        $form = $this->createForm('BibliothequeBundle\Form\empruntsType', $emprunt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $userid = $this->container->get('security.token_storage')->getToken()->getUser()->getId();
            $user = $em->getRepository('BibliothequeBundle:fosUser')->find($userid);
           $idlivre= $emprunt->getLivres()->getIdLivre();
           $livre=$em->getRepository('BibliothequeBundle:livres')->find($idlivre);
           if($livre->getNombreexemplaire()>0) {
               $livre->setNombreexemplaire($livre->getNombreexemplaire() - 1);


               $emprunt->setFosUser($user);
               $em->persist($livre);
               $em->persist($emprunt);
               $em->flush();

               return $this->redirectToRoute('emprunts_show', array('idem' => $emprunt->getIdem()));
           }else{

               $this->get('session')->getFlashBag()->add(
                   'notice',
                   'le livre n est pas disponible'
               );
           }
        }

        $id=$emprunt->getFosUser();
        $emprunt->setFosUser($id);
        return $this->render('@Bibliotheque/emprunts/new.html.twig', array(
            'emprunt' => $emprunt,
            'form' => $form->createView()
        ));
    }

    /**
     * Finds and displays a emprunt entity.
     *
     */
    public function showAction(emprunts $emprunt)
    {
        $deleteForm = $this->createDeleteForm($emprunt);

        return $this->render('@Bibliotheque/emprunts/show.html.twig', array(
            'emprunt' => $emprunt,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing emprunt entity.
     *
     */
    public function editAction(Request $request, emprunts $emprunt)
    {
        $deleteForm = $this->createDeleteForm($emprunt);
        $editForm = $this->createForm('BibliothequeBundle\Form\empruntsType', $emprunt);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('emprunts_edit', array('idem' => $emprunt->getIdem()));
        }

        return $this->render('@Bibliotheque/emprunts/edit.html.twig', array(
            'emprunt' => $emprunt,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a emprunt entity.
     *
     */
    public function deleteAction(Request $request, emprunts $emprunt)
    {
        $form = $this->createDeleteForm($emprunt);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $idlivre= $emprunt->getLivres()->getIdLivre();
            $livre=$em->getRepository('BibliothequeBundle:livres')->find($idlivre);

                $livre->setNombreexemplaire($livre->getNombreexemplaire() + 1);
            $em->remove($emprunt);
            $em->persist($livre);
            $em->flush();
        }

        return $this->redirectToRoute('livres_index');
    }

    /**
     * Creates a form to delete a emprunt entity.
     *
     * @param emprunts $emprunt The emprunt entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(emprunts $emprunt)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('emprunts_delete', array('idem' => $emprunt->getIdem())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }


    public function pdfAction(emprunts $emprunt)

    {

        $snappy=$this->get('knp_snappy.pdf');

           $html= $this->renderView(
                '@Bibliotheque/emprunts/pdf.html.twig',
                array(
                    'emprunt'  => $emprunt
                ));


        $filename ="downloadpdf";
        return new \Symfony\Component\HttpFoundation\Response($snappy->getOutputFromHtml($html),200,array(
            'Content-Type'=>"application/pdf",
            'Content-Disposition'=>'attachment ; filename="'.$filename.'.pdf"'
        ));

    }


}

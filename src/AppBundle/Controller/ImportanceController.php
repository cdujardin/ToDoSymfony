<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Importance;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Importance controller.
 *
 * @Route("importance")
 */
class ImportanceController extends Controller
{
    /**
     * Lists all importance entities.
     *
     * @Route("/", name="importance_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $importances = $em->getRepository('AppBundle:Importance')->findAll();

        return $this->render('importance/index.html.twig', array(
            'importances' => $importances,
        ));
    }

    /**
     * Creates a new importance entity.
     *
     * @Route("/new", name="importance_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $importance = new Importance();
        $form = $this->createForm('AppBundle\Form\ImportanceType', $importance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($importance);
            $em->flush($importance);

            return $this->redirectToRoute('importance_show', array('id' => $importance->getId()));
        }

        return $this->render('importance/new.html.twig', array(
            'importance' => $importance,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a importance entity.
     *
     * @Route("/{id}", name="importance_show")
     * @Method("GET")
     */
    public function showAction(Importance $importance)
    {
        $deleteForm = $this->createDeleteForm($importance);

        return $this->render('importance/show.html.twig', array(
            'importance' => $importance,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing importance entity.
     *
     * @Route("/{id}/edit", name="importance_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Importance $importance)
    {
        $deleteForm = $this->createDeleteForm($importance);
        $editForm = $this->createForm('AppBundle\Form\ImportanceType', $importance);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('importance_edit', array('id' => $importance->getId()));
        }

        return $this->render('importance/edit.html.twig', array(
            'importance' => $importance,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a importance entity.
     *
     * @Route("/{id}", name="importance_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Importance $importance)
    {
        $form = $this->createDeleteForm($importance);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($importance);
            $em->flush($importance);
        }

        return $this->redirectToRoute('importance_index');
    }

    /**
     * Creates a form to delete a importance entity.
     *
     * @param Importance $importance The importance entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Importance $importance)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('importance_delete', array('id' => $importance->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

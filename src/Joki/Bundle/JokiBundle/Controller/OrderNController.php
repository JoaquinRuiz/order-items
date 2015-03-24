<?php

namespace Joki\Bundle\JokiBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Joki\Bundle\JokiBundle\Entity\OrderN;
use Joki\Bundle\JokiBundle\Form\OrderNType;

/**
 * OrderN controller.
 *
 * @Route("/ordern")
 */
class OrderNController extends Controller
{

    /**
     * Lists all OrderN entities.
     *
     * @Route("/", name="ordern")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('JokiJokiBundle:OrderN')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new OrderN entity.
     *
     * @Route("/", name="ordern_create")
     * @Method("POST")
     * @Template("JokiJokiBundle:OrderN:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new OrderN();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('ordern_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a OrderN entity.
     *
     * @param OrderN $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(OrderN $entity)
    {
        $form = $this->createForm(new OrderNType(), $entity, array(
            'action' => $this->generateUrl('ordern_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new OrderN entity.
     *
     * @Route("/new", name="ordern_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new OrderN();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a OrderN entity.
     *
     * @Route("/{id}", name="ordern_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JokiJokiBundle:OrderN')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrderN entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing OrderN entity.
     *
     * @Route("/{id}/edit", name="ordern_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JokiJokiBundle:OrderN')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrderN entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a OrderN entity.
    *
    * @param OrderN $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(OrderN $entity)
    {
        $form = $this->createForm(new OrderNType(), $entity, array(
            'action' => $this->generateUrl('ordern_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing OrderN entity.
     *
     * @Route("/{id}", name="ordern_update")
     * @Method("PUT")
     * @Template("JokiJokiBundle:OrderN:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('JokiJokiBundle:OrderN')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find OrderN entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('ordern_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a OrderN entity.
     *
     * @Route("/{id}", name="ordern_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('JokiJokiBundle:OrderN')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find OrderN entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('ordern'));
    }

    /**
     * Creates a form to delete a OrderN entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ordern_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

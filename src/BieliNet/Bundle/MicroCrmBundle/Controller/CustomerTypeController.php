<?php

namespace BieliNet\Bundle\MicroCrmBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use BieliNet\Bundle\MicroCrmBundle\Entity\CustomerType;
use BieliNet\Bundle\MicroCrmBundle\Form\CustomerTypeType;

/**
 * CustomerType controller.
 *
 * @Route("/customertype")
 */
class CustomerTypeController extends Controller
{

    /**
     * Lists all CustomerType entities.
     *
     * @Route("/", name="customertype")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BieliNetMicroCrmBundle:CustomerType')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new CustomerType entity.
     *
     * @Route("/", name="customertype_create")
     * @Method("POST")
     * @Template("BieliNetMicroCrmBundle:CustomerType:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new CustomerType();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('customertype_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
    * Creates a form to create a CustomerType entity.
    *
    * @param CustomerType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(CustomerType $entity)
    {
        $form = $this->createForm(new CustomerTypeType(), $entity, array(
            'action' => $this->generateUrl('customertype_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new CustomerType entity.
     *
     * @Route("/new", name="customertype_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new CustomerType();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a CustomerType entity.
     *
     * @Route("/{id}", name="customertype_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BieliNetMicroCrmBundle:CustomerType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CustomerType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing CustomerType entity.
     *
     * @Route("/{id}/edit", name="customertype_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BieliNetMicroCrmBundle:CustomerType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CustomerType entity.');
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
    * Creates a form to edit a CustomerType entity.
    *
    * @param CustomerType $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(CustomerType $entity)
    {
        $form = $this->createForm(new CustomerTypeType(), $entity, array(
            'action' => $this->generateUrl('customertype_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing CustomerType entity.
     *
     * @Route("/{id}", name="customertype_update")
     * @Method("PUT")
     * @Template("BieliNetMicroCrmBundle:CustomerType:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BieliNetMicroCrmBundle:CustomerType')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find CustomerType entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('customertype_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a CustomerType entity.
     *
     * @Route("/{id}", name="customertype_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BieliNetMicroCrmBundle:CustomerType')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find CustomerType entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('customertype'));
    }

    /**
     * Creates a form to delete a CustomerType entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('customertype_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

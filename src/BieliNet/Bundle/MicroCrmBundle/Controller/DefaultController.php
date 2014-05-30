<?php

namespace BieliNet\Bundle\MicroCrmBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use BieliNet\Bundle\MicroCrmBundle\Entity\Customer;

class DefaultController extends Controller
{

/**
 * @Route("/customer")
 * @Template("")
 */
	public function customerShowAction()
	{
/*	    $customer = new Customer();
	    $customer->setName('Ala');
	    $customer->setSurname('Kotołśkąjaźż');
	    $customer->setDescription('Lorem ipsum dolor');
	    $customer->setEmail('alak@wp.pl');
            $customer->setPesel('04050634234');
            $customer->setCreatedAt(new \DateTime());

	    $em = $this->getDoctrine()->getManager();
	    $em->persist($customer);
	    $em->flush();
  
	    return new Response('Created customer id ' . $customer->getId());
	    */
	    return "aaa";
	}

/**
 * @Route("/create")
 * @Template("")
 */
	public function createAction()
	{
	    $customer = new Customer();
	    $customer->setName('Ala');
	    $customer->setSurname('Kotołśkąjaźż');
	    $customer->setDescription('Lorem ipsum dolor');
	    $customer->setEmail('alak@wp.pl');
            $customer->setPesel('04050634234');
            $customer->setCreatedAt(new \DateTime());

	    $em = $this->getDoctrine()->getManager();
	    $em->persist($customer);
	    $em->flush();

	    return new Response('Created customer id ' . $customer->getId());
	}

    /**
     * @Route("/klient/{id}")
     * @Template("")
     */
    public function indexAction(Request $r, $id) {
        $customer = $this->getDoctrine()
		->getRepository('BieliNetMicroCrmBundle:Customer')
		->find($id);

	if (!$customer) {
		throw $this->createNotFoundException(
		    'No customer found for id ' . $id
		);
	}

	return $customer;
    }

    /**
     * @Route("/hello2", name="greet")
     * @Template("SensioTrainigBundle:Default:index.html.twig")
     */
    public function hello2Action(Request $r) {
        //$nameFromCookie = $r->getSession()->get('my_name'); //$r->cookies->get('my_name');

        //if (empty($nameFromCookie)) {
        //    throw new NotFoundHttpException('SESSION (or COOKIE ?!) "my_name" is empty!');
        //}

        return array('name' => '123'
        //$nameFromCookie
        );
    }
}

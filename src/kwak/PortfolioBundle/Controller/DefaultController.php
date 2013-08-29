<?php

namespace kwak\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use kwak\PortfolioBundle\Entity\imgSets;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
   	$product = new imgSets();
    $product->setName('A Foo Bar');
    $product->setTitle('lalala');


    $em = $this->getDoctrine()->getManager();
    $em->persist($product);
    $em->flush();

    return new Response('Created product id '.$product->getId());
    }

    public function showAction($id)
	{
    $product = $this->getDoctrine()
        ->getRepository('kwakPortfolioBundle:imgSets')
        ->find($id);

    if (!$product) {
        throw $this->createNotFoundException(
            'No product found for id '.$id
        );
    }
    return $this->render(
        'kwakPortfolioBundle:Default:titles.html.twig',
        array('name' => $product->getName())
    );
	}
}

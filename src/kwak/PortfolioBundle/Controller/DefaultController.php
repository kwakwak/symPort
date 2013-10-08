<?php

namespace kwak\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use kwak\PortfolioBundle\Entity\imgSets;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{

    public function indexAction()
    {

    $repository = $this->getDoctrine()
    ->getRepository('kwakPortfolioBundle:imgSets');

    $imgSets = $repository->findAll();

    
    return $this->render(
        'kwakPortfolioBundle:Default:titles.html.twig',
        array('imgSets' =>  $imgSets)
    );
    }

    public function addAction()
    {
   	$product = new imgSets();
    $product->setName('A Foo Bar');
    $product->setTitle('lalala');


    $em = $this->getDoctrine()->getManager();
    $em->persist($product);
    $em->flush();

    return new Response('Created product id '.$product->getId());
    }
}

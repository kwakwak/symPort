<?php

namespace kwak\PortfolioBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use kwak\PortfolioBundle\Entity\imgSets;
use kwak\PortfolioBundle\Entity\Images;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

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

    public function addAction(Request $request)
    {

        $images = new Images();

        $form = $this->createFormBuilder($images)

            ->add('imgSet', 'entity', array(
                'class' => 'kwakPortfolioBundle:imgSets',
                'property' => 'title',
            ))
            ->add('file')
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $images->upload();
            $images->setImgName($images->path);

            $em->persist($images);
            $em->flush();
        }

        $repository = $this->getDoctrine()
            ->getRepository('kwakPortfolioBundle:Images');

        $allImg = $repository->findAll();

        return $this->render('kwakPortfolioBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
            'allImg' => $allImg,
        ));
    }
    public function createImgSetAction(Request $request)
    {

        $images = new Images();

        $form = $this->createFormBuilder($images)

            ->add('imgSet', 'entity', array(
                'class' => 'kwakPortfolioBundle:imgSets',
                'property' => 'title',
            ))
            ->add('save', 'submit')
            ->getForm();

        $form->handleRequest($request);

        if ($form->isValid()) {

        }

        return $this->render('kwakPortfolioBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

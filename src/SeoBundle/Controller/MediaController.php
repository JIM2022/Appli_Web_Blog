<?php

namespace SeoBundle\Controller;

use SeoBundle\Entity\Media;
use SeoBundle\Form\MediaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MediaController extends Controller
{
    /*public function indexAction(Request $request)
    {
        $em=$this->getDoctrine()->getEntityManager();
        $media = $em->getRepository(Media::class)->findAll();

        $form=$this->createForm(MediaType::class, $media);

        $form->handleRequest($request);

        if($request->isMethod('post'))
        {
            $em->persist($media);
            $em->flush();
        }
        return $this->render('@Seo/Default/photos.html.twig', array(
            'media'=> $media,
            'form'=> $form->createView()
        ));
    }*/

    public function indexAction(Request $request)
    {
        $media = new Media();

        $form =$this->createForm(MediaType::class, $media);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($media);
            $em->flush();

            return $this->redirectToRoute('seo_photo');
        }
        return $this->render('@Seo/Default/photos.html.twig', array(
            'media'=> $media,
            'form'=> $form->createView()

        ));

    }

}



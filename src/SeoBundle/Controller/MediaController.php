<?php

namespace SeoBundle\Controller;

use SeoBundle\Entity\Article;
use SeoBundle\Entity\Media;
use SeoBundle\Form\ArticleType;
use SeoBundle\Form\MediaType;
use SeoBundle\Repository\ArticleRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class MediaController extends Controller
{
    public function listAction()
    {
        $em = $this ->getDoctrine()->getManager();
        $article = $em ->getRepository(Article::class)->findAll();

        return $this->render('@Seo/Default/photos.html.twig', array(
            'articles'=>$article
        ));

    }


    public function addAction(Request $request)
    {
        $article = new Article();

        $form =$this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid())
        {
            $em=$this->getDoctrine()->getManager();
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('add');
        }
        return $this->render('@Seo/Default/photos.html.twig', array (
            'form' => $form->createView()

        ));

    }

    public function pictureFormAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $articles = $em->getRepository(Article::class)->findAll();

        $article = new Article();

        $form = $this->createForm(ArticleType::class, $article);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $em->persist($article);
            $em->flush();

            return $this->redirectToRoute('photo');
        }

        return $this->render('@Seo/Default/photos.html.twig', array(
            'articles' => $articles,
            'form' => $form->createView()

        ));
    }


}


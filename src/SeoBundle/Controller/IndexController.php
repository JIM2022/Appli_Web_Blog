<?php

namespace SeoBundle\Controller;

use SeoBundle\Entity\Article;
use SeoBundle\Form\ArticleType;
use SeoBundle\Form\MediaType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    /*public function indexAction()
    {
        return $this->render('@Seo/Default/index.html.twig');
    }*/

    public function indexAction(Request $request)
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

            return $this->redirectToRoute('homepage');
        }
        return $this->render('@Seo/Default/index.html.twig', array(
            'articles' => $articles,
            'form' => $form->createView()

        ));
    }



}

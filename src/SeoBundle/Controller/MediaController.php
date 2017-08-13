<?php

namespace SeoBundle\Controller;

use SeoBundle\Entity\Article;
use SeoBundle\Form\ArticleType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use SeoBundle\Form\MediaType;
use SeoBundle\Entity\Media;
use SeoBundle\Repository\ArticleRepository;

class MediaController extends Controller
{

    /**
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * List all Destinations & add Destinations
     */
    public function destinationFormAction(Request $request)
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

    public function destinationEditAction(Request $request, Article $article)
    {
        /*$deleteForm = $this->createDeleteForm($article);*/
        $editForm = $this->createForm('SeoBundle\Form\ArticleType', $article);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid())
        {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('photo', array('id' => $article->getId()));
        }

        return $this->render('@Seo/Default/edit_destination.html.twig', array(
            'articles' => $article,
            'form' => $editForm->createView(),
            /*'delete_form' => $deleteForm->createView(),*/
        ));
    }

    public function destinationDeleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $article = $em->getRepository(Article::class)->findOneById($id);
        $em->remove($article);
        $em->flush();

        return $this->redirectToRoute('photo');
    }

    /*public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $activite = $em->getRepository('CoreBundle:Activite')->findOneById($id);
        $em->remove($activite);
        $em->flush();

        return $this->redirectToRoute('core_activite_add');
    }*/
}


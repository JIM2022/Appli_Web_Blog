<?php

namespace SeoBundle\Controller;

use SeoBundle\Entity\Post;
use SeoBundle\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{
   /* public function indexAction()
    {
        return $this->render('SeoBundle:Blog:blog.html.twig');
    }*/

    public function indexFormAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        /* Je récupère par date de création*/
        $posts = $em->getRepository(Post::class)->findBy(array(), array('id' => 'DESC'));
        $post = new Post();

        $form =$this->createForm(PostType::class, $post);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $em->persist($post);
            $em->flush();

            return $this->redirectToRoute('blog_index');
        }
        return $this->render('@Seo/Blog/blog.html.twig', array(
            'posts' => $posts,
            'form' => $form->createView()

        ));
    }

    /**
     * @param Request $request
     * @param Post $post
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editPostAction(Request $request, Post $post)
    {
        $editPost = $this->createForm('SeoBundle\Form\PostType' , $post);
        $editPost->handleRequest($request);

        if($editPost->isValid() && $editPost->isSubmitted())
        {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('blog_index', array('id' => $post->getId()));
        }
        return $this->render('@Seo/Blog/edit_post.html.twig', array(
            'posts'=> $post,
            'form' => $editPost->createView(),
        ));
    }

    /**
     * @param $id
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deletePostAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository(Post::class)->findOneById($id);
        $em->remove($post);
        $em->flush();

        return $this->redirectToRoute('blog_index');

    }
}

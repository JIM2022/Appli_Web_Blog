<?php

namespace SeoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('SeoBundle:Default:index.html.twig');
    }
}

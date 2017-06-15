<?php

namespace SeoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MediaController extends Controller
{
    public function indexAction()
    {
        return $this->render('@Seo/Default/photos.html.twig');
    }
}

<?php

namespace Blog\BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('BlogBlogBundle:Default:index.html.twig');
    }
     public function registerAction()
    {
        return $this->render('BlogBlogBundle:Default:register.html.twig');
    }
    public function loginAction()
    {
        return $this->render('BlogBlogBundle:Default:login.html.twig');
    }
}

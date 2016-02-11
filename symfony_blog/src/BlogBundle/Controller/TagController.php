<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class TagController extends Controller
{
    public function tagsAction()
    {
        return $this->render('BlogBundle:Tag:tags.html.twig');
    }

    public function newAction()
    {
        return $this->render('BlogBundle:Tag:new.html.twig');
    }
}

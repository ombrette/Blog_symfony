<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CategoryController extends Controller
{
    public function postsByCategoryAction()
    {
        return $this->render('BlogBundle:Category:postsByCateg.html.twig');
    }

    public function categoriesAction()
    {
        return $this->render('BlogBundle:Category:categories.html.twig');
    }

    public function newAction()
    {
        return $this->render('BlogBundle:Category:new.html.twig');
    }
}

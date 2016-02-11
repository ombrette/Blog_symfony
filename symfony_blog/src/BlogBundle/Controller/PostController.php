<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use BlogBundle\Form\Type\PostType;
use BlogBundle\Entity\Post;

class PostController extends Controller
{
    public function postsAction()
    {
    	$repository = $this->getDoctrine()->getRepository('TestBundle:Post');

    	$posts = $repository->getAll();

        return $this->render('BlogBundle:Post:posts.html.twig', [
        		'posts' => $posts
        	]);
    }

    public function showAction()
    {
        return $this->render('BlogBundle:Post:show.html.twig');
    }

    public function newAction()
    {
        return $this->render('BlogBundle:Post:new.html.twig');
    }
}

<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class DefaultController extends Controller
{
	/**
     * @Route("/")
     */
    public function indexAction()
    {
        $repository = $this->getDoctrine()->getRepository('BlogBundle:Post');

        $posts = $repository->getByNumber(5);

        return $this->render('BlogBundle:Default:index.html.twig', [
                'posts' => $posts
            ]);
    }

    public function adminAction()
    {
        $repository = $this->getDoctrine()->getRepository('BlogBundle:Post');

        $posts = $repository->getAll();

        $repository = $this->getDoctrine()->getRepository('BlogBundle:Category');

        $categories = $repository->getAll();

        $repository = $this->getDoctrine()->getRepository('BlogBundle:Tag');

        $tags = $repository->getAll();

        return $this->render('BlogBundle:Admin:admin.html.twig', [
                'posts' => $posts,
                'categories' => $categories,
                'tags' => $tags
            ]);
    }
}

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
    	$repository = $this->getDoctrine()->getRepository('BlogBundle:Post');

    	$posts = $repository->getAll();

        return $this->render('BlogBundle:Post:posts.html.twig', [
        		'posts' => $posts
        	]);
    }

    public function showAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('BlogBundle:Post');

        $single = $repository->getOne($id);

        return $this->render('BlogBundle:Post:show.html.twig', [
                'single' => $single,
            ]);
    }

    public function newAction(Request $request)
    {
        //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY'))
        {
            //Faire ceci si mon utilisateur est connecté
        }

        //Récupère l'utilisateur connecté
        $user = $this->get('security.token_storage')->getToken()->getUser();

        $post = new Post();
        $post->setAuthor($user);

        $form = $this->createForm(PostType::class, $post);

        $form->handleRequest($request);
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager(); //Récupère entity manager

            $em->persist($post);
            $em->flush($post);

            return $this->redirectToRoute('test_single', ['id' => $post->getId()]);
        }

        return $this->render('BlogBundle:Post:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

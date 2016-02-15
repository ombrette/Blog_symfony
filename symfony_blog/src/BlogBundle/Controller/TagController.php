<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use BlogBundle\Form\Type\TagType;
use BlogBundle\Entity\Tag;

class TagController extends Controller
{
    public function tagsAction()
    {
        $repository = $this->getDoctrine()->getRepository('BlogBundle:Tag');

        $tags = $repository->getAll();

        return $this->render('BlogBundle:Tag:tags.html.twig', [
                'tags' => $tags
            ]);
    }

    public function newAction(Request $request)
    {
         //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY'))
        {
            //Faire ceci si mon utilisateur est connecté
        }

        $tag = new Tag();

        $form = $this->createForm(TagType::class, $tag);

        $form->handleRequest($request);
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager(); //Récupère entity manager

            $em->persist($tag);
            $em->flush($tag);

            return $this->redirectToRoute('BlogBundle_admin_tags');
        }

        return $this->render('BlogBundle:Tag:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

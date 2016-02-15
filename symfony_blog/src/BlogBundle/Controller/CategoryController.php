<?php

namespace BlogBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use BlogBundle\Form\Type\CategoryType;
use BlogBundle\Entity\Category;

class CategoryController extends Controller
{
    public function postsByCategoryAction()
    {
        return $this->render('BlogBundle:Category:postsByCateg.html.twig');
    }

    public function categoriesAction()
    {
        $repository = $this->getDoctrine()->getRepository('BlogBundle:Category');

        $categories = $repository->getAll();

        return $this->render('BlogBundle:Category:categories.html.twig', [
                'categories' => $categories
            ]);
    }

    public function newAction(Request $request)
    {
         //$this->denyAccessUnlessGranted('ROLE_ADMIN', null, 'Unable to access this page!');

        if($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_FULLY'))
        {
            //Faire ceci si mon utilisateur est connecté
        }

        $category = new Category();

        $form = $this->createForm(CategoryType::class, $category);

        $form->handleRequest($request);
        if($form->isValid()){
            $em = $this->getDoctrine()->getManager(); //Récupère entity manager

            $em->persist($category);
            $em->flush($category);

            return $this->redirectToRoute('BlogBundle_admin_categories');
        }

        return $this->render('BlogBundle:Category:new.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

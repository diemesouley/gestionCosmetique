<?php

namespace App\Controller;

use App\Entity\Categorie;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class CategorieController extends AbstractController
{
    /**
     * @Route("/categorie/new", name="categorie_new")
     */
    public function add(Request $request)
    {

        $cat = new Categorie();
        $c = $this->createFormBuilder($cat)
        ->add('libelle', TextType::class, array(
             'attr' => array('class'=> 'form-control'),
         ))
        ->add('save', SubmitType::class, array('label'=> 'Enregistrer'))
        ->getForm();
        $c->handleRequest($request);
        if($c->isSubmitted() && $c->isValid()) {
            $em=$this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();
        }
        $repository = $this->getDoctrine()->getRepository(Categorie::class);
        $cats = $repository->findAll();
        return $this->render('categorie/add.html.twig',['c'=>$c->createView(),
        'cats'=>$cats]
        );
    }

    /**
     * @Route("/delete_categorie/{id}", name="categorie_del")
     */
    public function delCategorie($id=null) {

        $repository= $this->getDoctrine()->getRepository(Categorie::class);
        $cat=$repository->find($id);
        $em=$this->getDoctrine()->getManager();
        $em->remove($cat);
        $em->flush();
        return $this->redirectToRoute('categorie_new');
    }
}
<?php


namespace App\Controller;


use App\Form\IndexFormType;
use App\Model\IndexForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function indexForm(): Response
    {
        $model = new IndexForm();
        $form = $this->createForm(IndexFormType::class, $model, ['attr' => ['id' => 'index-form']])
            ->add('submit', SubmitType::class);

        return $this->render('default/index_form.html.twig', ['form' => $form->createView()]);
    }
}
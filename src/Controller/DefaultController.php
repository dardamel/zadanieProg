<?php


namespace App\Controller;


use App\Form\IndexFormType;
use App\Model\IndexForm;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends AbstractController
{
    public function indexForm(Request $request): Response
    {
        $model = new IndexForm();
        $form = $this->getIndexFormType($model);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $model = new IndexForm();
            $form = $this->getIndexFormType($model);

            return $this->render('default/index_form.html.twig', ['form' => $form->createView(), 'success' => true]);
        }

        return $this->render('default/index_form.html.twig', ['form' => $form->createView()]);
    }

    private function getIndexFormType(IndexForm $indexForm): Form
    {
        return $this->createForm(IndexFormType::class, $indexForm, [
            'attr' => ['id' => 'index-form'],
        ])->add('submit', SubmitType::class);
    }
}
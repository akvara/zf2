<?php
namespace ArraySort\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\Annotation\AnnotationBuilder;
use ArraySort\Model\TextArea;

class ArraySortController extends AbstractActionController
{
    public function indexAction()
    {
        $student    = new TextArea();
        $builder    = new AnnotationBuilder();
        $form       = $builder->createForm($student);

        $request = $this->getRequest();
        if ($request->isPost()){
            $form->bind($student);
            $form->setData($request->getPost());
            if ($form->isValid()){

                // here
                print_r($form->getData());
            }
        }

        return array('form'=>$form);
    }
}
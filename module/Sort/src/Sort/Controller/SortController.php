<?php
namespace Sort\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\Annotation\AnnotationBuilder;
use Sort\Model\TextArea;

class SortController extends AbstractActionController
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

                $formData = $form->getData();

                $sortableArrray = explode (' ',  $formData->array );
                sort($sortableArrray);
                $sortableArrray = array_diff($sortableArrray, ['']);
//                var_dump($sortableArrray);
                $sortedText = strtoupper(implode(' ', $sortableArrray));
                $form->setData(['array' => $sortedText]);

                return ['form'=>$form];
            }
        }

        return array('form'=>$form);
    }
}
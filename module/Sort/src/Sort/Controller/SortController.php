<?php
namespace Sort\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\Annotation\AnnotationBuilder;
use Sort\Model\SortableArea;

class SortController extends AbstractActionController
{

    private function stringToArray($inputString) {
        $inputString = strtoupper($inputString);
        $inputString = str_replace("\n", ' ', $inputString);
        $inputString = str_replace("\r", ' ', $inputString);
        $sortable = explode (' ',  $inputString );
        sort($sortable);
        $sortable = array_diff($sortable, ['']);
        $sortable = array_unique($sortable);

        return $sortable;
    }

    public function indexAction()
    {
        $sortableArea    = new SortableArea();
        $builder    = new AnnotationBuilder();
        $form       = $builder->createForm($sortableArea);

        $request = $this->getRequest();
        if ($request->isPost()){
            $form->bind($sortableArea);
            $form->setData($request->getPost());
//            var_dump($request->getPost());
//            var_dump($form);
            if ($form->isValid()){

                $formData = $form->getData();

                $sortableArrray = $this->stringToArray($formData->sortableText);
                $comparableArrray = $this->stringToArray($formData->comparableText);
//                var_dump($formData->comparableArrray);

                $sortableTextDiff = implode(' ', array_diff($sortableArrray,$comparableArrray));
                $comparableTextDiff = implode(' ', array_diff($comparableArrray, $sortableArrray));
                $sortedText = strtoupper(implode(' ', $sortableArrray));
                $comparedText = strtoupper(implode(' ', $comparableArrray));
                $form->setData(
                    [
                        'sortableText' => $sortedText,
                        'comparableText' => $comparedText,
                        'sortableTextDiff' => $sortableTextDiff,
                        'comparableTextDiff' => $comparableTextDiff,
                        'compare'=>"Compare"
                    ]
                );

//                return ['form'=>$form];
            }
        }

        return array('form'=>$form);
    }

}
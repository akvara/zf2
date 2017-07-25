<?php
namespace Sort\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\Form\Annotation\AnnotationBuilder;
use Sort\Model\SortableArea;

class SortController extends AbstractActionController
{

    private function stringToArray($inputString, $capitalise, $quotes) {

        if ($capitalise) {
            $inputString = strtoupper($inputString);
        }
        $inputString = str_replace("\n", ' ', $inputString);
        $inputString = str_replace("\r", ' ', $inputString);
        $sortable = explode (' ',  $inputString);
        sort($sortable);
        $sortable = array_diff($sortable, ['']);
        $sortable = array_unique($sortable);
        if ($quotes) {
            $sortable = array_map(function($item) { return '"' . $item . '"'; }, $sortable);
        }

        return $sortable;
    }

    public function indexAction()
    {
        $sortableArea = new SortableArea();
        $builder = new AnnotationBuilder();
        $form = $builder->createForm($sortableArea);

        $request = $this->getRequest();
        if ($request->isPost()){
            $form->bind($sortableArea);
            $form->setData($request->getPost());

            if ($form->isValid()){
                $formData = $form->getData();

                $sortableArrray = $this->stringToArray(
                    $formData->sortableText,
                    $formData->capitalise == "1",
                    $formData->quotes == "1"
                );
                if (strlen($formData->comparableText)) {
                    $comparableArrray = $this->stringToArray($formData->comparableText, $formData->capitalise == "1");
                    $sortableTextDiff = implode(' ', array_diff($sortableArrray,$comparableArrray));
                    $comparableTextDiff = implode(' ', array_diff($comparableArrray, $sortableArrray));
                }
                $sortedText = implode(' ', $sortableArrray);
                $comparedText = implode(' ', $comparableArrray);
                $form->setData(
                    [
                        'sortableText' => $sortedText,
                        'comparableText' => $comparedText,
                        'sortableTextDiff' => $sortableTextDiff,
                        'comparableTextDiff' => $comparableTextDiff,
                        'compare'=>"Sort/Compare"
                    ]
                );

//                return ['form'=>$form];
            }
        }

        return array('form'=>$form);
    }

}
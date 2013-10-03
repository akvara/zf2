<?php

namespace Sort\Model;

use Zend\Form\Annotation;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Submit;


/**
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("SortableArea")
 */
class SortableArea
{
    /**

    /**
     * @Annotation\Type("TextArea")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":" "})
     */
    public $sortableText;

    /**
     * @Annotation\Type("Text")
     * @Annotation\Options({"label":" "})
         */
    public $sortableTextDiff;

    /**
     * @Annotation\Type("TextArea")
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":" "})
     */
    public $comparableText;

//    /**
//     * @Annotation\Type("Submit")
//     * @Annotation\Attributes({"value":"Sort"})
//     */
//    public $sort;

    /**
     * @Annotation\Type("Text")
     * @Annotation\Options({"label":" "})
     */
    public $comparableTextDiff;



    /**
     * @Annotation\Type("Submit")
     * @Annotation\Attributes({"value":"Compare"})
     */
    public $compare;
}
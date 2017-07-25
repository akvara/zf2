<?php

namespace Sort\Model;

use Zend\Form\Annotation;
use Zend\Form\Element\Textarea;
use Zend\Form\Element\Submit;


/**
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("SortableArea")
 * @Annotation\Attributes({"width": 100})

 */
class SortableArea
{
    /**

    /**
     * @Annotation\Type("TextArea")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Attributes({"rows":"5"})
     * @Annotation\Attributes({"cols":"5"})
     * @Annotation\Options({"label":" "})
     */
    public $sortableText;

    /**
     * @Annotation\Type("Text")
     * @Annotation\Options({"label":" "})
//     * @Annotation\Attributes({"width": 100})
     * @Annotation\Attributes({"disabled":"disabled"})
     */
    public $sortableTextDiff;

    /**
     * @Annotation\Type("TextArea")
     * @Annotation\AllowEmpty
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Attributes({"rows":"5"})
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
     * @Annotation\Attributes({"disabled":"disabled"})
     */
    public $comparableTextDiff;

    /**
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     * @Annotation\Options({"label":"Capitalise", "default":"1"})
     */
    public $capitalise;

    /**
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     * @Annotation\Options({"label":"Remove dupplicates", "value":"1"})
     */
    public $de_dupplicate;

    /**
     * @Annotation\Type("Zend\Form\Element\Checkbox")
     * @Annotation\Options({"label":"Add quotes", "default":"1"})
     */
    public $quotes;

    /**
     * @Annotation\Type("Submit")
     * @Annotation\Attributes({"value":"Sort / Compare"})
     */
    public $compare;
}
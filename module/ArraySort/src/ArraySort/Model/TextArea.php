<?php

namespace ArraySort\Model;

use Zend\Form\Annotation;

/**
 * @Annotation\Hydrator("Zend\Stdlib\Hydrator\ObjectProperty")
 * @Annotation\Name("TextArea")
 */
class TextArea
{
    /**

    /**
     * @Annotation\Type("Zend\Form\Element\TextArea")
     * @Annotation\Required({"required":"true" })
     * @Annotation\Filter({"name":"StripTags"})
     * @Annotation\Options({"label":"Array:"})
     */
    public $array;

    /**
     * @Annotation\Type("Zend\Form\Element\Submit")
     * @Annotation\Attributes({"value":"Sort"})
     */
    public $submit;
}
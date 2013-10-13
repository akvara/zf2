<?php
namespace Users\Form;
use Zend\Form\Form;
class RegisterForm extends Form
{
    public function __construct($name = null)
    {
        parent::__construct('Register');
        $this->setAttribute('method', 'post');
        $this->setAttribute('enctype','multipart/form-data');
        $this->add(
            [
                'name' => 'name',
                'attributes' => [
                    'type'  => 'text',
                ],
                'options' => [
                    'label' => 'Full Name',
                ],
            ]
        );
        $this->add(
            [
                'name' => 'email',
                'attributes' => [
                    'type'  => 'email',
                    'required' => 'required'
                ],
                'options' => [
                    'label' => 'Email',
                ],
                'filters' => [
                    ['name' => 'StringTrim'],
                ],
                'validators' => [
                    [
                        'name' => 'EmailAddress',
                        'options' => [
                            'messages' => [
                                \Zend\Validator\EmailAddress::INVALID_FORMAT => 'Email address format is invalid'
                            ]
                        ]
                    ]
                ]
            ]
        );
        $this->add(
            [
                'name' => 'password',
                'attributes' => [
                    'type'  => 'password',
                    'required' => 'required'
                ],
                'options' => [
                    'label' => 'Password',
                ],
                'filters' => [
                    ['name' => 'StringTrim'],
                ],
            ]
        );
        $this->add(
            [
                'name' => 'confirm_password',
                'attributes' => [
                    'type'  => 'password',
                    'required' => 'required'
                ],
                'options' => [
                    'label' => 'Confirm password',
                ],
                'filters' => [
                    ['name' => 'StringTrim'],
                ],
            ]
        );
        $this->add(
            [
                'name' => 'submit',
                'attributes' => [
                    'type' => 'submit',
                    'value' => 'Submit',
                ],
            ]
        );
    }
}

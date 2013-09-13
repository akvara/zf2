<?php
return array(
    'navigation' => array(
        'default' => array(
            array(
                'label' => 'Albums',
                'route' => 'album',
                'pages' => array(
                    array(
                        'label' => 'Add',
                        'route' => 'album',
                        'action' => 'add',
                    ),
                    array(
                        'label' => 'Edit',
                        'route' => 'album',
                        'action' => 'edit',
                    ),
                    array(
                        'label' => 'Delete',
                        'route' => 'album',
                        'action' => 'delete',
                    ),
                ),
            ),
            array(
                'label' => 'Contact',
                'route' => 'contact',
            ),
            'account' => array(
                'label' => 'Account',
                'route' => 'zfcuser',
                'pages' => array(
                    'home' => array(
                        'label' => 'Dashboard',
                        'route' => 'zfcuser',
                    ),
                    'login' => array(
                        'label' => 'Sign In',
                        'route' => 'zfcuser/login',
                    ),
                    'logout' => array(
                        'label' => 'Sign Out',
                        'route' => 'zfcuser/logout',
                    ),
                    'register' => array(
                        'label' => 'Register',
                        'route' => 'zfcuser/register',
                    ),
                ),
            ),
        ),
    ),
 );

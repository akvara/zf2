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
            array(
                'label' => 'Users',
                'route' => 'user',
            ),
        ),
    ),
 );

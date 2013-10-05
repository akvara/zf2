<?php

return [
    'doctrine' => [
        'connection' => [
            'orm_default' => [
                'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                'params' => [
                    'host'      => '',
                    'port'      => '',
                    'user'      => '',
                    'password'  => '',
                    'dbname'    => '',
                ],
            ],
        ],
    ],
];

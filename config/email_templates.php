<?php
// config/email_templates.php

return [
    'user' => [
        'subject' => 'New User Created',
        'lines' => [
            'A new user has been created.',
            'Name: :name',
            'Email: :email',
        ],
    ],
    'machine' => [
        'subject' => 'Machine Registered',
        'lines' => [
            'A new machine has been added.',
            'Model: :model',
            'Serial: :serial',
        ],
    ],
    'botler' => [
        'subject' => 'Botler',
        'lines' => [
            'Botler record received.',
            'ID: :id',
            'Status: :status',
        ],
    ],
    'sub_botler' => [
        'subject' => 'Sub Botler',
        'lines' => [
            'Sub Botler record received.',
            'ID: :id',
            'Status: :status',
        ],
    ],
    'assign_machine_to_botler' => [
        'subject' => 'Assign Machine To Botler',
        'lines' => [
            'Assign Machine To Botler record received.',
            'ID: :id',
            'Status: :status',
        ],
    ],
    'assign_machine_to_sub_botler' => [
        'subject' => 'Assign Machine To Sub Botler',
        'lines' => [
            'Assign Machine To Sub Botler record received.',
            'ID: :id',
            'Status: :status',
        ],
    ],
];

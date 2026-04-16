<?php
$customers = [
    [
        'name'         => 'joao',
        'email'        => 'joao@email.com',
        'password'     => password_hash('1234', PASSWORD_DEFAULT),
        'nivel_acesso' => 'customer'
    ],
    [
        'name'         => 'admin',
        'email'        => 'admin@email.com',
        'password'     => password_hash('admin123', PASSWORD_DEFAULT),
        'nivel_acesso' => 'admin'
    ],
];
?>
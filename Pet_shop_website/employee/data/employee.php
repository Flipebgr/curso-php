<?php
$employees = [
    [
        'name'         => 'admin1',
        'email'        => 'admin1@email.com',
        'password'     => password_hash('78910', PASSWORD_DEFAULT),
        'nivel_acesso' => 'admin',
        'id' => 1
    ],
    [
        'name'         => 'Dr.Paul Atreides',
        'email'        => 'paulatreides@gmail.com',
        'password'     => password_hash('dune123', PASSWORD_DEFAULT),
        'nivel_acesso' => 'employee',
        'id' => 2
    ],
];
?>
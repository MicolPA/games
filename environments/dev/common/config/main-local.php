<?php
return [
    'components' => [
        'db' => [
            'class' => 'yii\db\Connection',
            'dsn' => 'mysql:host=localhost;dbname=des_games',
            'username' => 'des_root',
            'password' => 'root008-',
            'charset' => 'utf8',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            'viewPath' => '@common/mail',
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'micolpa08@gmail.com',
                'password' => 'buscando',
                'port' => '587',
                'encryption' => 'tls',
            ],
        ],
    ],
];

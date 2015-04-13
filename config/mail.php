<?php
return [
'driver' => env('MAIL_DRIVER','mail'),
'host' => env('MAIL_HOST', 'smtp.gmail.com'),
'port' => env('MAIL_PORT', 587),
'from' => ['address' =>"suporte@bancom.com" , 'name' => "Banco M"],
'encryption' => 'tls',
'username' => env('MAIL_USERNAME'),
'password' => env('MAIL_PASSWORD'),
'sendmail' => '/usr/sbin/sendmail -bs',
'pretend' => false,
];
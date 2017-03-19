<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings

         // Database connection settings           
          "db" => [
            "host" => "localhost",
            "dbname" => "progettoreti",
            "user" => "root",
            "pass" => "danimon93"
        ],
    ],
];
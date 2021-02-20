<?php
return [

    /*
    |--------------------------------------------------------------------------
    | Allowed Controllers and Methods
    |--------------------------------------------------------------------------
    |   Allowed Controllers and Methods without Authorization
        Example :  contact-page , get JWT before sign in ,...
    |
    */
    'Controllers' => [
        'mainController',
        'identityController',
        'ForumController',
    ],
    'Methods' => [
        'send_mail',
        'user_authentication',
        'get_all_articles',
        'add_new_article',
        'get_comments',
        'add_comment',
        'send_mail',
        'create_pdf_file',
        'user_registration',
        'user_authorization'


    ],
];
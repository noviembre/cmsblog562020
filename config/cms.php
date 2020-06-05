<?php
    return [

        'image' => [
            'directory' => 'app/img',
            'thumbnail' => [
                'width' => '250',
                'height' => '170'
            ]
        ],
        #---- the default_category_id which name is Uncategorized and id is 9, will be protected, and o matter what you cant delete it
    'default_category_id' => 10,
    'protected_user_id' => 1,

    ];
<?php

return [
    'model' => App\Models\Organization_Reviews::class,

    // searchable fields, if you dont want search feature, remove it
    'search' => ['description', 'date_from', ['organization' => 'title'], ['user' => 'name']],

    // Manage actions in crud
    'create' => false,
    'update' => true,
    'delete' => true,

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    'with_auth' => true,

    // Validation in update and create actions
    // It will use Laravel validation system
    'validation' => [
        'title' => 'required',
        'content' => 'required|min:30',
    ],

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "text", "file", "textarea", "password", "number", "email", "select"
    'fields' => [
        'description' => 'text',
        'content' => 'textarea',
        'image' => 'file'
    ],

    // Where files will store for inputs
    'store' => [
        'image' => 'images/articles'
    ],

    // which kind of data should be showed in list page
    'show' => ['description', 'created_at',  ['organizations' => 'title'], ['user' => 'name']],
];

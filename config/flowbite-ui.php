<?php

return [
    'prefix' => 'flowbite',
    /*
    |--------------------------------------------------------------------------
    | FlowBite UI Configuration
    |--------------------------------------------------------------------------
    |
    | This file contains the configuration options for the FlowBite UI package.
    | You can customize various aspects of the package behavior here.
    |
    */

    /*
    |--------------------------------------------------------------------------
    | Theme Configuration
    |--------------------------------------------------------------------------
    |
    | Configure the default theme and available themes for FlowBite UI components.
    |
    */
    'theme' => [
        'default' => 'light',
        'available' => ['light', 'dark'],
    ],

    /*
    |--------------------------------------------------------------------------
    | Component Configuration
    |--------------------------------------------------------------------------
    |
    | Configure default settings for FlowBite UI components.
    |
    */
    'components' => [
        'button' => [
            'default_size' => 'md',
            'default_color' => 'blue',
            'default_variant' => 'solid',
        ],
        'input' => [
            'default_size' => 'md',
            'default_color' => 'gray',
        ],
        'card' => [
            'default_padding' => 'p-6',
            'default_shadow' => 'shadow-sm',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire Configuration
    |--------------------------------------------------------------------------
    |
    | Configure Livewire-specific settings for the package.
    |
    */
    'livewire' => [
        'auto_discover' => true,
        'namespace' => 'QuickPanel\\FlowBiteUI\\Components',
    ],
];


<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Authentication Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
    */

    'title' => 'Create fish',
    'navbar_title' => 'Fish',
    'input' => [
        'enter_name' => 'Enter name',
        'enter_species' => 'Enter species',
        'enter_price' => 'Enter price',
        'enter_family' => 'Enter family',
        'enter_color' => 'Enter color',
        'enter_size' => 'Enter size',
        'enter_temperament' => 'Enter temperament',
        'enter_stock' => 'Enter stock',
        'select_image' => 'Select an image',
        'create' => 'Create',
    ],
    'label' => [
        'name' => 'Name',
        'species' => 'Species',
        'price' => 'Price',
        'family' => 'Family',
        'color' => 'Color',
        'size' => 'Size',
        'temperament' => 'Temperament',
        'stock' => 'Stock',
        'priceHB' => 'Price must be greater than 0',
        'stockHB' => 'Stock must be greater than 0',
        'image' => 'Select an image',
        'envoronmental_condition' => 'Select an environmental condition'
    ],
    'temperament_options' => [
        'passive' => 'Passive',
        'agressive' => 'Agressive',
    ],
    'size_options' => [
        'small' => 'Small',
        'medium' => 'Medium',
        'large' => 'Large',
    ],
    'environmental_conditions' => [
        'ph_LR' => 'PH Lower Range',
        'ph_HR' => 'PH Higher Range',
        'temperature_LR' => 'Temperature Lower Range',
        'temperature_HR' => 'Temperature Higher Range',
        'hardness_LR' => 'Hardness Lower Range',
        'hardness_HR' => 'Hardness Higher Range',
    ],
    'create_environmental_condition' => 'Please create first an environmental condition then you can create a fish',
    'succesful' => 'Item created successfully!',
];
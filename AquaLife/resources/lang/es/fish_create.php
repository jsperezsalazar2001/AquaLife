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

    'title' => 'Crear pez',
    'navbar_title' => 'Pez',
    'input' => [
        'enter_name' => 'Ingresar nombre',
        'enter_species' => 'Ingresar especie',
        'enter_price' => 'Ingresar precio',
        'enter_family' => 'Ingresar familia',
        'enter_color' => 'Ingresar color',
        'enter_size' => 'Ingresar tamaño',
        'enter_temperament' => 'Ingresar temperamento',
        'enter_stock' => 'Ingresar stock',
        'select_image' => 'Seleccione una imagen',
        'create' => 'Crear',
    ],
    'label' => [
        'name' => 'Nombre',
        'species' => 'Especie',
        'price' => 'Precio',
        'family' => 'Familia',
        'color' => 'Color',
        'size' => 'Tamaño',
        'temperament' => 'Temperamento',
        'stock' => 'Stock',
        'priceHB' => 'El precio debe ser mayor a 0',
        'stockHB' => 'El Stock debe ser mayor a 0',
        'image' => 'Seleccione una imagen',
        'envoronmental_condition' => 'Seleccione una condición ambiental'
    ],
    'temperament_options' => [
        'passive' => 'Pasivo',
        'agressive' => 'Agresivo',
    ],
    'size_options' => [
        'small' => 'Pequeño',
        'medium' => 'Mediano',
        'large' => 'Grande',
    ],
    'environmental_conditions' => [
        'ph_LR' => 'Ingrese el valor mínimo de PH',
        'ph_HR' => 'Ingrese el valor máximo de PH',
        'temperature_LR' => 'Ingrese el valor mínimo de la temperatura',
        'temperature_HR' => 'Ingrese el valor máximo de la temperatura',
        'hardness_LR' => 'Ingrese el valor mínimo de la dureza del agua',
        'hardness_HR' => 'Ingrese el valor máximo de la dureza del agua',
    ],
    'create_environmental_condition' => 'Para crear un pez primero debe ser creada una condición ambiental',
    'succesful' => '¡Pez creado exitosamente!',
];
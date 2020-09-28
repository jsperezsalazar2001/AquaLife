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

    'title' => 'Crear una condición ambiental',
    'input' => [
        'ph_LR' => 'Ingrese el valor mínimo de PH',
        'ph_HR' => 'Ingrese el valor máximo de PH',
        'temperature_LR' => 'Ingrese el valor mínimo de la temperatura',
        'temperature_HR' => 'Ingrese el valor máximo de la temperatura',
        'hardness_LR' => 'Ingrese el valor mínimo de la dureza del agua',
        'hardness_HR' => 'Ingrese el valor máximo de la dureza del agua',
        'update' => 'Actualizar',
    ],
    'label' => [
        'ph_LR' => 'Valor mínimo del PH',
        'ph_HR' => 'Valor máximo del PH',
        'temperature_LR' => 'Valor mínimo de la temperatura ',
        'temperature_HR' => 'Valor máximo de la temperatura ',
        'hardness_LR' => 'Valor mínimo de la dureza del agua ',
        'hardness_HR' => 'Valor máximo de la dureza del agua ',
        'phHrHB' => 'El valor máximo del PH debe ser un número mayor a 0',
        'phLrHB' => 'El valor mínimo del PH debe ser un número mayor a 0',
        'temperatureHrHB' => 'El valor máximo de la temperatura debe ser un número mayor a 0',
        'temperatureLrHB' => 'El valor mínimo de la temperatura debe ser un número mayor a 0',
        'hardnessHrHB' => 'El valor máximo de la dureza del agua debe ser un número mayor a 0',
        'hardnessLrHB' => 'El valor mínimo de la dureza del agua debe ser un número mayor a 0',
    ],
    'succesful' => '¡La condición ambiental fue actulizada correctamente!',
];
<?php
$precios = [
    'p001' => 1.5,
    'p002' => 2.5,
    'p003' => 11,
    'p004' => 1.5,
    'p005' => 5,
    'p006' => 22,
    'p007' => 18.5,
    'p008' => 15,
    'p009' => 7.5,
    'p010' => 1,
];

$descripciones = [
    'p001' => 'Muñequito',
    'p002' => 'Tasita',
    'p003' => 'Ramen ',
    'p004' => 'Pokemon',
    'p005' => 'Peluche pokebola',
    'p006' => 'Chocolate',
    'p007' => 'Collar',
    'p008' => 'Crema',
    'p009' => 'Pulcera',
    'p010' => 'Reloj',
];

function asignaPrecio($codigo) {
    global $precios;
    return $precios[$codigo] ?? null;
}

function muestraDescripcion($codigo) {
    global $descripciones;
    return $descripciones[$codigo] ?? 'Descripción no encontrada';
}
?>

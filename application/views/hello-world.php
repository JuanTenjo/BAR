<?php
/* Call this file 'hello-world.php' */
require __DIR__ . '/vendor/autoload.php';
use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;
use Mike42\Escpos\EscposImage;
$connector = new FilePrintConnector("php://stdout");
$printer = new Printer($connector);

/* Inicializar Impresion */
$printer -> initialize();

$printer -> text("Hello World!\n");

$printer -> cut();

$printer -> close();


?>
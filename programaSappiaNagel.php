<?php

//Incluimos el archivo tateti con todas las funciones basicas
include_once("tateti.php");

//FUNCIONES

/**
 * Modulo para seleccionar una opcion.
 * @return int
 */

function seleccionarOpcion()
{
    //boolean $seguir
    $seguir = true;
    //int $opcion
    while ($seguir) {
        echo "\n************************  MENU DE OPCIONES  ************************\n1. Jugar al tateti.\n2. Mostrar un juego.\n3. Mostrar el primer juego ganador.\n4. Mostrar porcentaje de juegos ganados.\n5. Mostrar resumen de jugador.\n6. Mostrar listado de juegos ordenador por jugador O.\n7. Salir.\n";
        echo "\nTu opcion: ";
        $opcion = trim(fgets(STDIN));
        if ($opcion >= 0 && $opcion <= 7) {
            $seguir = false;
        } else {
            echo "\nLa opcion ingresada no es correcta, intente de nuevo." ;
        }
    }
    return $opcion;
}

/**
 * Modulo para cargar 10 juegos predeterminados
 * @return array
 */
function cargarJuegos()
{
    //Inicializamos el arreglo que va a almacenar los juegos ya creados
    $coleccionJuegosPre = [];
    $coleccionJuegosPre[0] = ["jugadorCruz" => "Jere" , "jugadorCirculo" => "Manu", "puntosCruz" => 1, "puntosCirculo" => 1];
    $coleccionJuegosPre[1] = ["jugadorCruz" => "Jere", "jugadorCirculo" => "Juan", "puntosCruz" => 6, "puntosCirculo" => 0];
    $coleccionJuegosPre[2] = ["jugadorCruz" => "Manu", "jugadorCirculo" => "Cris", "puntosCruz" => 0, "puntosCirculo" => 5];
    $coleccionJuegosPre[3] = ["jugadorCruz" => "Agus", "jugadorCirculo" => "Jere", "puntosCruz" => 6, "puntosCirculo" => 0];
    $coleccionJuegosPre[4] = ["jugadorCruz" => "Manu", "jugadorCirculo" => "Emi", "puntosCruz" => 1, "puntosCirculo" => 1];
    $coleccionJuegosPre[5] = ["jugadorCruz" => "Juan", "jugadorCirculo" => "Jere", "puntosCruz" => 5, "puntosCirculo" => 0];
    $coleccionJuegosPre[6] = ["jugadorCruz" => "Manu", "jugadorCirculo" => "Cris", "puntosCruz" => 0, "puntosCirculo" => 5];
    $coleccionJuegosPre[7] = ["jugadorCruz" => "Agus", "jugadorCirculo" => "Manu", "puntosCruz" => 5, "puntosCirculo" => 0];
    $coleccionJuegosPre[8] = ["jugadorCruz" => "Jere" , "jugadorCirculo" => "Manu", "puntosCruz" => 1, "puntosCirculo" => 1];
    $coleccionJuegosPre[9] = ["jugadorCruz" => "Emi", "jugadorCirculo" => "Agus", "puntosCruz" => 0, "puntosCirculo" => 6];
    return $coleccionJuegosPre;
}






/**
 * PROGRAMA PRINCIPAL
 */

 //Llamamos a la funcion cargarJuegos para inicializar el arreglo con los juegos de tateti
 $juegosTateti = cargarJuegos();

//Declaramos la variable booleana para el ciclo
$seguir = true;
do {
    //Declaramos la variable que va a definir las opciones
    $opcion = seleccionarOpcion();
    switch ($opcion) {
        case 1: {
            $juegosTateti[count($juegosTateti)] = jugar();
            break;
        }
        case 2: {

            break;
        }
        case 3: {

            break;
        }
        case 4: {

            break;
        }
        case 5: {

            break;
        }
        case 6: {

            break;
        }
        case 7: {
            
            $seguir = false;
            break;
        }
        default: {
            
            break;
        }
    }
} while ($seguir);

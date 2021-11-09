<?php

//Incluimos el archivo tateti con todas las funciones basicas
include_once("tateti.php");

/**
 * FUNCIONES
 */

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
    $coleccionJuegosPre[0] = ["jugadorCruz" => "Manu" , "jugadorCirculo" => "Jere", "puntosCruz" => 1, "puntosCirculo" => 1];
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
 * Modulo que se encarga de agregar un juego a la coleccion de juegos
 * @param array $arregloJuegos
 * @param array $juegoNuevo
 * @return array
 */
function agregarJuego($arregloJuegos, $juegoNuevo)
{
    $arregloNuevo = [];
    $arregloNuevo = $arregloJuegos;
    $arregloNuevo[count($arregloNuevo)] = $juegoNuevo;
    return $arregloNuevo;
}

/**
 * Modulo que se encarga de pedir un numero y analizar si esta dentro de un rango
 * @param int $extremo
 * @return int
 */
function chequearNumero($extremo)
{
    //boolean $seguir
    $seguir = true;
    while ($seguir) {
        echo "\nPor favor ingrese un numero valido: ";
        $n = trim(fgets(STDIN));
        if ($n > 0 && $n <= $extremo) {
            $seguir = false;
        } else {
            echo "\nEl numero ingresado no es valido, intente de nuevo: ";
        }
    }
    return $n;
}

/**
 * Modulo que se encarga de devolver un juego del arreglo
 * @param array $arregloJuegos
 * @param int $n
 * @return array
 */
function buscarJuego($arregloJuegos, $n)
{
    $juego = $arregloJuegos[$n];
    return $juego;
}

/**
 * Modulo que se encarga de retornar un string con el resultado de un juego
 * @param array $juego
 * @return string
 */
function cadenaResultado($juego)
{
    if ($juego["puntosCruz"] == 1) {
        $cadena = "Empate";
    } else {
        if ($juego["puntosCruz"] < $juego["puntosCirculo"]) {
            $cadena = "Gano O";
        } else {
            $cadena = "Gano X";
        }
    }
    return $cadena;
}

/**
 * Modulo que se encarga de retornar un string con los datos de un juego determinado para un jugador
 * @param array $juego
 * @param string $jugador
 * @return string
 */
function cadenaJugador($juego, $jugador)
{
    if ($jugador == "X") {
        $cadena = "\nJugador X: " . $juego["jugadorCruz"] . " obtuvo " . $juego["puntosCruz"] . " puntos.";
    } else {
        $cadena = "\nJugador O: " . $juego["jugadorCirculo"] . " obtuvo " . $juego["puntosCirculo"] . " puntos.";
    }
    return $cadena;
}

/**
 * Modulo para mostrar un juego elegido por el usuario
 * @param array $arregloJuegos
 */
function mostrarJuegoDado($arregloJuegos)
{
    //int $n
    $n = chequearNumero(count($arregloJuegos)) - 1;
    $resultado = cadenaResultado($arregloJuegos[$n]);
    echo "\n*************************************\nJuego TATETI: " . $n + 1 . " " . $resultado . "\n" . cadenaJugador($arregloJuegos[$n], "X") . "\n" .  cadenaJugador($arregloJuegos[$n], "O") . "\n*************************************\n";
}

/**
 * Modulo para mostrar un juego en base a un indice ya chequeado
 * @param array $arregloJuegos
 */
function mostrarJuegoChequeado($arregloJuegos, $n)
{
    $resultado = cadenaResultado($arregloJuegos[$n]);
    echo "\n*************************************\nJuego TATETI: " . $n+1 . " " . $resultado ."\n" . cadenaJugador($arregloJuegos[$n], "X") . "\n" .  cadenaJugador($arregloJuegos[$n], "O") . "\n*************************************\n";
}

/**
 * Modulo que se encarga de devolver el primer juego ganado por un jugador ingresado por el usuario
 * @param array $arregloJuegos
 */
function primerVictoria($arregloJuegos)
{
    //int $indiceJuego
    //string $nombre
    echo "\nPor favor ingrese un nombre para buscar su primera victoria (Ejemplo: 'Jere', 'Manu'): ";
    $nombre = trim(fgets(STDIN));
    $indiceJuego = buscarJuegoNombre($arregloJuegos, $nombre);
    if ($indiceJuego >= 0) {
        mostrarJuegoChequeado($arregloJuegos, $indiceJuego);
    } else {
        echo "\nEl jugador ingresado no tiene victorias.";
    }
}

/**
 * Modulo que se encarga de devolver el indice de la primer victoria de un jugador dado
 * @param array $arregloJuegos
 * @param string $nombreDado
 * @return int
 */
function buscarJuegoNombre($arregloJuegos, $nombreDado)
{
    //boolean $seguir
    //int $i
    //Le damos un valor a $indice para chequear al final si el jugador ingresado no tiene victoria
    $indice = -1;
    $seguir = true;
    $i = 0;
    while ($seguir && $i < count($arregloJuegos)) {
        $juego = $arregloJuegos[$i];
        //Comenzamos a comparar por nombre y luego si los puntos significan que gano
        if ($juego["jugadorCruz"] == $nombreDado && $juego["puntosCruz"] > $juego["puntosCirculo"]) {
            $indice = $i;
            $seguir = false;
        } else {
            if ($juego["jugadorCirculo"] == $nombreDado && $juego["puntosCirculo"] > $juego["puntosCirculo"]) {
                $indice = $i;
                $seguir = false;
            } else {
                $i++;
            }
        }
    }
    return $indice;
}

/**
 * Modulo que se encarga de retornar el porcentaje de victoria de uno de los simbolos
 * @param array $arregloJuegos
 * @param string $simbolo
 * @return int
 */
function porcentajeVictoria($arregloJuegos, $simbolo)
{
    //int $contadorVictorias
    //boolean $ganador
    $contadorVictorias = 0;
    for ($i = 0; $i < count($arregloJuegos); $i++) {
        $ganador = simboloGanador(buscarJuego($arregloJuegos, $i), $simbolo);
        if ($ganador == true){
            $contadorVictorias++;
        }
    }
    $porcentaje = (int)((100 * $contadorVictorias) / count($arregloJuegos));
    return $porcentaje;
}

/**
 * Modulo que se encarga de chequear si un simbolo es el ganador de un juego
 * @param array $juego
 * @param string $simbolo
 * @return boolean
 */
function simboloGanador($juego, $simbolo)
{
    if ($simbolo == "X" && $juego["puntosCruz"] > $juego["puntosCirculo"]) {
        return true;
    } else {
        if ($simbolo == "O" && $juego["puntosCirculo"] > $juego["puntosCruz"]) {
            return true;
        } else{
            return false;
        }
    }
}

/**
 * Modulo que se encarga de mostrar el porcentaje de victoria
 * @param array $arregloJuegos
 */
function mostrarPorcentaje ($arregloJuegos){
    //int $porcentaje
    //string $simbolo
    $simbolo = chequearSimbolo();
    $porcentaje = porcentajeVictoria($arregloJuegos,$simbolo);
    echo "\nEl porcentaje de victoria del simbolo $simbolo es de: $porcentaje %. ";
}

/**
 * Modulo que se encarga de chequear que el usuario ingrese un simbolo correcto
 * @return string
 */
function chequearSimbolo () {
    //boolean $seguir
    $seguir = true;
    while ($seguir){
        echo "\nPor favor ingrese el simbolo a buscar su porcentaje (X, O): ";
        $simbolo = trim(fgets(STDIN));
        if ($simbolo == "X" || $simbolo == "O"){
            $seguir = false;
        } else {
            echo "\nEl simbolo ingresado no es correcto, intente de nuevo.";
        }
    }
    return $simbolo;
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
            $juegoNuevo = jugar();
            $juegosTateti = agregarJuego($juegosTateti, $juegoNuevo);
            break;
        }
        case 2: {
            mostrarJuegoDado($juegosTateti);
            break;
        }
        case 3: {
            primerVictoria($juegosTateti);
            break;
        }
        case 4: {
            mostrarPorcentaje($juegosTateti);
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

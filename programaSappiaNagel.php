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
//explicacion 3 punto 1
function cargarJuegos()
{
    
    //Inicializamos el arreglo que va a almacenar los juegos ya creados
    $coleccionJuegosPre = [];
    $coleccionJuegosPre[0] = ["jugadorCruz" => "MANU" , "jugadorCirculo" => "JERE", "puntosCruz" => 1, "puntosCirculo" => 1];
    $coleccionJuegosPre[1] = ["jugadorCruz" => "JERE", "jugadorCirculo" => "JUAN", "puntosCruz" => 6, "puntosCirculo" => 0];
    $coleccionJuegosPre[2] = ["jugadorCruz" => "MANU", "jugadorCirculo" => "CRIS", "puntosCruz" => 0, "puntosCirculo" => 5];
    $coleccionJuegosPre[3] = ["jugadorCruz" => "AGUS", "jugadorCirculo" => "JERE", "puntosCruz" => 6, "puntosCirculo" => 0];
    $coleccionJuegosPre[4] = ["jugadorCruz" => "MANU", "jugadorCirculo" => "EMI", "puntosCruz" => 1, "puntosCirculo" => 1];
    $coleccionJuegosPre[5] = ["jugadorCruz" => "JUAN", "jugadorCirculo" => "JERE", "puntosCruz" => 5, "puntosCirculo" => 0];
    $coleccionJuegosPre[6] = ["jugadorCruz" => "MANU", "jugadorCirculo" => "CRIS", "puntosCruz" => 0, "puntosCirculo" => 5];
    $coleccionJuegosPre[7] = ["jugadorCruz" => "AGUS", "jugadorCirculo" => "MANU", "puntosCruz" => 5, "puntosCirculo" => 0];
    $coleccionJuegosPre[8] = ["jugadorCruz" => "JERE" , "jugadorCirculo" => "MANU", "puntosCruz" => 1, "puntosCirculo" => 1];
    $coleccionJuegosPre[9] = ["jugadorCruz" => "EMI", "jugadorCirculo" => "AGUS", "puntosCruz" => 0, "puntosCirculo" => 6];
    $coleccionJuegosPre = [];

$jg1 = ["jugadorCruz" => "AMARILIS", "jugadorCirculo" => "MILOS",    "puntosCruz" => 1, "puntosCirculo" => 1];
$jg2 = ["jugadorCruz" => "ZENDA",    "jugadorCirculo" => "AMARILIS", "puntosCruz" => 3, "puntosCirculo" => 0];
$jg3 = ["jugadorCruz" => "ZENDA",    "jugadorCirculo" => "MILOS",    "puntosCruz" => 0, "puntosCirculo" => 4];
$jg4 = ["jugadorCruz" => "CALIXTO",  "jugadorCirculo" => "TRUMAN",   "puntosCruz" => 1, "puntosCirculo" => 1];
$jg5 = ["jugadorCruz" => "AMARILIS", "jugadorCirculo" => "MILOS",    "puntosCruz" => 5, "puntosCirculo" => 0];
$jg6 = ["jugadorCruz" => "FEDORA",   "jugadorCirculo" => "CALIXTO",  "puntosCruz" => 0, "puntosCirculo" => 3];
$jg7 = ["jugadorCruz" => "TRUMAN",   "jugadorCirculo" => "AMARILIS", "puntosCruz" => 4, "puntosCirculo" => 0];
$jg8 = ["jugadorCruz" => "CALIXTO",  "jugadorCirculo" => "TRUMAN",   "puntosCruz" => 1, "puntosCirculo" => 1];
$jg9 = ["jugadorCruz" => "TRUMAN",   "jugadorCirculo" => "FEDORA",   "puntosCruz" => 2, "puntosCirculo" => 0];
$jg10= ["jugadorCruz" => "MILOS",    "jugadorCirculo" => "ZENDA",   "puntosCruz" => 1, "puntosCirculo" => 1];

array_push($coleccionJuegosPre, $jg1, $jg2, $jg3, $jg4, $jg5, $jg6, $jg7, $jg8, $jg9, $jg10);

    return $coleccionJuegosPre;
}
                                                                                                                                     
/**
 * Modulo que se encarga de agregar un juego a la coleccion de juegos *
 * @param array $juegoNuevo
 * @return array
 */
//funcion pedida en la explicacion 3 punto 5
function agregarJuego($arregloJuegos, $juegoNuevo)
{
    $juegoNuevo = toupper($juegoNuevo);
    $arregloNuevo = $arregloJuegos;
    $arregloNuevo[count($arregloNuevo)] = $juegoNuevo;
    return $arregloNuevo;
}

/**
 * Modulo que se encarga de devolver el juego nuevo con los nombres en lowercase
 * @param array $juegoNuevo
 * @return array
 */
function toupper($juegoNuevo)
{
    $juegoNuevo["jugadorCruz"] = strtoupper($juegoNuevo["jugadorCruz"]);
    $juegoNuevo["jugadorCirculo"] = strtoupper($juegoNuevo["jugadorCirculo"]);
    return $juegoNuevo;
}

//punto 3 de explicacion 3
/**
 * Modulo que se encarga de pedir un numero y analizar si esta dentro de un rango
 * @param int $inicio
 * @param int $extremo
 * @return int
 */
function chequearNumero($inicio,$extremo)
{
    //boolean $seguir
    $seguir = true;
    while ($seguir) {
        echo "\nPor favor ingrese un numero valido: ";
        $n = trim(fgets(STDIN));
        if ($n > $inicio && $n <= $extremo) {
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
//funcion pedida en explicacion 3 punto 4
function mostrarJuegoDado($arregloJuegos)
{
    //int $n
    $n = chequearNumero(0,count($arregloJuegos)) - 1;
    $resultado = cadenaResultado($arregloJuegos[$n]);
    echo "\n*************************************\nJuego TATETI: " .( $n + 1 ). " " . $resultado . "\n" . cadenaJugador($arregloJuegos[$n], "X") . "\n" .  cadenaJugador($arregloJuegos[$n], "O") . "\n*************************************\n";
}

/**
 * Modulo para mostrar un juego en base a un indice ya chequeado
 * @param array $arregloJuegos
 */
function mostrarJuegoChequeado($arregloJuegos, $n)
{
    $resultado = cadenaResultado($arregloJuegos[$n]);
    echo "\n*************************************\nJuego TATETI: " . ($n+1) . " " . $resultado ."\n" . cadenaJugador($arregloJuegos[$n], "X") . "\n" .  cadenaJugador($arregloJuegos[$n], "O") . "\n*************************************\n";
}

/**
 * Modulo que se encarga de devolver el primer juego ganado por un jugador ingresado por el usuario
 * @param array $arregloJuegos
 */
function primerVictoria($arregloJuegos,$nom)
{
    //int $indiceJuego
    //string $nombre
    $nombre=$nom;
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
//funcion pedida en explicacion 3 punto 6
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
        if ($juego["jugadorCruz"] == strtoupper($nombreDado) && $juego["puntosCruz"] > $juego["puntosCirculo"]) {
            $indice = $i;
            $seguir = false;
        } else {
            if ($juego["jugadorCirculo"] == strtoupper($nombreDado) && $juego["puntosCirculo"] > $juego["puntosCirculo"]) {
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
   $contadorVictorias=victoriaSimbolo($arregloJuegos,$simbolo);
    $porcentaje = (int)((100 * $contadorVictorias) / contadorVictorias($arregloJuegos));
    return $porcentaje;
}

/**
 * Modulo que se encarga de retornar la cantidad de juegos ganados por un simbolo
 * @param array $arregloJuegos
 * @param string $simbolo
 * @return int
 */
//funcion pedida en explicacion 3 punto 10
function victoriaSimbolo($arregloJuegos,$simbolo){
    //boolean $ganador
    $contadorVictorias = 0;
    for ($i = 0; $i < count($arregloJuegos); $i++) {
        $ganador = simboloGanador(buscarJuego($arregloJuegos, $i), $simbolo);
        if ($ganador == true) {
            $contadorVictorias++;
        }
    }
    return $contadorVictorias;

}

/**
 * Modulo que se encarga de retornar la cantidad de victorias de un arreglo
 * @param array $arregloJuegos
 
 * @return int
 */
//funcion pedida en explicacion 3 punto 9
function contadorVictorias($arregloJuegos)
{
    //int $contadorVictorias
    //boolean $ganador
    $cantidadVictorias = 0;
    for ($i = 0; $i < count($arregloJuegos); $i++) {
        $juegoActual=$arregloJuegos[$i];
        
        if ($juegoActual["puntosCirculo"]<>1) {
            $cantidadVictorias++;
        }
    }
    
    return $cantidadVictorias;
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
        } else {
            return false;
        }
    }
}

/**
 * Modulo que se encarga de mostrar el porcentaje de victoria
 * @param array $arregloJuegos
 */
function mostrarPorcentaje($arregloJuegos)
{
    //int $porcentaje
    //string $simbolo
    $simbolo = chequearSimbolo();
    $porcentaje = porcentajeVictoria($arregloJuegos, $simbolo);
    echo "\nEl porcentaje de victoria del simbolo $simbolo es de: $porcentaje %. ";
}

/**
 * Modulo que se encarga de chequear que el usuario ingrese un simbolo correcto
 * @return string
 */
//funcion pedida en la explicacion 3 punto 8
function chequearSimbolo()
{
    //boolean $seguir
    $seguir = true;
    while ($seguir) {
        echo "\nPor favor ingrese el simbolo a buscar su porcentaje (X, O): ";
        $simbolo = strtoupper(trim(fgets(STDIN)));
        if ($simbolo == "X" || $simbolo == "O") {
            $seguir = false;
        } else {
            echo "\nEl simbolo ingresado no es correcto, intente de nuevo.";
        }
    }
    return $simbolo;
}

/**
 * Este modulo hace el resumen de un jugador y lo imprime
 * @param array $arregloJuegos
 * @param array $nombre
 *
 */
//funcion que pide en la explicacion 3 punto 7
function mostrarResumenJugador($arregloJuegos,$nom)
{
    
    //int $i,$juegosEmpatados,$juegosGanados,$juegosPerdidos,$puntosAcumulados
    $i = 0;
    $juegosEmpatados=0;
    $juegosGanados=0;
    $juegosPerdidos=0;
    $puntosAcumulados=0;
    $nombre=$nom;
    

    for ($i;$i<count($arregloJuegos);$i++) {
        $juego=$arregloJuegos[$i];
        if ($juego["jugadorCruz"]==strtoupper($nombre) && $juego["puntosCruz"] > $juego["puntosCirculo"]) {
            $juegosGanados++;
            $puntosAcumulados=$juego["puntosCruz"]+$puntosAcumulados;
        } elseif ($juego["jugadorCirculo"] == strtoupper($nombre) && $juego["puntosCirculo"] > $juego["puntosCruz"]) {
            $juegosGanados++;
            $puntosAcumulados=$juego["puntosCirculo"]+$puntosAcumulados;
        } elseif (($juego["jugadorCruz"]==strtoupper($nombre)||$juego["jugadorCirculo"]==strtoupper($nombre))&& $juego["puntosCirculo"]==$juego["puntosCruz"]) {
            $juegosEmpatados++;
            $puntosAcumulados++;
        } elseif ($juego["jugadorCirculo"] == strtoupper($nombre) && $juego["puntosCirculo"] < $juego["puntosCruz"]) {
            $juegosPerdidos++;
        } elseif ($juego["jugadorCruz"] == strtoupper($nombre) && $juego["puntosCirculo"] > $juego["puntosCruz"]) {
            $juegosPerdidos++;
        }
    }
    if ($juegosGanados == 0 && $juegosEmpatados == 0 && $juegosPerdidos == 0) {
        echo "\n***********************************\nEl jugador ingresado no participo en el tateti.\n***********************************\n";
    } else {
        echo "\n***********************************\nJugador: ".$nombre."\nGano: ".$juegosGanados."\nPerdio: ".$juegosPerdidos."\nEmpato: ".$juegosEmpatados."\nTotal de puntos: ".$puntosAcumulados."\n***********************************\n";
    }
}
    
/**
 * Modulo que se encarga de ordenar el arreglo en base a una condicion
 * @param array $arregloJuegos
 * @return array
 */
//funcion pedida por explicacion 3 punto 11
function ordenarPorO($arregloJuegos)
{
    uasort($arregloJuegos, 'verificarOrden');
    return $arregloJuegos;
}

/**
 * Modulo que se encarga de la funcion de comparacion
 * @param array $a
 * @param array $b
 * @return int
 */
function verificarOrden($a, $b)
{
    $resultado = strcmp($a["jugadorCirculo"], $b["jugadorCirculo"]);
    return $resultado;
}

/**
 * Modulo que se encarga de retornar el arreglo de juegos
 * @param array $arregloJuegos
 */
function printearArreglo ($arregloJuegos){
    print_r($arregloJuegos);
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
    $opcion = seleccionarOpcion(); //explicacion 3 punto 2
    //estructura de control alternativa selectiva que selecciona entre multiples  alternativas en base a una expresion de control o selector
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
            echo "\nPor favor ingrese un nombre para buscar su primera victoria (Ejemplo: 'JERE', 'MANU'): ";
            $nombre = trim(fgets(STDIN));
            primerVictoria($juegosTateti,$nombre);
            break;
        }
        case 4: {
            mostrarPorcentaje($juegosTateti);
            break;
        }
        case 5: {
            echo "\nIngrese el nombre del jugador a resumir: ";
            $nombre=trim(fgets(STDIN));
            mostrarResumenJugador($juegosTateti,$nombre); 
            break;
        }
        case 6: {
            $juegosTateti = ordenarPorO($juegosTateti);
            printearArreglo($juegosTateti);
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

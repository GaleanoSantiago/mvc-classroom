<?php

/*---------------- Variables de conexion definidas como constantes -------------- */

/*Notas: funcion define : Consite en crear una variable la cual seria una constante, en la cual
a su lado se le asginaria por defecto su valor/contenido.*/

define("DB_HOST", "localhost");
define("DB", "mvc_classroom");
define("DB_USER", "root");
define("DB_PASS", "");


/* Opciones por defecto asigna el controlador por defecto */
//define("DEFAULT_CONTROLLER", "materias");
define("DEFAULT_CONTROLLER", "carreras");
/* Asigna una funcion inicial por defecto */
define("DEFAULT_ACTION", "lista");
?>
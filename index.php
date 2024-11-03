<?php

//Nota: A las rutas no les afecta las minusculas o mayusculas.
require_once ('model/db.php');

//Sino existe el GET['controller']
if (!isset($_GET["controller"])) {
    $_GET["controller"] = constant("DEFAULT_CONTROLLER");
}

//Sino existe el GET['action']
if (!isset($_GET["action"])) {
    $_GET["action"] = constant("DEFAULT_ACTION");
}

//Ruta al controlador a usar
$controller_path = 'controller/' . $_GET["controller"] . '.php';

/* Checkea si el controlador existe */
//Sino existe un archivo, creara uno pretederminado 
if (!file_exists($controller_path)) {
    $controller_path = 'controller/' . constant("DEFAULT_CONTROLLER") . '.php';
}

/* Carga la ruta del controlador */
require_once $controller_path;

//Se define la clase, con la cual desea trabajar 
$controllerName = $_GET["controller"] . 'Controller';
//Se crea una nueva instancia de la misma (En este caso usamos la clase CarrerasControler)
$controller = new $controllerName();


//Defino un arreglo con un indice llamado "data"
$dataToView["data"] = array();
// var_dump($dataToView);
// die();

/*Nota: method_exists($controller, $_GET["action"]): Esta función comprueba si el objeto $controller 
tiene un método cuyo nombre es el valor de $_GET["action"]. Esto es útil para evitar errores al
intentar llamar a un método que no existe.*/

if (method_exists($controller, $_GET["action"])) {
    //Si existe un metodo llamado $_GET['action'], asigna el resultado del metodo al arreglo
    $dataToView["data"] = $controller->{$_GET["action"]}();
}

/* Carga las vista */
require_once ('view/template/header.php');
//var_dump($controller->view);
require_once ('view/' . $controller->view . '.php');
require_once ('view/template/footer.php');
?>

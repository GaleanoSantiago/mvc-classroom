<?php

require_once ('model/Carreras_model.php');

class CarrerasController{
    public $titulo_pagina;
    public $view; // variable View guarda los nombre de los archivos de las vista (view)
    
    public function __construct() {
    $this->view = 'list_carreras';
    $this->titulo_pagina = '';

    /* Crea un instancia CarreraObj de la clase Carrera del modelo Carrera_model */
    /*Nota: Al usar $this-> con una variable o propiedad no definida, php la crea automaticamente al 
    momento de asignar algo*/
    $this->CarreraObj = new Carreras();
    }

    /* Lista todas las Carreras */
    public function lista(){
        $this->titulo_pagina = 'Listado de Carreras';
        return $this->CarreraObj->getCarreras();
    }

    /* Lista todas las Carreras */
    public function listarCarrerasDisponibles(){
        return $this->CarreraObj->getCarrerasDisponibles();
    }

    public function getCarreraById($id){
        return $this->CarreraObj->getCarrerasById($id);

    }
// PARTE 2 DEL EJEMPLO //----------------------------

/* Load Carrera for edit */
    public function nuevo ($id = null){ 
        $this->titulo_pagina = 'Nueva Carrera';
        $this->view = 'edit_Carreras';
}

/* Load Carrera for edit */
    public function editar($id = null){
        $this->titulo_pagina = 'Editar Carrera';
        $this->view = 'edit_Carreras';

    /* Id can from get param or method param */
    if(isset($_GET["id"])) $id = $_GET["id"];
    return $this->CarreraObj->getCarrerasById($id);
}

    /* Create or update Carrera */
    public function save(){
        $this->view = 'edit_Carreras';
        $this->titulo_pagina = 'Editar Carrera';
        $id = $this->CarreraObj->save($_POST);
        $result = $this->CarreraObj->getCarrerasById($id);
        $_GET["response"] = true;
        return $result;
    }

    /* Confirm to delete */
    public function confirmDelete(){
        $this->titulo_pagina = 'Eliminar Carrera';
        $this->view = 'confirm_delete_Carreras';
        return $this->CarreraObj->getCarrerasById($_GET["id"]);
    }

    /* Delete */
    public function delete(){
        $this->titulo_pagina = 'Listado de Carreras';
        $this->view = 'delete_Carreras';
        return $this->CarreraObj->deleteCarrerasById($_POST["id"]);
    }
}  
?>
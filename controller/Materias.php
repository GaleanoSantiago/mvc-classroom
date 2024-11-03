<?php

require_once ('model/Materias_model.php');

class MateriasController{
    public $titulo_pagina;
    public $view; // variable View guarda los nombre de los archivos de las vista (view)
    
    public function __construct() {
    $this->view = 'list_materia';
    $this->titulo_pagina = '';

    /* Crea un instancia MateriaObj de la clase materia del modelo Materia_model */
    /*Nota: Al usar $this-> con una variable o propiedad no definida, php la crea automaticamente al 
    momento de asignar algo*/
    $this->MateriaObj = new Materia();
    }

    /* Lista todas las Materias */
    public function lista(){
        $this->titulo_pagina = 'Listado de Materias';
        return $this->MateriaObj->getMaterias();
}
// PARTE 2 DEL EJEMPLO //----------------------------

/* Load Materia for edit */
    public function nuevo ($id = null){ 
        $this->titulo_pagina = 'Nueva materia';
        $this->view = 'edit_materia';
}

/* Load Materia for edit */
    public function editar($id = null){
        $this->titulo_pagina = 'Editar materia';
        $this->view = 'edit_materia';

    /* Id can from get param or method param */
    if(isset($_GET["id"])) $id = $_GET["id"];
    return $this->MateriaObj->getMateriaById($id);
}

    /* Create or update Materia */
    public function save(){
        $this->view = 'edit_materia';
        $this->titulo_pagina = 'Editar materia';
        $id = $this->MateriaObj->save($_POST);
        $result = $this->MateriaObj->getMateriaById($id);
        $_GET["response"] = true;
        return $result;
    }

    /* Confirm to delete */
    public function confirmDelete(){
        $this->titulo_pagina = 'Eliminar materia';
        $this->view = 'confirm_delete_materia';
        return $this->MateriaObj->getMateriaById($_GET["id"]);
    }

    /* Delete */
    public function delete(){
        $this->titulo_pagina = 'Listado de Materias';
        $this->view = 'delete_materia';
        return $this->MateriaObj->deleteMateriaById($_POST["id"]);
    }

    /* Lista todas las Materias seleccionada de una carrera */
    public function listaMateriaSeleccionada(){
        $this->titulo_pagina = 'Listado de Materias';
        /* Verificamos si la variable esta definida y recibimos en $id lo enviado por url */
        /* Mas info https://www.php.net/manual/es/function.isset.php */
        if(isset($_GET["id"])) $id = $_GET["id"];
            /* retornamos el valor $id en la función getMateriaSeleccionada */
            return $this->MateriaObj->getMateriaSeleccionada($id);
    }
    public function getMateriaById($id){
        return $this->MateriaObj->getMateriaById($id);

    }
}  
?>
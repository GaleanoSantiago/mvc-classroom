<?php

require_once ('model/Unidades_model.php');

class UnidadesController{
    public $titulo_pagina;
    public $view; // variable View guarda los nombre de los archivos de las vista (view)
    
    public function __construct() {
        $this->view = 'list_unidades';
        $this->titulo_pagina = '';

        /* Crea un instancia UnidadObj de la clase Unidad del modelo Unidad_model */
        /*Nota: Al usar $this-> con una variable o propiedad no definida, php la crea automaticamente al 
        momento de asignar algo*/
        $this->UnidadObj = new Unidades();
    }

    /* Lista todas las Unidades */
    public function lista(){
        $this->titulo_pagina = 'Listado de Unidades';
        return $this->UnidadObj->getUnidades();
    }

    /* Lista todas las Unidades */
    public function listarUnidadesDisponibles(){
        return $this->UnidadObj->getUnidadesDisponibles();
    }

// PARTE 2 DEL EJEMPLO //----------------------------

/* Load Unidad for edit */
    public function nuevo ($id = null){ 
        $this->titulo_pagina = 'Nueva Unidad';
        $this->view = 'edit_Unidad';
}

/* Load Unidad for edit */
    public function editar($id = null){
        $this->titulo_pagina = 'Editar Unidad';
        $this->view = 'edit_Unidad';

    /* Id can from get param or method param */
    if(isset($_GET["id"])) $id = $_GET["id"];
    return $this->UnidadObj->getUnidadById($id);
}

    /* Create or update Unidad */
    public function save(){
        $this->view = 'edit_Unidad';
        $this->titulo_pagina = 'Editar Unidad';
        $id = $this->UnidadObj->save($_POST);
        $result = $this->UnidadObj->getUnidadById($id);
        $_GET["response"] = true;
        return $result;
    }

    /* Confirm to delete */
    public function confirmDelete(){
        $this->titulo_pagina = 'Eliminar Unidad';
        $this->view = 'confirm_delete_unidad';
        return $this->UnidadObj->getUnidadById($_GET["id"]);
    }

    /* Delete */
    public function delete(){
        $this->titulo_pagina = 'Listado de Unidades';
        $this->view = 'Delete_unidad';
        return $this->UnidadObj->deleteUnidadById($_POST["id"]);
    }

    /* Lista todas las Materias seleccionada de una carrera */
    public function listaUnidadSeleccionada(){
        $this->titulo_pagina = 'Listado de Unidades';
        /* Verificamos si la variable esta definida y recibimos en $id lo enviado por url */
        /* Mas info https://www.php.net/manual/es/function.isset.php */
        if(isset($_GET["id"])) $id = $_GET["id"];
            /* retornamos el valor $id en la función getMateriaSeleccionada */
            return $this->UnidadObj->getUnidadSeleccionada($id);
    }
}  
?>
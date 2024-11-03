<?php
//Predefinimos por defecto que estos datos estan vacios
$id = $title = $content = "";

require_once ('controller/Carreras.php');
$carreras = new CarrerasController();

/* recibimos los valores del $dataToView en caso de que sea una edición y los 
guardamos en cada variable definida para cargarlo en nuestro formulario */

//Condicion para saber si dentro de nuestra matriz data, esta el ID a editar
if (isset($dataToView["data"]["id"])) {
    //Asignamos el ID dentro de la anterior mente a la variable asginada como vacio
    $id = $dataToView["data"]["id"];
}

//Condicion para saber si dentro de nuestra matriz data, esta el Titulo a editar
if (isset($dataToView["data"]["title"])) {
    //Asignamos el Titulo dentro de la anterior mente a la variable asginada como vacio
    $title = $dataToView["data"]["title"];
    
}

//Condicion para saber si dentro de nuestra matriz data, esta el Contenido a editar
if (isset($dataToView["data"]["content"])) {
    //Asignamos el Contenido dentro de la anterior mente a la variable asginada como vacio
    $content = $dataToView["data"]["content"];
}

?>
<div class="row">
    <?php
    if (isset($_GET["response"]) && $_GET["response"] === true) {
    ?>
        <div class="alert alert-success">
            Operación realizada correctamente. <a href="index.php?controller=Materias&action=lista">Volver al listado</a>
        </div>
    <?php
    }
    ?>
    <form class="form" action="index.php?controller=Materias&action=save" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>" />
        <div class="form-group">
            <label>Título</label>
            <input class="form-control" type="text" name="title" value="<?php echo $title; ?>" />
        </div>
        <div class="form-group mb-2">
            <label>Contenido de la materia</label>
            <textarea class="form-control" style="white-space: pre-wrap;" name="content"><?php echo $content; ?></textarea>
        </div>
        <div class="form-group mb-3">
            <label>Carrera</label>
            <select class="form-control" style="white-space: pre-wrap;" name="id_carreras">
                <?php 
                    foreach($carreras->listarCarrerasDisponibles() as $carrera){
                        ?>  
                        <option value="<?php echo $carrera['id'];?>"><?php echo $carrera['title'];?></option>
                        <?php
                    }
                ?>
            </select>
        </div>
        <input type="submit" value="Guardar" class="btn btn-primary" />
        <a class="btn btn-outline-danger" href="index.php?controller=Materias&action=lista">Cancelar</a>
    </form>
</div>
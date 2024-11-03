<div class="row">
    <div class="col-md-12 text-right">
        <!--Boton/Link para crear una nueva materia-->
        <a href="index.php?controller=Unidades&action=nuevo" class="btn btn-outline-primary">Crear Unidad</a>
        <hr/>
    </div>
    <?php
    require_once ('controller/Materias.php');

    $materias = new MateriasController();
    //Si el tamaño del arreglo es mayor a 0
    if (count($dataToView["data"]) > 0) {
        foreach ($dataToView["data"] as $unidad) {
            
        $materia = $materias->getMateriaById($unidad["id_materias"]);
        
    ?>
            <div class="col-md-3">
                <div class="card-body border border-secondary rounded">
                    <h5 class="card-title"><?php echo $unidad['title']; ?></h5>
                    <h6 class="card-title text-secondary"><?php echo $materia["title"]; ?></h6>
                    <div class="card-text"><?php echo nl2br($unidad['content']); ?></div>
                    <hr class="mt-1"/>
                    <a href="index.php?controller=Unidades&action=editar&id=<?php echo $unidad['id']; ?>" class="btn btn-primary">Editar</a>
                    <a href="index.php?controller=Unidades&action=confirmDelete&id=<?php echo $unidad['id']; ?>" class="btn btn-danger">Eliminar</a>
                </div>
            </div>
    <?php
        }
    } else {
    ?>
        <div class="alert alert-info">
            Actualmente no existen notas.
        </div>
    <?php
    }
    ?>
</div>

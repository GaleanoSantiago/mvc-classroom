<div class="row">
    <div class="col-md-12 text-right">
        <!--Boton/Link para crear una nueva materia-->
        <a href="index.php?controller=Carreras&action=nuevo" class="btn btn-outline-primary">Crear Carrera</a>
        <hr/>
    </div>
    <?php

    //Si el tamaño del arreglo es mayor a 0
    if (count($dataToView["data"]) > 0) {
        foreach ($dataToView["data"] as $carrera) {
    ?>
            <div class="col-md-3">
                <div class="card-body border border-secondary rounded">
                    <h5 class="card-title"><?php echo $carrera['title']; ?></h5>
                    <div class="card-text"><?php echo nl2br($carrera['content']); ?></div>
                    <hr class="mt-1"/>
            
                    <a href="index.php?controller=Materias&action=listaMateriaSeleccionada&id=<?php echo $carrera['id']; ?>" class="btn btn-info">Ver</a>
                    <a href="index.php?controller=Carreras&action=editar&id=<?php echo $carrera['id']; ?>" class="btn btn-primary">Editar</a>
                    <a href="index.php?controller=Carreras&action=confirmDelete&id=<?php echo $carrera['id']; ?>" class="btn btn-danger">Eliminar</a>
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

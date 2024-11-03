<div class="row">
    <div class="col-md-12 text-right">
        <!--Boton/Link para crear una nueva materia-->
        <a href="index.php?controller=Materias&action=nuevo" class="btn btn-outline-primary">Crear Materia</a>
        <hr/>
    </div>
    <?php
    require_once ('controller/Carreras.php');

    $carreras = new CarrerasController();
        
    //Si el tamaño del arreglo es mayor a 0
    if (count($dataToView["data"]) > 0) {
        foreach ($dataToView["data"] as $materia) {
            $carrera = $carreras->getCarreraById($materia["id_carreras"]);

    ?>
            <div class="col-md-3">
                <div class="card-body border border-secondary rounded">
                    <h5 class="card-title"><?php echo $materia['title']; ?></h5>
                    <h6 class="card-title text-secondary"><?php echo $carrera["title"]; ?></h6>

                    <div class="card-text"><?php echo nl2br($materia['content']); ?></div>
                    <hr class="mt-1"/>
                    <a href="index.php?controller=Unidades&action=listaUnidadSeleccionada&id=<?php echo $materia['id']; ?>" class="btn btn-info">Ver</a>
                    <a href="index.php?controller=Materias&action=editar&id=<?php echo $materia['id']; ?>" class="btn btn-primary">Editar</a>
                    <a href="index.php?controller=Materias&action=confirmDelete&id=<?php echo $materia['id']; ?>" class="btn btn-danger">Eliminar</a>
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

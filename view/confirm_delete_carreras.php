<div class="row">
    <form class="form" action="index.php?controller=Carreras&action=delete" method="POST">
        <input type="hidden" name="id" value="<?php echo $dataToView["data"]["id"]; ?>" />
        <div class="alert alert-warning">
            <b>¿Confirma que desea eliminar esta Carrera?:</b>
            <i><?php echo $dataToView["data"]["title"]; ?></i>
        </div>
        <input type="submit" value="Eliminar" class="btn btn-danger" />
        <a class="btn btn-outline-success" href="index.php?controller=Carreras&action=lista">Cancelar</a>
    </form>
</div>
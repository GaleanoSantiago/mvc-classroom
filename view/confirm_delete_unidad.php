<div class="row">
    <form class="form" action="index.php?controller=Unidades&action=delete" method="POST">
        <input type="hidden" name="id" value="<?php echo $dataToView["data"]["id"]; ?>" />
        <div class="alert alert-warning">
            <b>¿Confirma que desea eliminar esta Unidad?:</b>
            <i><?php echo $dataToView["data"]["title"]; ?></i>
        </div>
        <input type="submit" value="Eliminar" class="btn btn-danger" />
        <a class="btn btn-outline-success" href="index.php?controller=Unidades&action=lista">Cancelar</a>
    </form>
</div>
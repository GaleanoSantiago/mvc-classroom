<?php
// PARTE 1 DEL EJEMPLO //----------------------------
class Carreras {
    private $table = 'Carreras';
    private $conection;

    public function __construct() {
        $this->getConection();
    }

    /* Establish a connection to the database */
    private function getConection(){
        $dbObj = new Db(); // instancio de clase db de model db.php
        $this->conection = $dbObj->conection;
    }

    /* Retrieve a list of all Carreras instances */
    public function getCarreras(){
        $sql = "SELECT * FROM ".$this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

  /* Retrieve a list of all Carreras instances */
    public function getCarrerasDisponibles(){
        $sql = "SELECT id,title FROM ".$this->table;
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    /* Retrieve a Carreras instance by ID */
    public function getCarrerasById($id){
        if(is_null($id)) return false;
        $sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /* Save note */
	public function save($param){
        //Llama a la conexion
		$this->getConection();

		/* Asignar valor por defecto: Vacio */
		$title = $content = "";

		/* Asigna la existencia como falso antes de la validacion */
		$exists = false;
		if(isset($param["id"]) and $param["id"] !=''){
            //Valida si existe registro
			$actualCarreras = $this->getCarrerasById($param["id"]);
			if(isset($actualCarreras["id"])){
				$exists = true;	

				/* Recupera valores */
				$id = $actualCarreras["id"];
				$title = $actualCarreras["title"];
				$content = $actualCarreras["content"];
			}
		}

		/* Confirma que los parametros tengan los mismos campos a remplazar */
		if(isset($param["title"])) $title = $param["title"];
		if(isset($param["content"])) $content = $param["content"];

		/* Consulta si existe los datos para actualizar el registro actual*/
		if($exists){
			$sql = "UPDATE ".$this->table. " SET title=?, content=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$title, $content, $id]);

        /* Consulta si existe los datos, en caso no existir crea uno nuevo registro*/
		}else{
			$sql = "INSERT INTO ".$this->table. " (title, content) values(?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$title, $content]);
			$id = $this->conection->lastInsertId();
		}	

		return $id;	

	}

    /* Delete a Carreras instance by ID */
    public function deleteCarrerasById($id){
        $sql = "DELETE FROM ".$this->table. " WHERE id = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
<?php
// PARTE 1 DEL EJEMPLO //----------------------------
class Unidades {
    private $table = 'unidades';
    private $conection;

    public function __construct() {
        $this->getConection();
    }

    /* Establish a connection to the database */
    private function getConection(){
        $dbObj = new Db(); // instancio de clase db de model db.php
        $this->conection = $dbObj->conection;
    }

    /* Retrieve a list of all Unidad instances */
    public function getUnidades(){
        $sql = "SELECT * FROM ".$this->table. " ORDER BY id_materias";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /* Retrieve a Unidad instance by ID */
    public function getUnidadById($id){
        if(is_null($id)) return false;
        $sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /* Obtener Unidad seleccionada */
    public function getUnidadSeleccionada($id){
        $this->getConection();
        //$sql = "SELECT * FROM ".$this->table;
        $sql = "SELECT * FROM ".$this->table. " WHERE id_materias = ?";
        $stmt = $this->conection->prepare($sql);
        
        /* Ejecuta una consulta que ha sido previamente preparada usando la función 
        mysqli_prepare(). https://www.php.net/manual/es/mysqli-stmt.execute.php */
        $stmt->execute([$id]);
        /* https://www.php.net/manual/es/pdostatement.fetchall.php*/
        return $stmt->fetchAll();
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
			$actualUnidad = $this->getUnidadById($param["id"]);
            
            //Condicion par saber si existe el ID de la meteria
			if(isset($actualUnidad["id"])){
				$exists = true;	

				/* Recupera valores */
				$id = $actualUnidad["id"];
				$title = $actualUnidad["title"];
				$content = $actualUnidad["content"];
                $materia = $actualUnidad["id_materias"];
			}
		}

		/* Confirma que los parametros tengan los mismos campos a remplazar */
		if(isset($param["title"])) $title = $param["title"];
		if(isset($param["content"])) $content = $param["content"];
        if(isset($param["content"])) $materia = $param["id_materias"];

		/* Consulta si existe los datos para actualizar el registro actual*/
		if($exists){
			$sql = "UPDATE ".$this->table. " SET title=?, content=?, id_materias=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$title, $content, $materia ,$id]);

        /* Consulta si existe los datos, en caso no existir crea uno nuevo registro*/
		}else{
			$sql = "INSERT INTO ".$this->table. " (title, content, id_materias) values(?, ?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$title, $content, $materia]);
			$id = $this->conection->lastInsertId();
		}	

		return $id;	

	}

    /* Delete a Unidad instance by ID */
    public function deleteUnidadById($id){
        $sql = "DELETE FROM ".$this->table. " WHERE id = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
<?php
// PARTE 1 DEL EJEMPLO //----------------------------
class Materia {
    private $table = 'materias';
    private $conection;

    public function __construct() {
        $this->getConection();
    }

    /* Establish a connection to the database */
    private function getConection(){
        $dbObj = new Db(); // instancio de clase db de model db.php
        $this->conection = $dbObj->conection;
    }

    /* Retrieve a list of all Materia instances */
    public function getMaterias(){
        $sql = "SELECT * FROM ".$this->table. " ORDER BY id_carreras";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    /* Retrieve a Materia instance by ID */
    public function getMateriaById($id){
        if(is_null($id)) return false;
        $sql = "SELECT * FROM ".$this->table. " WHERE id = ?";
        $stmt = $this->conection->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    /* Obtener materia seleccionada */
    public function getMateriaSeleccionada($id){
    $this->getConection();
    //$sql = "SELECT * FROM ".$this->table;
    $sql = "SELECT * FROM ".$this->table. " WHERE id_carreras = ?";
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
			$actualMateria = $this->getMateriaById($param["id"]);
            
            //Condicion par asaber si existe el ID de la meteria
			if(isset($actualMateria["id"])){
				$exists = true;	

				/* Recupera valores */
				$id = $actualMateria["id"];
				$title = $actualMateria["title"];
				$content = $actualMateria["content"];
                $carrera = $actualMateria["id_carreras"];
			}
		}

		/* Confirma que los parametros tengan los mismos campos a remplazar */
		if(isset($param["title"])) $title = $param["title"];
		if(isset($param["content"])) $content = $param["content"];
        if(isset($param["content"])) $carrera = $param["id_carreras"];

		/* Consulta si existe los datos para actualizar el registro actual*/
		if($exists){
			$sql = "UPDATE ".$this->table. " SET title=?, content=?, id_carreras=? WHERE id=?";
			$stmt = $this->conection->prepare($sql);
			$res = $stmt->execute([$title, $content, $carrera ,$id]);

        /* Consulta si existe los datos, en caso no existir crea uno nuevo registro*/
		}else{
			$sql = "INSERT INTO ".$this->table. " (title, content, id_carreras) values(?, ?, ?)";
			$stmt = $this->conection->prepare($sql);
			$stmt->execute([$title, $content, $carrera]);
			$id = $this->conection->lastInsertId();
		}	

		return $id;	

	}

    /* Delete a Materia instance by ID */
    public function deleteMateriaById($id){
        $sql = "DELETE FROM ".$this->table. " WHERE id = ?";
        $stmt = $this->conection->prepare($sql);
        return $stmt->execute([$id]);
    }
}
?>
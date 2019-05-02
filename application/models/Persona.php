<?php 

class Persona extends CI_Model //Debe ser el mismo nombre del archivo
{
	public $table = 'personas'; //Nombre de la tabla
	public $table_id = 'persona_id'; //Llave primaria de la tabla 

	public function __construct()
	{

	}

	//Busca un solo registro
	function find($id) //$id es el parametro que se va a buscar
	{
		$this->db->select();
		$this->db->from($this->table); //table es el nombre de la variable de la tabla personas
		$this->db->where($this->table_id, $id);

		$query = $this->db->get();
		return $query->row(); //Con row solo devuelve una fila
	}

	//Busca todos los registros
	function findAll() //Busca todos los registros por eso no se le pasa parametro
	{
		$this->db->select();
		$this->db->from($this->table); //table es el nombre de la variable de la tabla personas

		$query = $this->db->get();
		return $query->result(); //Con result devuelve un array de datos
	}

	//Data son los datos que se van a insertar
	function insert($data)
	{
		$this->db->insert($this->table, $data);//Variable table que hace referencia al nombre de la tabla, linea 5
		return $this->db->insert_id();//insert_id es la variable linea 6 de la primary key
	}

	//Data son los datos que se van a insertar y id el id que usa en el where como condicion de lo que va afectar
	function update($id, $data)
	{
		$this->db->where($this->table_id, $id);
		$this->db->update($this->table, $data);//Variable table que hace referencia al nombre de la tabla, linea 5
	}

	//id el id que usa en el where como condicion de lo que va afectar
	function delete($id)
	{
		$this->db->where($this->table_id, $id);//table_id es el id de la tabla- id es el id que se va a modificar
		$this->db->delete($this->table);//Variable table que hace referencia al nombre de la tabla, linea 5
	}
}

?>
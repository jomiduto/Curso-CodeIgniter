<?php 

//Siempre el nombre de la clase debe ser igual al nombre del archivo
class Personas extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');//Para usar formularios
		//lo de abajo se carga en el constructor para que queden globales a todas las opciones que se vayan a definir
		//Como un require once
		$this->load->helper('url');//Para poder usar redirecciones
		$this->load->model('Persona');
		$this->load->library('form_validation');//Libreria para validaciones de formulario documentacion codeigniter
		$this->load->database();
	}

	function index()
	{
		redirect("/personas/listado");//Redirección en Codeigniter, por si escriben solo /personas/ lo envia directamente a listado
	}

	public function listado()
	{
		$vdata["personas"] = $this->Persona->findAll();
		$this->load->view('personas/listado', $vdata); //Ese (listado) es el nombre de la funcion, el nombre listado debe ser igual en todo lado
	}

	public function guardar($persona_id = null)//Parametro de persona_id si es nulo significa que va a insertar datos sino es un update
	{

		//Validaciones de los campos de formulario, necesita inicializar en el controlador
		$this->form_validation->set_rules('nombre','Nombre','required');
		$this->form_validation->set_rules('apellido','Apellido','required');
		$this->form_validation->set_rules('edad','Edad','required|max_length[2]');//Para agregar más validaciones coloca un | y la validacion

		//Si el formulario esta vacio las variables no toman ningun valor (no se va a editar)
		$vdata["nombre"] = "";
		$vdata["apellido"] = "";
		$vdata["edad"] = "";

		//Si la variable lleva algun valor, quiere decir que el formulario se edita y las variables toman los valores del input
		if(isset($persona_id))//Valida si la variable trae algun dato
		{
			$persona = $this->Persona->find($persona_id);

			if(isset($persona_id))
			{
				$vdata["nombre"] = $persona->nombre;
				$vdata["apellido"] = $persona->apellido;
				$vdata["edad"] = $persona->edad;
			}
		}

		//Se prepara el insert de los datos del formulario
		if($this->input->server("REQUEST_METHOD") == "POST")//Valida que este envianddo datos post si no se cumple es get
		{
			$data["nombre"] = $this->input->post("nombre");//-> este corresponde al name del input
			$data["apellido"] = $this->input->post("apellido");
			$data["edad"] = $this->input->post("edad");

			//vdata son las variables del input que carga los datos para editar
			$vdata["nombre"] = $this->input->post("nombre");
			$vdata["apellido"] = $this->input->post("apellido");
			$vdata["edad"] = $this->input->post("edad");

			if($this->form_validation->run())//Valida que el formulario devuelva datos, es una forma de verificar si las validaciones hechar arriba son correctas el required
			{
				//Si la variable persona_id trae valor carga el formulario para editar
				if(isset($persona_id))//Valida si la variable trae algun dato
				{
					//Update de los datos
					$this->Persona->update($persona_id, $data);//el orden de los parametros debe coincidir a la funcion update del archivo model persona primero id y luego data
				}else
				{
					//Insert de los datos
					$this->Persona->insert($data);//Persona es el nombre del archivo del modelo, donde estan las peticiones
					//a la base de datos y su conexion a la bd
				}
			}
		}
		//Muestra formulario inicial
		$this->load->view('personas/guardar', $vdata); //Ese es el nombre del archivo de la vista con ruta
	}

	public function borrar($persona_id = null)
	{
		$this->Persona->delete($persona_id);//Ejecutala consulta del modelo Persona.php
		//Se quita la variable $persona porque no necesito que retorne nada

		redirect("/personas/listado");//Redirección en Codeigniter
	}

	public function ver($persona_id = null)//Parametro de persona_id si es nulo significa que va a insertar datos sino es un update
	{
		if(!isset($persona_id))//valida que envie el dato get si no muestra error 404
		{
			show_404();
		}

		$persona = $this->Persona->find($persona_id);//Ejecutala consulta del modelo Persona.php

		if(!isset($persona))//valida que el dato exista, si no muestra error 404
		{
			show_404();
		}

		if(isset($persona_id))//Valida que traiga el dato solicitado de persona id
		{
			$vdata["nombre"] = $persona->nombre;
			$vdata["apellido"] = $persona->apellido;
			$vdata["edad"] = $persona->edad;
		}else//Si no trae nada pone los campos vacios
		{
			$vdata["nombre"] = "";
			$vdata["apellido"] = "";
			$vdata["edad"] = "";
		}

		//Muestra formulario inicial
		$this->load->view('personas/ver', $vdata); //Ese es el nombre del archivo de la vista con ruta
	}
}


?>
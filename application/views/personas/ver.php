<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Registro Usuario</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	
	<div class="container">

		<br>
		<a href="<?php echo base_url() ?>personas/listado" class="btn btn-success">Regresar</a> <!-- listado es el nombre de la funcion -->
		<br>
		<br>

		<?php echo validation_errors();//Muestra los mensajes de error de los input vacios y demás ?>	

		<?php echo form_open(''); ?>
			<div class="form-group">
				<?php 
				
					echo form_label('Nombre', 'nombre');// Label primer parametro es el texto y el segundo el valor del for

					$input = array(
						'name' => 'nombre',
						'value' => $nombre,
						'readonly' => 'readonly',
						'class' => 'form-control input-lg',
						'placeholder' => 'Digite nombre'
					); //Este es el input, con sus elementos, name, value, class, demas

					echo form_input($input);//Aca mando a imprimir el input

				?>
			</div>

			<div class="form-group">
				<?php 

					echo form_label('Apellido', 'apellido');// Label primer parametro es el texto y el segundo el valor del for

					$input = array(
						'name' => 'apellido',
						'value' => $apellido,
						'readonly' => 'readonly',
						'class' => 'form-control input-lg',
						'placeholder' => 'Digite apellido'
					); //Este es el input, con sus elementos, name, value, class, demas

					echo form_input($input);//Aca mando a imprimir el input
					
				?>
			</div>

			<div class="form-group">
				<?php 

					echo form_label('Edad', 'edad');// Label primer parametro es el texto y el segundo el valor del for

					$input = array(
						'name' => 'edad',
						'type' => 'number',
						'value' => $edad,
						'readonly' => 'readonly',
						'class' => 'form-control input-lg',
						'placeholder' => 'Digite edad'
					); //Este es el input, con sus elementos, name, value, class, demas

					echo form_input($input);//Aca mando a imprimir el input
					
				?>
			</div>
		<?php echo form_close(); //No recibe nungun parametro ?>
	</div>

</body>
</html>
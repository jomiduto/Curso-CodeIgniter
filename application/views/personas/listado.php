<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Listado de Usuarios</title>

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
  
  <div class="container">
    <br>
    <a href="guardar" class="btn btn-success">Guardar</a> <!-- Guardar es el nombre de la visra que muestra el fomrulario -->
    <br>
    <br>
    <table class="table">
      <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre</th>
        <th scope="col">Apellido</th>
        <th scope="col">Edad</th>
        <th scope="col">Acciones</th>
        </tr>
      </thead>
      <tbody>

        <?php foreach ($personas as $key => $p) : //personas es el array de la funcion listado la que guarda los datos, archivo Personas.php?>
          <tr>
            <th scope="row"><?php echo $p->persona_id ?></th>
            <td><?php echo $p->nombre ?></td>
            <td><?php echo $p->apellido ?></td>
            <td><?php echo $p->edad ?></td>
            <td>
              <a href="guardar/<?php echo $p->persona_id //guardar es el nombre de la funcion?>">Editar</a>
              <br>
              <a href="ver/<?php echo $p->persona_id //ver es el nombre de la funcion?>">Ver</a>
              <br>
              <a href="borrar/<?php echo $p->persona_id //borrar es el nombre de la funcion?>">Borrar</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>

</body>
</html>
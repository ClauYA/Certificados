<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

<!-- JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
<nav class="nav nav-pills flex-column flex-sm-row">
<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
  <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Listar usuario</a>
  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Listar usuarios</a>
  
</div>
</nav>
<form action="../../form-result.php" method="post" target="_blank">

  <p>
     CI 
    <input type="search" name="busquedacodigo" size="4" maxlength="4">

    <input type="submit" value="Buscar">

  </p>

</form>




<div class="tab-content" id="v-pills-tabContent">
<table class="table table-responsive table-hover">
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Apellido Parterno</th>
            <th>Apellido Materno</th>
            <th>CI</th>
            <th>Email</th>
            <th>Tipo Usuario</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($consulta->result() as $fila){?>
        <tr>
            <td><?= $fila->nombres;?></td>
            <td><?= $fila->apellido_paterno;?></td>
            <td>><?= $fila->apellido_materno;?></td>
            <td>><?= $fila->ci;?></td>
            <td>><?= $fila->email;?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>
</div>
    
</body>
</html>
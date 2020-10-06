
 <a class="btn btn-primary" href="<?=base_url('registro')?>" role="button">Adicionar usuario</a>
<a class="btn btn-primary" href="<?=base_url('vistatabla')?>" role="button">Listar Usuario</a>
    
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nombres</th>
      <th scope="col">Apellido Paterno</th>
      <th scope="col">Apellido Materno</th>
      <th scope="col">CI</th>
      <th scope="col">Email</th>
      
    </tr>
  </thead>
  <tbody>
  <?php foreach ($data as $item): ?>
    <tr>
      <th scope="row"><?= $item->nombres?></th>
      <td><?= $item->apellido_paterno?></td>
      <td><?= $item->apellido_materno?></td>
      <td><?= $item->ci?></td>
      <td><?= $item->email?></td>
      <td><a class="btn btn-danger" href="<?=base_url('Vistatabla/edit/').$item->id_usuario?>" role="button">Edital</a> || <a class="btn btn-warning" href="<?=base_url('Vistatabla/elim')?>" role="button">Eliminar</a></td>
      
    </tr>
  <?php endforeach;?>
   
  </tbody>
</table>


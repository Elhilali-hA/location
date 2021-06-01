<?php require APP_ROOT . '/views/inc/header.php' ?>
<?php require APP_ROOT .'/views/inc/nav-dash.php'; ?>
  
  <div class="col-12 w-100 d-flex justify-content-between p-4">
  
  <?php require APP_ROOT . '/views/inc/left-dash.php' ?>
<table class="table table-light table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Prix</th>
      <th scope="col">categorie</th>
      <th scope="col">color</th>
      <th scope="col">disponibilité</th>
      <th scope="col">img</th>
      <th scope="col"><a href="<?php echo URL_ROOT; ?>/admin/add" class="btn btn-warning">Add</a></th>
    </tr>
  </thead>
  <tbody>
  <?php foreach
    ($data['cars'] as $cars):
      ?>
    <tr>
      <th scope="row"><?php echo $cars->Code;?></th>
      <td><?php echo $cars->Name; ?></td>
      <td><?php echo $cars->prix; ?>dh</td>
      <td><?php echo $cars->categorie; ?></td>
      <td><?php echo $cars->color; ?></td>
      <td><?php echo $cars->disponibilité; ?></td>
      <td><?php echo $cars->img; ?></td>
      <th scope="col"><a href="<?php echo URL_ROOT; ?>/admin/update" class="btn btn-primary">update</a></th>
    </tr>
    
    <?php
    endforeach;
   ?>
  </tbody>
</table>
</div>
    
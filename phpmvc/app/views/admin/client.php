<?php require APP_ROOT . '/views/inc/header.php' ?>
<?php require APP_ROOT .'/views/inc/nav-dash.php'; ?>

<div class="col-12 w-100 d-flex justify-content-between p-4">
  
  <?php require APP_ROOT . '/views/inc/left-dash.php' ?>
<table class="table table-light table-hover">
  <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Prenom</th>
      <th scope="col">email</th>
      <th scope="col">ville</th>
    </tr>
  </thead>
  <tbody>
  <?php foreach
    ($data['users'] as $users):
      ?>
    <tr>
      <th scope="row"><?php echo $users->id;?></th>
      <td><?php echo $users->nom; ?></td>
      <td><?php echo $users->prenom; ?></td>
      <td><?php echo $users->email; ?></td>
      <td><?php echo $users->ville; ?></td>
      

    </tr>
    
    <?php
    endforeach;
   ?>
  </tbody>
</table>
</div>
    
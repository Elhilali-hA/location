<?php require APP_ROOT . '/views/inc/header.php' ?>
<?php require APP_ROOT . '/views/inc/navbar.php' ?>



<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.2/css/all.css">
  </head>
  <body>

  <!-- :::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::;; -->
 
<!-- ///////////////////////////////////////////////://///////////////////////////::::::::::::::::::::::::::::: -->
  <div class="container">
 
  <div class="row my-4">
		<div class="col-md-10 mx-auto">
        <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">id</th>
      <th scope="col">marque</th>
      <th scope="col">model</th>
      <th scope="col">prix</th>
      <th scope="col">fulname</th>
      <th scope="col">date-debut</th>
      <th scope="col">date-fin</th>
      <th scope="col">action</th>


    </tr>
  </thead>
  <tbody>
  <?php foreach($data['cars'] as $cars) :   ?>
    <tr>
      <th scope="row"><?php echo $cars->id ?></th>
      <td><?php echo $cars->Marque ?></td>
      <td><?php echo $cars->Modele ?></td>
      <td><?php echo $cars->Prix ?></td>
      <td><?php echo $cars->Fulname ?></td>
      <td><?php echo $cars->datedebut ?></td>
      <td><?php echo $cars->datefin ?></td>
      <td class="d-flex flex-row " >
      <div>
      <button class="btn btn-sm btn-warning"  ><a href="<?php echo URL_ROOT; ?>/clients/updateReserve?id=<?php echo $cars->id ?>"><i class="fa fa-edit"></i></a></button>
     
      <button class="btn btn-sm btn-danger"><a href="<?php echo URL_ROOT; ?>/clients/deleteReserve/<?php echo $cars->id ?>"><i class="fa fa-trash"></i></a></button>
      </div>
      </td>
    
      
    </tr>
    <?php endforeach;  ?>
     
  </tbody>
</table>


        </div>
        </div>
  </div>
      
  
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
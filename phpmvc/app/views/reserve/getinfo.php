<?php require APP_ROOT . '/views/inc/header.php' ?>
<?php require APP_ROOT . '/views/inc/navbar.php' ?>
<?php foreach($data['cars'] as $cars) ?>


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>


  <section class="container-fluid">

<form action="<?php echo URL_ROOT; ?>/reserve/add1" method="post" 
  class="col-5 flex column text-center p-4 m-4 bg-light w-50 mx-auto mt-5 mb-5"  >
<h2> Reservation</h2>
 <!-- <a href="#"><img src="../logo.png"  alt="" style="width: 80px;height:80px"></a> -->
 <div class="form-group m-3" >

<div >

   <label class="float-left" for="exampleFormControlInput1">Marque</label>
   <input  placeholder="" value="<?php echo $cars->Marque ?>"  name="Marque" class="form-control border " readonly>
   <span class="invalidFeedback">
  
            </span>
</div>
 <div >

<label class="float-left" for="exampleFormControlInput1">Modele</label>
<input type="text" placeholder="modele" value="<?php echo $cars->Modele ?>" name="Modele" class="form-control border " readonly>
<span class="invalidFeedback"> 

            </span>
</div> 
<div >

<label class="float-left" for="exampleFormControlInput1">Prix</label>
<input type="text" placeholder="Prix" value="<?php echo $cars->Prix ?>" name="Prix" class="form-control border" readonly>
<span class="invalidFeedback">

            </span>
</div>

<div >

<label class="float-left" for="exampleFormControlInput1">fulname</label>
<input type="text" placeholder="fulname" value="<?php echo $_SESSION['user_name'] ?>" name="Fulname" class="form-control border" readonly>
<span class="invalidFeedback">

            </span>
</div>

<div >

<label class="float-left" for="exampleFormControlInput1">fulname</label>
<input type="date" placeholder="date" name="datedebut" class="form-control border" >
<span class="invalidFeedback">

            </span>
</div>

<div >
<label class="float-left" for="exampleFormControlInput1">fulname</label>
<input type="date" placeholder="date" name="datefin" class="form-control border " >
<span class="invalidFeedback">

            </span>
</div>




 <div class="m-4">
 <button id="submit" type="submit" value="submit" class="btn btn-outline-primary">confirm-resrve</button>
 <a href="<?php echo URL_ROOT; ?>/clients/reservation" class="btn btn-danger ml-3 ">Cancel</a>
 
 
 </div>
 </div>
 </form>

 </section>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>




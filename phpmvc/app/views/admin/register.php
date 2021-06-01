<?php require APP_ROOT . '/views/inc/header.php' ?>
<section class="container-fluid">

<div class="flex row justify-content-center" style="background-color:#f7d5bc;">



 <form id="register-form" method="POST" action="<?php echo URL_ROOT; ?>/admin/register"
  class="col-6 flex column text-center p-4 mt-3" style="background-color:#626c74;border-radius:15px;height:54 0px" >

 <a href="#" ><img src="../public/img/logo.png" id="logo" style="width: 80px;height:80px"></a>
 <div class="form-group m-2" >
 <div class="d-flex column mt-2">

<label class="float-left col-4" for="exampleFormControlInput1">Prenom:</label>
<input type="text" placeholder="prenom *" name="prenom" class="form-control border border-primary" id="exampleFormControlInput1" >

</div>
 <div class="d-flex column mt-2">

<label class="float-left col-4" for="exampleFormControlInput1">Nom:</label>
<input type="text" placeholder="nom *" name="nom" class="form-control border border-primary" id="exampleFormControlInput1" >
<span class="">
                <?php echo $data['name_err']; ?>
            </span>
</div>
<div class="d-flex column">

   <label class="float-left col-4" for="exampleFormControlInput1">Email address:</label>
   <input type="email" placeholder="Email *" name="email" class="form-control border border-primary" id="exampleFormControlInput1" >
   <span class="">
                <?php echo $data['email_err']; ?>
            </span>
</div>
<div class="d-flex column">

   <label class="float-left col-4" for="exampleFormControlInput1">ville:</label>
   <input type="text" placeholder="ville" name="ville" class="form-control border border-primary" id="exampleFormControlInput1" >
   
</div>


 <div class="d-flex column mt-2">
 <label class="float-left col-4" for="exampleFormControlInput1">phone:</label>
   <input type="text" value="+212-" name="phone" class="form-control border border-primary" id="exampleFormControlInput1" >
   
 </div>
 <div class="d-flex column mt-2">
 <label class="float-left  col-4" for="exampleFormControlInput1">date de naissance:</label>
   <input type="date"  name="date_naissance" class="form-control border border-primary" id="exampleFormControlInput1" >
   
 </div>
 <div class="d-flex column mt-2">
 <label class="float-left col-4" for="exampleFormControlInput1">password:</label>
   <input type="password" placeholder="Password *" name="password" class="form-control border border-primary" id="exampleFormControlInput1" >
   <span class="">
                <?php echo $data['password_err']; ?>
            </span>
 </div>
 
<div class="d-flex column mt-2">
   <label class="float-left  col-4" for="exampleFormControlInput1">confirm mot de passe:</label>
   <input type="password" placeholder="Confirm Password *" name="confirm_password" class="form-control border border-primary" id="exampleFormControlInput1" >
   <span class="">
                <?php echo $data['confirm_password_err']; ?>
            </span>
</div>

 <div class="mt-2">
 <button id="submit" type="submit" value="submit" class="btn btn-outline-warning">sign up</button>
 
 </div>
 <small>You have an account ? <a href="<?php echo URL_ROOT; ?>/admin/login">Log in</a></small>
 </div>
 </form>


 </div>
 </section>
 <style>
 #logo{
margin-top: -12%;

 }
 </style>
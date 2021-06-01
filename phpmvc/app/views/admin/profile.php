<?php require APP_ROOT . '/views/inc/header.php' ?>
<?php require APP_ROOT .'/views/inc/nav-dash.php'; ?>
  <div class="col-12 w-100 d-flex justify-content-between p-4">
  
  <?php require APP_ROOT . '/views/inc/left-dash.php' ?>
      <fieldset disabled class="col-5 p-2 " style="background-color:rgba(255, 255, 255, 0.5);border-radius:15px;">
    <?php foreach
    ($data['users'] as $users ):
      ?>
  <form action="<?php echo URL_ROOT; ?>/admin/profile"  method="POST">
  <div class="form-group col-9 ">
    <label for="exampleFormControlInput1">Email address</label>
    <input type="email" class="form-control border border-primary" id="exampleFormControlInput1" value="<?php echo $users->email; ?>" >
  
  <div>
  <label for="exampleFormControlInput1">nom</label>
    <input type="name" class="form-control border border-primary" id="exampleFormControlInput1" value="<?php echo $users->nom; ?>" >
  </div>
  <div>
  <label for="exampleFormControlInput1">prenom</label>
    <input type="phone" class="form-control border border-primary" id="exampleFormControlInput1" value="<?php echo $users->prenom; ?>" >
  </div>
  <div>
  <label for="exampleFormControlInput1">ville</label>
    <input type="email" class="form-control border border-primary" id="exampleFormControlInput1" value="<?php echo $users->ville; ?>" >
  </div>
  <div>
  <label for="exampleFormControlInput1">password</label>
  <div class="d-flex ">
    <input type="password" class="form-control border border-primary" id="exampleFormControlInput1" value="<?php echo $users->password; ?>" >
  
  </div>
  </div>
  </div>
  <?php
    endforeach;
   ?>
  </form>
      </fieldset>

  <form action="<?php echo URL_ROOT; ?>/admin/changepassword" class="col-4 p-2 " style="background-color:rgba(255, 255, 255, 0.5);border-radius:15px;">
  <h1 class="title text-warning">Changer mot de passe?</h1>

  <div class="form-group col-9 item-center">
    <label for="exampleFormControlInput1">votre mot de passe</label>
    <input type="email" class="form-control border border-primary <?php echo (!empty($data['password_old_err'])) ? 'is-invalid' : '';?>" value=" <?php echo $data['password_old']; ?>">
  
  <div>
  <label for="exampleFormControlInput1">nouveaux mot de passe</label>
    <input type="email" class="form-control border border-primary" id="exampleFormControlInput1" >
  </div>
  <div>
  <label for="exampleFormControlInput1">confirmer le nv mot de passe</label>
  <div class="d-flex ">
    <input type="email" class="form-control border border-primary" id="exampleFormControlInput1" >
  
  </div>
  </div>
<button type="button" class="btn btn-outline-primary m-2 float-right">changer</button>
  </div>
  </form>



  </div>
  




















    
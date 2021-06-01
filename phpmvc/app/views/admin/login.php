<?php require APP_ROOT . '/views/inc/header.php' ?>
<section class="d-flex justify-content-between">

  
  <form action="<?php echo URL_ROOT; ?>/admin/login" method ="POST" class="col-4 flex column text-center p-4 m-4" style="height:400px"  >
  <a href="#"><img src="../public/img/logo.png"  alt="" style="width: 80px;height:80px; background-color:blue"></a>
  <div class="form-group m-3" >

<div>

    <label class="float-left" for="exampleFormControlInput1">Email address:</label>
    <input type="text" placeholder="Email *" name="email" class="form-control border border-primary" id="exampleFormControlInput1" >
    <span class="invalidFeedback">
                <?php echo $data['email_err']; ?>
            </span>
</div>
  
  <div >
  <label class="float-left m-2" for="exampleFormControlInput1">password:</label>
    <input type="password" placeholder="Password *" name="password" class="form-control border border-primary" id="exampleFormControlInput1" >
        <small id="emailHelp" class="form-text float-left text-muted "><a href="" class="text-dark">Mot de passe oublié?</a> </small>
        <span class="invalidFeedback">
                <?php echo $data['password_err']; ?>
            </span>
  </div>
  <div class="m-4">

  <button class="btn btn-outline-warning" id="submit" type="submit" value="submit">log in</button>
  
  </div>
  </div>
  <p class="options">Not registered yet? <a href="<?php echo URL_ROOT; ?>/admin/register">Create an account!</a></p>
  </form>

  <div class="mh-100 col-7" style="background-image: url(../public/img/bg-car.jpg);background-repeat: no-repeat;
  background-size: cover;height: 610px;"></div>
  </section>

  
 <section class="container-fluid">
 <section class="flex row justify-content-center " style="background-image: url(../public/img/backg.gif);background-repeat: no-repeat;
  background-size: cover;">
  
  
 <div class="col-md-6 d-flex flex-column p-4 m-3 " style="background-color:rgba(255, 255, 255, 0.6);
   border-radius: 15px">
  
  <h1 class="text-center display-3" style="font-family: 'Odibee Sans', cursive;">Location agence</h1>
  <p class="text-center">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Error voluptas soluta
   molestias,
   cumque laudantium sed vitae commodi perspiciatis dolores doloremque alias animi quasi labore
    incidunt fugit rerum quidem inventore voluptates!</p>

    <div id="carouselExampleControls" class="p-2 carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="text-center carousel-item active" style="height: 12rem;">
      <img class="rounded  w-50 h-100" src="../public/img/c3.jpg" alt="First slide" style="height:8rem">
    </div>
    <div class="text-center carousel-item" style="height: 12rem;">
      <img class="rounded w-50 h-100 " src="../public/img/c3.jpg" alt="Second slide" >
    </div>
    <div class="text-center carousel-item " style="height: 12rem;">
      <img class="rounded h-100 w-50" src="../public/img/superbike.jpg" alt="Third slide" style="height:8rem">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="bg-info carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="bg-info carousel-control-next-icon" aria-hidden="true"></span>
    <span class="bg-info sr-only">Next</span>
  </a>
</div>
<div class="text-center mt-4 p-2">
<a href="<?php echo URL_ROOT; ?>/admin/login"><button type="button" class="btn btn-lg" id="button">Log in</button></a>

<a href="<?php echo URL_ROOT; ?>/admin/register"><button type="button" class="btn btn-outline-dark btn-lg ">Sign Up</button></a> 
</div>
  </div>

  <div class="col-md-4 d-flex flex-column p-4 m-3" style="background-color:rgba(255, 255, 255, 0.6);
   border-radius: 15px;height:400px">

  <h1 class="" style="color: #d06a3a;">Reserver dès Maintenant</h1>
<div class="input-group">
  <select class="custom-select" id="inputGroupSelect04">
    <option selected>Categorie...</option>
    <option value="1">Cars</option>
    <option value="2">Moto</option>
    <option value="3">Van/Truck</option>
  </select>
  </div>

  <div class=" d-flex flex-column">
  <label>Entrer date de depart</label>
    <input type="date" class="form-control mt-2" id="date"  placeholder="Enter email">
    <label>Entrer date de fin</label>
    <input type="date" class="form-control mt-2" id="date"  placeholder="Enter email">
    <button type="button" class=" mt-2 btn btn-lg " id="button">RECHERCHER</button>
  </div>




  </div>
 </section>

  </section>
  
<style>

  #button{
   background-color:#d06a3a ;
  }
  #button:hover {
  background-color: #f7d5bc; 
  color: black;
}
</style>
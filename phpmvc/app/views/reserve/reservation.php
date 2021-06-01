<?php require APP_ROOT . '/views/inc/header.php' ?>
<?php require APP_ROOT . '/views/inc/navbar.php' ?>

<?php $upload=URL_ROOT."/public/img/";?>





<div class=" text-center p-5 ">
<h3>Lorem ipsum, dolor sit amet </h3>
<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ex provident ratione qui quas hic totam.
</p>


</div>




      




<div class="container-fluid">
     <div class="row">
     <?php foreach($data['cars'] as $cars) :  ?>
       
        <div class="col-lg-4 col-md-6 col-12 pb-5" data-aos="fade-up" data-aos-duration="1500">
          <div class="card">
          
          <img class="card-img-top" src="<?php echo $upload.$cars->image;?>" alt="" alt="Card image cap">
     <div class="card-body">
     <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsa, odio. Voluptatibus, repellendus eveniet.</p>

     <p>Marque: <?php echo $cars->Marque ?></p> 
      <p> Modele: <?php echo $cars->Modele ?></p> 
    <p>Prix:  <?php echo $cars->Prix ?></p>
    
    <a href="<?php echo URL_ROOT; ?>/clients/getInfo?code=<?php echo $cars->code ?>" class="btn btn-primary">Reserve Now</a>

            </div>
          </div>


          
        </div>
        
    
      
      
      <?php endforeach;  ?>
      </div> 
      </div>
      <?php require APP_ROOT . '/views/inc/footer.php' ?>
  
    
      
      
      
     

    




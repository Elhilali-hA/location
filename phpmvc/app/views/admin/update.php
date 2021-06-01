<?php foreach($data['cars'] as $cars) ?>
  <section class="container-fluid">

<form action="<?php echo URL_ROOT; ?>/admin/edit/<?php echo $_GET['Code'] ?>" method="post"   enctype="multipart/form-data"
  class="col-5 flex column text-center p-4 m-4 bg-light   w-50 mx-auto mt-5 mb-5"  >
<h2>Update Cars</h2>
 <!-- <a href="#"><img src="../logo.png"  alt="" style="width: 80px;height:80px"></a> -->
 <div class="form-group m-3" >

<div >

   <label class="float-left" for="exampleFormControlInput1">Name</label>
   <input  placeholder="" name="Name" value="<?php echo $cars->Name ?>" class="form-control border "  value="">
   <span class="invalidFeedback">
  
            </span>
</div>
 <div >

<label class="float-left" for="exampleFormControlInput1">categorie</label>
<input type="text" placeholder="" name="categorie" class="form-control border" value="<?php echo $cars->categorie ?>" >
<span class="invalidFeedback"> 

            </span>
</div> 
<div >

<label class="float-left" for="exampleFormControlInput1">Prix</label>
<input type="text" placeholder="" name="prix" class="form-control border " value="<?php echo $cars->prix ?>">
<span class="invalidFeedback">

            </span>
</div>
<br>
<div >


<input type="file" placeholder="Prix" name="image"  >
<span class="invalidFeedback">

            </span>
</div>




 <div class="m-4">
 <button id="submit" type="submit" value="submit" class="btn btn-outline-primary">update car</button>
 <a href="<?php echo URL_ROOT; ?>/admin/garage" class="btn btn-danger ml-3 ">Cancel</a>
 
 
 </div>
 </div>
 </form>

 </section>
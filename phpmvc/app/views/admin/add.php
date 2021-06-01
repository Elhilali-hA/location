<?php require APP_ROOT . '/views/inc/header.php' ?>
<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h3>Ajouter une vehicule</h3>
            <form action="<?php echo URL_ROOT; ?>/users/add" method="POST">
            <div class="form-group">
                    <label for="name">Code: <sup>*</sup></label>
                    <input type="text" name="Code" class="form-control form-control ">
                </div>
                <div class="form-group">
                    <label for="name">Name: <sup>*</sup></label>
                    <input type="text" name="Name" class="form-control form-control ">
                    <span class="text-dark">
                    <?php echo  $data['name_err']; ?></span>
                </div>
                <div class="form-group">
                    <label for="name">prix: <sup>*</sup></label>
                    <input type="text" name="prix" class="form-control form-control" >
                   
                </div>
                <div class="form-group">
                    <label for="name">categorie: <sup>*</sup></label>
                    <input type="text" name="categorie" class="form-control form-control " >
                    
                </div>
                <div class="form-group">
                    <label for="name">Color: <sup>*</sup></label>
                    <input type="text" name="color" class="form-control form-control " >
                    
                </div>
                <div class="form-group">
                    <label for="name">disponibilité: <sup>*</sup></label>
                    <input type="text" name="disponibilité" class="form-control form-control " >
                    
                </div>
                <!-- <div class="form-group">
                    <label for="name">image: <sup>*</sup></label>
                    <input type="file" name="img" class="form-control form-control ">
                    >
                </div> -->
                 <button type="submit" value="submit" class="btn btn-success">add</button>
            </form>
        </div>
    </div>
    <?php require APP_ROOT . '/views/inc/footer.php' ?>


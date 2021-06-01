
<?php require APP_ROOT . '/views/inc/header.php' ?>
<div class="container contact-form" style="margin-left: auto;margin-right:auto">
            <div class="contact-image">
                <img src="../public/img/logo.png" alt="rocket_contact"/>
            </div>
            <form method="post">
                <h3 class="mt-3">Drop Us a Message</h3>
               <div class="row text-center mt-4">
                    <div class="col-md-7">
                        <div class="form-group">
                            <input type="text" name="txtName" class="form-control" placeholder="Your Name *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtEmail" class="form-control" placeholder="Your Email *" value="" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="txtPhone" class="form-control" placeholder="Your Phone Number *" value="" />
                        </div>
                        <div class="form-group">
                        <input class="btn btn-primary" type="submit" value="Submit">
                        </div>
                    </div>
                    
                    <div class="form-group col-md-4">
    
                     <textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Votre message.." rows="5"></textarea>
  </div>
                    </div>
            
            </form>
</div>

<style>
body{
    background-color:#f7d5bc ;
}
.contact-form{
    background: #fff;
    margin-top: 10%;
    width: 70%;
    text-align: center;
}

.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 2rem;
    width: 14%;
    margin-top: -12%;
    transform: rotate(2deg);
}

</style>
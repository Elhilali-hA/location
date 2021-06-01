<?php
class Reserves extends Controller {

    public function __construct(){
        $this->reserveModel = $this->model('client');
     }


     public function reservation(){
        $cars = $this->reserveModel->selectall();
        $data = [
           'cars' => $cars
        ];
        $this->view('clients/reservation',$data);
     }

     public function getInfo(){
         $code=$_GET['code'];
        $cars = $this->reserveModel->selectbyInfo($code);
        $data = [
           'cars' => $cars
        ];
        $this->view('clients/getInfo',$data);
     }


     public function getReserve(){
      $id=$_GET['id'];
     $cars = $this->reserveModel->selectReserve($id);
     $data = [
        'cars' => $cars
     ];
     $this->view('clients/show',$data);
  }

     public function show(){
      
      $cars = $this->reserveModel->selectReserve();
      $data = [
         'cars' => $cars
      ];
     $this->view('clients/show',$data);
  }

     public function add(){

        $this->view('clients/getInfo');
     }

// :::::::::::::::::::::::::::::::::::::::::::::::::
     public function body(){
      $code=$_GET['code'];
     $cars = $this->reserveModel->selectbycars($code);
     $data = [
        'cars' => $cars
     ];
     $this->view('inc/body',$data);
  }
     public function add1(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
           $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
  
            $data = [
               'Marque' => trim($_POST['Marque']),
               'Modele' => trim($_POST['Modele']),
               'Prix' => trim($_POST['Prix']),
               'Fulname' => trim($_POST['Fulname']),
               'datedebut' => trim($_POST['datedebut']),
               'datefin' => trim($_POST['datefin']),
            ];
           
              // Validated
              if( $this->reserveModel->add2($data)===true ){
                 flash('post_message', 'reserve added');
                 redirect('clients/show');
              } else{
                 die('Something went wrong');
              }
        
     }
  
  
  }


  public function edit($id)
{    
   
   if($_SERVER['REQUEST_METHOD']=='POST'){
      // Sanitize POST Array
      $_POST = filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);

      $data = [
         'id' => $id,
         'Marque' => trim($_POST['Marque']),
         'Modele' => trim($_POST['Modele']),
         'Fulname' => trim($_POST['Fulname']),
         'Prix' => trim($_POST['Prix']),
         'datedebut' => trim($_POST['datedebut']),
         'datefin' => trim($_POST['datefin']),
         
      ];
         // Validated
         if( $this->clientModel->edit($data) === true){
            flash('cart_message', 'car Updated');
            redirect('clients/show');
         } else{
            die('Something went wrong');
         }
      
         // Load the view
         
      

   } else{
      $this->view('clients/updateReserve', $data);
   }

} 

public function updateReserve(){
   $id=$_GET['id'];
     $cars = $this->reserveModel->selectReserveId($id);
     $data = [
        'cars' => $cars
     ];
   $this->view('clients/updateReserve',$data);
}
public function deleteReserve($id){
   if( $this->reserveModel->deleteRes($id) ){
      flash('post_message', 'Post removed');
      redirect('clients/show');
   } else {
      die('Something went wrong');
   }
}



}
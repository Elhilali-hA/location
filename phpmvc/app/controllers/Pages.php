<?php


    class Pages extends Controller
    {

       public function index()
       {
          if( isLoggedIn() ) {
             redirect('posts');
          }
          
          $this->view('pages/index');
       }

       public function about()
       {
          $data = [
              'title' => 'About Us',
              'description' => 'App to share posts with other users'
          ];
          $this->view('pages/about', $data);
       }
       public function offer()
       {
          
          $this->view('pages/offer');
       }
       public function contact()
       {
          
          $this->view('pages/contact');
       }
    
    }
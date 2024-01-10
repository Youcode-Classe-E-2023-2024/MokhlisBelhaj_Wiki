<?php
class Home extends Controller{
    public function __construct(){
        if(!isLoggedIn()){
            redirect('authentication/login');
                    }

    }
    
    public function index(){
        print_r($_SESSION);
        $this->view('home/index');
    }
  
}
<?php
class Admin extends Controller{
    public function __construct()
    {
        if($_SESSION['role'] != 'admin'){
            redirect('404');
        }
    }
public function index(){
    $this->view('admin/index');

}





}
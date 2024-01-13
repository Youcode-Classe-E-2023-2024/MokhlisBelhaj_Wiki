<?php
class author extends Controller{

 private $tagmodel;
    private $Categorymodel;
    private $Usermodel;
    public function __construct()
    {
        if($_SESSION['role'] != 'author'){
            redirect('404');
        }
        $this->tagmodel = $this->model('Tag');
        $this->Categorymodel = $this->model('Category');
        $this->Usermodel = $this->model('User');
    }
    public function index(){
        $this->view('author/index');
    }
}
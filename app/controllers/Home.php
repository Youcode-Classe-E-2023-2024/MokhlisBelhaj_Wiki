<?php
class Home extends Controller{
    private $ArticleModel;
    private $categoryModel;
    public function __construct(){
      $this->ArticleModel = $this->model('Article');
      $this->categoryModel = $this->model('category');

    }
    
    public function index(){
        $this->view('home/index');
    }
    public function allarticles(){
        $Article = $this->ArticleModel->articlehome();
        echo json_encode($Article);
    }
    public function lastcategorys(){
        $category = $this->categoryModel->getallCategoryhome();
        echo json_encode($category);
    }
    public function pagedetail($id){
        $Article = $this->ArticleModel->articlehomebyId($id);
        $this->view('home/detail',$Article);
    }
  
}
<?php
class Home extends Controller
{
    private $ArticleModel;
    private $categoryModel;
    public function __construct()
    {
        $this->ArticleModel = $this->model('Article');
        $this->categoryModel = $this->model('category');
    }

    public function index()
    {
        $this->view('home/index');
    }
    public function pagedetail($id)
    {

        $Article = $this->ArticleModel->articlehomebyId($id);
        $Tag = $Article[0]->tag_names;
        $Tag = 'dev,frontend,IT';
        $tagArray = explode(',', $Tag);
        $data = [
            'article' => $Article[0],
            'tag' => $tagArray

        ];

        $this->view('home/detail', $data);
    }
    public function allarticles()
    {
        $Article = $this->ArticleModel->articlehome();
        echo json_encode($Article);
    }
    public function lastcategorys()
    {
        $category = $this->categoryModel->getallCategoryhome();
        echo json_encode($category);
    }
    public function searcharticles()
    {
        
        $data = [
            'type' => $_POST['type'],
            'value' => $_POST['value']
        ];
      
        if ($data['type'] == 'article') {
            $res = $this->ArticleModel->getArticleByTitle($data);
           
            if (!empty($res[0]->id)) {
                http_response_code(200);
                echo json_encode($res);
            } else {
                http_response_code(400);
                header('Content-Type: application/json');
                echo json_encode(array('message' => 'No articles with this title found'));
            }
        }
           
        if ($data['type'] === 'category'){
            $res=$this->ArticleModel->getArticleByCategory($data);
            if (!empty($res[0]->id)) {
             http_response_code(200);
             echo json_encode($res);
            }else{
                http_response_code(400);
             header('Content-Type: application/json');
             echo json_encode(array('message' => 'No articles with this Category found'));
         }
          
        }
        if ($data['type'] === 'Tags'){
            $res=$this->ArticleModel->getArticleByTag($data);
            if (!empty($res[0]->id)) {
             http_response_code(200);
             echo json_encode($res);
            }else{
                http_response_code(400);
             header('Content-Type: application/json');
             echo json_encode(array('message' => 'No articles with this Tag found'));
         }
          
        }
       
    }
}

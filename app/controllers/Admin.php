<?php
class Admin extends Controller
{
    private $tagmodel;
    private $Categorymodel;
    private $Usermodel;
    private $Articlemodel;
    public function __construct()
    {
        if($_SESSION['role'] != 'admin'){
            redirect('404');
        }
        $this->tagmodel = $this->model('Tag');
        $this->Categorymodel = $this->model('Category');
        $this->Usermodel = $this->model('User');
        $this->Articlemodel = $this->model('Article');
    }
    public function index()
    {
        $this->view('admin/index');
    }
    public function allUsers(){
        $users = $this->Usermodel->getUser();
        echo json_encode($users);

    }
    //-------------------------articles------------------------
    public function allarticle()
    {
        $Article = $this->Articlemodel->getAllArticleadmin();
        echo json_encode($Article);
    }
    public function archiveArticle($id){
       
        $Article = $this->Articlemodel->archiveArticle($id);
        echo json_encode($Article);
    }
    // -----------------------CRUD Category --------------------
    public function allcategory()
    {
        $Category = $this->Categorymodel->getallCategory();
        echo json_encode($Category);
    }
    public function addCategory()
    {
        
        $data = [
            "name" => $_POST['name']
        ];
        $validation = $this->Categorymodel->uniqueName($data["name"]);
       
        if(!$validation){
            $Category = $this->Categorymodel->insetCategory($data);
            if ($Category) {
                http_response_code(201);
            } else {
                http_response_code(400);
            }
        }else{
            http_response_code(400);
            echo json_encode("this category is alread existe");
        }
     
    }
    public function getCategoriesId($id){
        $data=['idCategory'=>$id];
    $Category = $this->Categorymodel->getCategoryById($data);
    echo json_encode($Category);

    }
    public function updateCategory()
    {
        $data = [
            "idCategory" => $_POST['idCategory'],
            "name" => $_POST['name']
        ];
        $Category = $this->Categorymodel->updatCategory($data);
       
        if ($Category) {
            http_response_code(200);
            echo json_encode($Category);
        } else {
            http_response_code(400);
        }
    }
    public function deleteCategory($id)
    {
        $data = [
            "idCategory" => $id,
        ];
        $Category = $this->Categorymodel->deleteCategory($data);
        
        if ($Category) {
            http_response_code(200);
        } else {
            http_response_code(400);
        }
    }


    // ------------------CRUD Tag --------------------------------
    
    public function alltags()
    {
        $tag = $this->tagmodel->getallTag();
        echo json_encode($tag);
    }
    public function getTagId($id){
        
        $data=['idtag'=>$id];
    $Tag = $this->tagmodel->getTagById($data);
    echo json_encode($Tag);

    }
    public function addtags()
    {
        
        $data = [
            "name" => $_POST["tagname"]
        ];
        $validation = $this->tagmodel->uniqueName($data["name"]);
        if(!$validation){
            $tag = $this->tagmodel->insetTag($data);
        if ($tag) {
            http_response_code(201);
        } else {
            http_response_code(400);
        }
        }else{
            http_response_code(400);
            echo json_encode("this tag is alread existe");
        }
       
    }
    public function updateTag()
    {
        $data = [
            "idtag" => $_POST['idtag'],
            "name" => $_POST['name']
        ];
        $tag = $this->tagmodel->updatTag($data);
          if ($tag) {
            http_response_code(201);
            echo json_encode($tag);
        } else {
            http_response_code(400);
        }
    }
    public function deleteTag($id)
    {
        $data = [
            "idtag" => $id,
        ];
        $tag = $this->tagmodel->deleteTag($data);
        if ($tag) {
            http_response_code(201);
        } else {
            http_response_code(400);
        }
    }
}

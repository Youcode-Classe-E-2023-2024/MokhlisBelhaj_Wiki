<?php
class Admin extends Controller
{
    private $tagmodel;
    private $Categorymodel;
    public function __construct()
    {
        // if($_SESSION['role'] != 'admin'){
        //     redirect('404');
        // }
        $this->tagmodel = $this->model('Tag');
        $this->Categorymodel = $this->model('Category');
    }
    public function index()
    {
        $this->view('admin/index');
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
        $Category = $this->Categorymodel->insetCategory($data);
        if ($Category) {
            http_response_code(201);
        } else {
            http_response_code(400);
        }
    }
    public function updateCategory()
    {
        $data = [
            "idCategory" => $_POST['idCategory'],
            "name" => $_POST['name']
        ];
        $Category = $this->Categorymodel->updatCategory($data);
        if ($Category) {
            http_response_code(201);
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
            http_response_code(201);
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
    public function addtags()
    {
        $data = [
            "name" => $_POST['name']
        ];
        $tag = $this->tagmodel->insetTag($data);
        if ($tag) {
            http_response_code(201);
        } else {
            http_response_code(400);
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

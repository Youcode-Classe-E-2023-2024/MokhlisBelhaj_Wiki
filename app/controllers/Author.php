<?php
class author extends Controller
{

    private $tagmodel;
    private $Categorymodel;
    private $Usermodel;
    private $Articlemodel;
    public function __construct()
    {
        // if($_SESSION['role'] != 'author'){
        //     redirect('404');
        // }
        $this->tagmodel = $this->model('Tag');
        $this->Categorymodel = $this->model('Category');
        $this->Usermodel = $this->model('User');
        $this->Articlemodel = $this->model('Article');
    }
    public function index()
    {
        $this->view('author/index');
    }
    // _________________category________________
    public function allCategory()
    {
        $Category = $this->Categorymodel->getallCategory();
        echo json_encode($Category);
    }
    // __________________tags________________
    public function alltags()
    {
        $tag = $this->tagmodel->getallTag();
        echo json_encode($tag);
    }
    // ____________________article________________
    public function allarticle()
    {
        $Article = $this->Articlemodel->getallArticle();
        echo json_encode($Article);
    }
    public function addArticle()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $data = [
                "image" => $_FILES["image"],
                "title" => $_POST['title'],
                "content" => $_POST['content'],
                "category" => $_POST['category'],
                "tags" => $_POST['selected_tags'],
                "image_err" => "",
                "title_err" => "",
                "tags_err" => "",
            ];


            if (empty($data['image'])) {
                $data["image_err"] = "choose your image ";
            }
            if (empty($data['title'])) {
                $data["title_err"] = "title required";
            }
            if (empty($data['tags'])) {
                $data["tags_err"] = "Please select at least one tag. ";
            }

            if (empty($data['image_err']) && empty($data['title_err']) && empty($data['tags_err'])) {
                // Check if the file is uploaded successfully and has the expected type
                if (!empty($_FILES['image']['name'])) {
                    $file_name = $_FILES['image']['name'];
                    $file_tmp = $_FILES['image']['tmp_name'];
                    $data['image'] =  date('Y-m-d').$file_name;
                    $file_destination = 'C:\\xampp\\htdocs\\MokhlisBelhaj_Wiki\\public\\img\\' . $data['image'];
                    // Move the uploaded file to the destination directory
                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        $Article = $this->Articlemodel->insertarticle($data);
                        ;

                        if ($Article == false) {
                            die('Article not added');
                        }else{
                       
                            $datta = [
                                'id_articles' => $Article,
                                'tags' => $_POST['selected_tags']
                            ];
                           
                            foreach ($datta['tags'] as $tagId) {
                                $dataToInsert = [
                                    'id_articles' => $datta['id_articles'],
                                    'id_tag' => $tagId

                                ];
                              

                                $this->Articlemodel->insertTagArticle($dataToInsert);
                            };

                            redirect('author/index');
                        }
                        }else {
                            die('Error file not completed');
                        }
                    } else {
                        // Handle the case where the file upload failed
                        die('File upload failed');
                    }
                }
            }
            debug($data);

        } 
    }

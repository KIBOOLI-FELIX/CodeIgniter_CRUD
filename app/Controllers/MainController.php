<?php

namespace App\Controllers;

use App\Models\StudentModel;
use App\Controllers\BaseController;
use CodeIgniter\HTTP\Response;

class MainController extends BaseController
{
    public $studentModel;
    public function __construct(){
        $this->studentModel=new StudentModel();
    }
    public function index()
    {
        
        return view("layouts/frontend.php");
    }

    //return student addition view
    public function student()
    {
        //
        return view("studentajax/index.php");
    }

    //storing information
    public function store(){
     
        $data=[
            "name"=>$this->request->getPost("name"),
            "email"=>$this->request->getPost("email"),
            "phone"=>$this->request->getPost("phone"),
            "course"=>$this->request->getPost("course"),
        ];
        $this->studentModel->insert($data);
        $status=["status"=>"Student Inserted Successfully"];
        $this->response->setJSON($status)->send();
    }
    //getting data from the database
    public function fetch(){
        $data["students"]=$this->studentModel->findAll();
        // echo json_encode($data);
        $this->response->setJSON($data)->send();
    }
    //view student
    public function view(){
        $data["student"]=$this->studentModel->find($this->request->getPost("stud_id"));
        $this->response->setJSON($data)->send();
    }
    //update
    public function update(){
        $data["student"]=$this->studentModel->find($this->request->getPost("stud_id"));
        $this->response->setJSON($data)->send();
    }
    //saving updated data
    public function updateSave(){
             
        $id=$this->request->getPost("id");
        $data=[
            "name"=>$this->request->getPost("name"),
            "email"=>$this->request->getPost("email"),
            "phone"=>$this->request->getPost("phone"),
            "course"=>$this->request->getPost("course"),
        ];
        
        if($this->studentModel->update($id,$data)){
            $status=["status"=>"Student Updated Successfully"];
            $this->response->setJSON($status)->send();
        }else{
            $status=["status"=>"Student Update unsuccessfully"];
            $this->response->setJSON($status)->send();
        }
     
    }

}


// $response = service('response');

// $response->setStatusCode(Response::HTTP_OK);
// $response->setBody($output);
// $response->setHeader('Content-type', 'text/html');
// $response->noCache();

// // Sends the output to the browser
// // This is typically handled by the framework
// $response->send();
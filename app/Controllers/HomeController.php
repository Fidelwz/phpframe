<?php

namespace App\Controllers;

use app\Models\task;

class HomeController extends Controller
{
    
    public function index()
    {
      // $data = [

      //   "task_name"=> "NEW",
      //   "numero"=> "69"
      // ];
        $prueba = new task();

        $data =  $prueba->all();
       

        // $data = ['name'=>'por la granputa','lastname'=>'contreras'];

        return $this->view("home",$data);
    }



    public function delete($id){

      // $data = new task();
      // $data->delete($id);
    return $id;

    }



    



} 
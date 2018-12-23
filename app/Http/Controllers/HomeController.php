<?php

namespace App\Http\Controllers;
use App\CustomAuth;
use Illuminate\Http\Request;
use App\model;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = new CustomAuth();
        $logged_id = $auth->WhoIsHere();
        $logged_type = $auth->loggedInType();
        if($logged_type == "org" || $logged_type == "applicant"){
            $model = new Model("user_account");
            $values = ["name"];
            $conditions = ["id = ".$logged_id];
            $name = $model->select($values , $conditions)->fetch_assoc()["name"];
        }
        else if($logged_type == "sup"){
            $model = new Model("supervisor");
            $values = ["name"];
            $conditions = ["id = ".$logged_id];
            $name = $model->select($values , $conditions)->fetch_assoc()["name"];
        }
        else{
            $name = "";
        }
        return view('welcome' , compact('logged_id' , 'logged_type' , 'name'));
    }
    
}

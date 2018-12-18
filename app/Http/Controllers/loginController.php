<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
use App\CustomAuth;

class loginController extends Controller
{
    public function load_user_form(){
        return view("auth.user_login");
    }
    public function load_org_form(){
        return view("auth.org_login");
    }
    public function load_sup_form(){
        return view("auth.sup_login");
    }
    public function user_login(Request $request){
        $model = new Model("user_account");
        $auth = new CustomAuth();
        $credintals = $request->all();
        $email = $credintals["email"];
        $password = $credintals["password"];
        $conditions = ["email = '".$email."'" , "password = '".$password."'"];
        $values = ["id"];
        $result = $model->select($values , $conditions);
        if($result->num_rows){
            $id = $result->fetch_assoc()["id"];
            $type = $auth->loggedInType();
            if(!$type){
                $auth->login("applicant" , $id);
            }
            return redirect("/");
        }
        else{
            return redirect("/user_login")->with("status" , "Wrong login credintals");
        }
    }

    public function org_login(Request $request){
        $model = new Model("organization");
        $auth = new CustomAuth();
        $credintals = $request->all();
        $email = $credintals["email"];
        $password = $credintals["password"];
        $conditions = ["email = '".$email."'" , "password = '".$password."'"];
        $values = ["id"];
        $result = $model->select($values , $conditions);
        if($result->num_rows){
            $type = $auth->loggedInType();
            $id = $result->fetch_assoc()["id"];
            if(!$type){
                $auth->login("org" , $id);
            }
        }
        else{
            return redirect("/org_login")->with("status" , "Wrong login credintals");
        }
    }

    public function sup_login(Request $request){
        $model = new Model("supervisor");
        $auth = new CustomAuth();
        $credintals = $request->all();
        $email = $credintals["email"];
        $password = $credintals["password"];
        $conditions = ["email = '".$email."'" , "password = '".$password."'"];
        $values = ["id"];
        $result = $model->select($values , $conditions);
        if($result->num_rows){
            $id = $result->fetch_assoc()["id"];
            $type = $auth->loggedInType();
            if(!$type){
                $auth->login("sup" , $id);
            }
        }
        else{
            return redirect("/sup_login")->with("status" , "Wrong login credintals");
        }
    }

    public function logout(){
        $auth = new CustomAuth();
        $auth->logout();
        return redirect("/");
    }
}
?>

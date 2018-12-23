<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
use App\CustomAuth;

class supervisorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Model("supervisor");

        $supervisors = $model->select("*");

        return view("supervisors.index" , compact('supervisors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("auth.SuperVisor");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone_number" => "required",
            "country" => "required", 
            "city" => "required",
            "zip" => "required",
            "password" => "required"
        ]);

        $model = new Model("supervisor");
        $requestData = $request->all();
        $name = "'".$requestData["name"]."'";
        $email = "'" . $requestData["email"] . "'";
        $country = "'" . $requestData["country"] . "'";
        $city = "'" . $requestData["city"] . "'";
        $zip = $requestData["zip"];
        $password = "'" . $requestData["password"] . "'";
        $phone_number =  $requestData["phone_number"];
        $values = ["MAX(id) as last_id"];
        $last_id = $model->select($values);
        if($last_id->num_rows == 0){
            $id =0;
        }
        else{
            $id = $last_id->fetch_assoc()["last_id"]+1;
        }


        $values = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "phone_number" => $phone_number,
            "country" => $country,
            "city" => $city,
            "zip" => $zip,
            "password" => $password,
            "support_tickets_count" => 0
        );
        $model->insert($values);
        return redirect("sup_login")->with("success" , "supervisor added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $auth = new CustomAuth();
        $model = new Model("supervisor");
        $conditions = array("id = ".$id);
        $sup = $model->select("*" , $conditions);
        $sup=$sup->fetch_assoc();
        $model1 = new Model("user_account");
        $users=$model1->select("*");
        $id=$auth->WhoIsHere();
        if($auth->loggedInType() != "sup")
        {
            return redirect('/')->with("error","You Are Not Allowed");
        }
        return view("supervisor.show")->with("sup",$sup)->with("users",$users)->with("id",$id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model1 = new Model("supervisor");
        $conditions = array("id = " . $id);
        $sup = $model1->select("*" , $conditions);
        $sup=$sup->fetch_assoc();
        return view("supervisor.edit")->with("sup",$sup);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required",
            "email" => "required",
            "phone_number" => "required",
            "country" => "required", 
            "city" => "required",
            "zip" => "required",
            "password" => "required"
        ]);
        $model = new Model("supervisor");
        $requestData = $request->all();
        $name = "'".$requestData["name"]."'";
        $email = "'" . $requestData["email"] . "'";
        $country = "'" . $requestData["country"] . "'";
        $city = "'" . $requestData["city"] . "'";
        $zip = $requestData["zip"];
        $password = "'" . $requestData["password"] . "'";
        $phone_number = $requestData["phone_number"];
        $values = array(
            "name = ".$name,
            "email = ".$email,
            "phone_number = ".$phone_number,
            "country = ".$country,
            "city = ".$city,
            "zip = ".$zip,
            "password = ".$password,
        );
        $conditions = array("id = ".$id);
        $model->update($values , $conditions);
        return redirect("supervisors/".$id)->with("success" , "Supervisor updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Model("supervisor");
        $conditions = array("id = ".$id);
        $model->delete($conditions);
        return redirect("supervisors")->with("status" , "supervisor deleted successfully");
    }
}

<?php

namespace App\Http\Controllers;

use App\Model;
use Illuminate\Http\Request;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $model = new Model("user_account");
        $values = array(
            "id",
            "name",
            "email",
            "country",
            "city",
            "zip", 
            "phone_number"
        );
        $users = $model.select($values);
        return view("users.index" , compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("users.create");
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
            "id" => "required",
            "name" => "required",
            "email" => "required",
            "country" => "required",
            "city" => "required",
            "zip" => "required",
            "password" => "required",
            "phone_number" => "required",
            "about" => "required"
        ]);

        $model = new Model("user_account");
        $requestData = $request->all();
        $id = $requestData["id"];
        $name = "'".$requestData["name"]."'";
        $email = "'" . $requestData["email"] . "'";
        $country = "'" . $requestData["country"] . "'";
        $city = "'" . $requestData["city"] . "'";
        $zip = "'" . $requestData["zip"] . "'";
        $password = "'" . $requestData["password"] . "'";
        $phone_number = "'" . $requestData["phone_number"] . "'";
        $about = "'" . $requestData["about"] . "'";


        $values = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "country" => $country,
            "city" => $city,
            "zip" => $zip,
            "password" => $password,
            "phone_number" => $phone_number,
            "about" => $about
        )

        $model->insert($values);
        return redirect("users")->with("status" , "User added successfully");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new Model("user_account");
        $conditions = array("id = " . $id)
        $user = $model->select("*" , $conditions);
        return view("users.show" , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("users.edit")
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
            "id" => "required",
            "name" => "required",
            "email" => "required",
            "country" => "required",
            "city" => "required",
            "zip" => "required",
            "password" => "required",
            "phone_number" => "required",
            "about" => "required"
        ]);

        $model = new Model("user_account");
        $requestData = $request->all();
        $id = $requestData["id"];
        $name = "'".$requestData["name"]."'";
        $email = "'" . $requestData["email"] . "'";
        $country = "'" . $requestData["country"] . "'";
        $city = "'" . $requestData["city"] . "'";
        $zip = "'" . $requestData["zip"] . "'";
        $password = "'" . $requestData["password"] . "'";
        $phone_number = "'" . $requestData["phone_number"] . "'";
        $about = "'" . $requestData["about"] . "'";


        $values = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "country" => $country,
            "city" => $city,
            "zip" => $zip,
            "password" => $password,
            "phone_number" => $phone_number,
            "about" => $about
        )

        $conditions = array("id = ".$id);
        $model->update($values , $conditions);
        return redirect("users/".$id)->with("status" , "User updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Model("user_account");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
        return redirect("users")->with('status' , 'user deleted successfully');
    }
}

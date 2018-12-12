<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;

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
        return view("supervisors.create");
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
        $model->insert($requestData);

        return redirect("supervisor")->with("status" , "supervisor added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new Model("supervisor");
        $conditions = array("id = ".$id);
        $supervisor = $model->select("*" , $conditions);

        return view("supervisor.show" , compact("supervisor"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("supervisor.edit");
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
        $conditions = array("id = ".$id);
        $model->update($requestData , $conditions);
        return redirect("supervisors/".$id)->with("status" , "Supervisor updated successfully");
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class opportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opportunityModel = new Model("opportunity");
        
        $conditions = array("opportunity.posted_by = user_account.id");

        $tojoin = array("user_account");

        $opportunitys = $opportunityModel->select("*" , $conditions , $tojoin);

        return view("opportunity.index" , compact('opportunitys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("opportunity.create");
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
            "expiration_date" => "required",
            "description" => "required",
            "duration" => "required",
            "funded" => "required",
            "requirements" => "required"
        ]);

        $model = new Model("opportunity");
        $requestData = $request->all();
        $model->insert($requestData);
        //return redirect("opportunity")->with("status" , "Opportunity added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
            "expiration_date" => "required",
            "description" => "required",
            "duration" => "required",
            "funded" => "required",
            "requirements" => "required"
        ]);

        $model = new Model("opportunity");
        $requestData = $request->all();
        $conditions = array("post_id = ".$id);
        $model->update($requestData , $conditions);
        //return redirect("opportunity/".$id)->with("status" , "opportunity updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Model("opportunity");
        $conditions = array("post_id = ".$id);
        $model->delete($conditions);
        //return redirect("opportunity/".$id)->with("status" , "opportunity deleted successfully");
    }
}

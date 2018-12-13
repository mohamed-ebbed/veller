<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
class applicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            "gender" => "required",
            "day" => "required",
            "month" => "required",
            "resume" => "required"
        ]);
        $model = new Model("applicant");
        $requestData = $request->all();
        $id = $requestData["id"];
        $gender = "'".$requestData["gender"]."'";
        $day = "'".$requestData["day"]."'";
        $month = "'".$requestData["month"]."'";
        $res = "'".$requestData["resume"]."'";
        
        $values = array(
            "id" => $id,
            "gender" => $start_Date,
            "day" => $end_Date,
            "month" => $degree,
            "resume" => $inst
        );
        $model->insert($values);
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
            "id" => "required",
            "gender" => "required",
            "day" => "required",
            "month" => "required",
            "resume" => "required"
        ]);
        $model = new Model("applicant");
        $requestData = $request->all();
        $id = $requestData["id"];
        $gender = "'".$requestData["gender"]."'";
        $day = "'".$requestData["day"]."'";
        $month = "'".$requestData["month"]."'";
        $res = "'".$requestData["resume"]."'";
        
        $values = array(
            "id" => $id,
            "gender" => $start_Date,
            "day" => $end_Date,
            "month" => $degree,
            "resume" => $inst
        );
        $conditions = array("id = ".$id);
        $model->update($values,$conditions);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Model("applicant");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
    }
}

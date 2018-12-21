<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
use App\Http\Controllers\educationController;
use App\Http\Controllers\interestsController;
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
        
        $model = new Model("applicant");
        $requestData = $request->all();
        $gender = "'".$requestData["gender"]."'";
        $day = "'".$requestData["day"]."'";
        $month = "'".$requestData["month"]."'";
        $res = "'".$requestData["resume"]."'";
        
        $values = array(
            "gender" => $start_Date,
            "day" => $end_Date,
            "month" => $degree,
            "resume" => $res
        );
        $model->insert($values);
        educationController::store($request);
        interestsController::store($request);
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
            "resume" => $res
        );
        $conditions = array("id = ".$id);
        $model->update($values,$conditions);
        educationController::update($request,$id);
        interestsController::update($request,$id);
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

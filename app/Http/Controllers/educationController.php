<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
class educationController extends Controller
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
    public function store(Request $request,$id)
    {
        //input names
        $model = new Model("education");
        $requestData = $request->all();
        $edu = "'".$requestData["education"]."'";
        
        //column names
        $values = array(
            "applicant_id" => $id,
            "start_date" => $start_Date,
            "end_date" => $end_Date,
            "degree" => $degree,
            "institution" => $inst
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
        
        $model = new Model("education");
        $requestData = $request->all();
        $edu = "'".$requestData["education"]."'";
        
        $values = array(
            "applicant_id" => $id,
            "start_date" => $start_Date,
            "end_date" => $end_Date,
            "degree" => $degree,
            "institution" => $inst
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
        $model = new Model("education");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
    }
}

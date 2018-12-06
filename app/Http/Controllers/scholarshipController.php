<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class scholarshipController extends Controller
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
            "post_id" => "required",
            "specialization" => "required",
            "paid" => "required",
            "type" => "required"
        ]);
        $model = new Model("scholarship");
        $requestData = $request->all();
        $id = $requestData["post_id"];
        $spec = "'".$requestData["specialization"]."'";
        $paid = "'".$requestData["paid"]."'";
        $type = "'".$requestData["type"]."'";
        
        $values = array(
            "post_id" => $id,
            "specialization" => $spec,
            "paid" => $paid,
            "type" => $type,
        )
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
            "post_id" => "required",
            "specialization" => "required",
            "paid" => "required",
            "type" => "required"
        ]);
        $model = new Model("scholarship");
        $requestData = $request->all();
        $id = $requestData["post_id"];
        $spec = "'".$requestData["specialization"]."'";
        $paid = "'".$requestData["paid"]."'";
        $type = "'".$requestData["type"]."'";
        
        $values = array(
            "post_id" => $id,
            "specialization" => $spec,
            "paid" => $paid,
            "type" => $type,
        )
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
        $model = new Model("scholarship");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
    }
}

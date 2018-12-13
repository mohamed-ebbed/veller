<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class organizationController extends Controller
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
        return view("auth.RegisterAsOrg");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            "id" => "required",
            "field" => "required",
            "type" => "required"
        ]);
        $model = new Model("organization");
        $requestData = $request->all();
        $id = $requestData["id"];
        $field = "'".$requestData["field"]."'";
        $type = "'".$requestData["type"]."'";
        
        $values = array(
            "id" => $id,
            "field" => $field,
            "type" => $type
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
        //
        $request->validate([
            "id" => "required",
            "field" => "required",
            "type" => "required"
            
        ]);
        $model = new Model("organization");
        $requestData = $request->all();
        $id = $requestData["id"];
        $field = "'".$requestData["field"]."'";
        $type = "'".$requestData["type"]."'";
        
        $values = array(
            "id" => $id,
            "field" => $field,
            "type" => $type
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
        //
        $model = new Model("organization");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
    }
}

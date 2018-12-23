<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model;

class ApplyForController extends Controller
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
            "post_id" => "required"
        ]);
        $requestData = $request->all();
        $model = new Model("apply_for");

        $values = ["id" , "post_id"];
        $conditions = ["id = ".$requestData["id"] , "post_id = ".$requestData["post_id"]];
        $old = $model->select($values , $conditions);
        if($old->num_rows != 0){
            return redirect()->back()->with("status" , "Already applied here");
        }
        
        $values = [
            "id" => $requestData["id"],
            "post_id" => $requestData["post_id"]
        ];

        $model->insert($values);
        return redirect("/opportunity")->with("status" , "Applied successfully");
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
    public function update(Request $request, $id, $postID)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, $postID)
    {
        $model = new Model("Apply_For");
        $conditions = array("id = ".$id, "post_id = ".$postID);
        $model->delete($conditions);
    }
}

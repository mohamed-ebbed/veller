<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
class scholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scholarModel = new Model("scholarship");
        $values = "*";

        $conditions = array(
            "scholarship.post_id = Opportunity.id"
        );

        $tojoin = array(
            "Opportunity"
        );

        $schoalrsData = $scholarModel->select($values , $conditions , $tojoin);

        return view("scholarship.index" , compact('schoalrsData'));
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
            "type" => $type
        );
        $model->insert($values);
        return redirect("schoalrships")->with("status" , "Scholarship added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new Model("Scholarship");
        $data = $model->select("*", "scholarship.post_id = ".$id);
        return view("scholarship.show", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = new Model("Scholarship");
        $data = $model->select("*", "scholarship.post_id = ".$id);
        return view("scholarship.edit", compact('data'));
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
            "type" => $type
        );
        $conditions = array("id = ".$id);
        $model->update($values,$conditions);
        return redirect("scholarship/".$id)->with("status" , "Scholarship updated successfully");
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
        return redirect("scholarship")->with("status" , "Scholarship deleted successfully");
    }
}

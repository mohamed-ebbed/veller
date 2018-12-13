<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internstsModel = new Model("Internship");
        $values = "*";

        $conditions = array(
            "Internship.post_id = Opportunity.id"
        );

        $tojoin = array(
            "Opportunity"
        );

        $internstsData = $internstsModel->select($values , $conditions , $tojoin);

        return view("Internship.index" , compact('internstsData'));
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
            "paid" => "required"
        ]);

        $model = new Model("Internship");
        $requestData = $request->all();
        $model->insert($requestData);
        return redirect("Internship")->with("status" , "Internship added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new Model("Internship");
        $data = $model->select("*", "Internship.post_id = ".$id);
        return view("Internship.show", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view("Internship.edit");
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
            "paid" => "required"
        ]);

        $model = new Model("Internship");
        $requestData = $request->all();
        $conditions = array("post_id = ".$id);
        $model->update($requestData , $conditions);
        return redirect("Internship/".$id)->with("status" , "Internship updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Model("Internship");
        $conditions = array("applicant_id = ".$id);
        $model->delete($conditions);
        return redirect("Internship/".$id)->with("status" , "Internship deleted successfully");
    }
}

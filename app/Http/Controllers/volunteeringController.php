<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
class volunteeringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $volunteeringModel = new Model("volunteering");
        $values = "*";

        $conditions = array(
            "volunteering.post_id = Opportunity.id"
        );

        $tojoin = array(
            "Opportunity"
        );

        $Data = $volunteeringModel->select($values , $conditions , $tojoin);

        return view("volunteering.index" , compact('Data'));
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
            "previous_experince" => "required"
        ]);
        $model = new Model("volunteering");
        $requestData = $request->all();
        $id = $requestData["post_id"];
        $p_exp = "'".$requestData["previous_experince"]."'";
        
        $values = array(
            "post_id" => $id,
            "previous_experince" => $p_exp
        );
        $model->insert($values);
        return redirect("volunteering")->with("status" , "Volunteering added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new Model("volunteering");
        $data = $model->select("*", "Internship.post_id = ".$id);
        return view("volunteering.show", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = new Model("volunteering");
        $data = $model->select("*", "Internship.post_id = ".$id);
        return view("volunteering.edit", compact('data'));
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
            "previous_experince" => "required"
        ]);
        $model = new Model("volunteering");
        $requestData = $request->all();
        $id = $requestData["post_id"];
        $p_exp = "'".$requestData["previous_experince"]."'";
        
        $values = array(
            "post_id" => $id,
            "previous_experince" => $p_exp
        );
        $conditions = array("id = ".$id);
        $model->update($values,$conditions);
        return redirect("volunteering/".$id)->with("status" , "Volunteering updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Model("volunteering");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
        return redirect("volunteering")->with("status" , "Volunteering deleted successfully");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;

class exchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Model = new Model("Exchange_Program");
        $values = "*";

        $conditions = array(
            "Exchange_Program.post_id = Opportunity.id"
        );

        $tojoin = array(
            "Opportunity"
        );

        $Data = $Model->select($values , $conditions , $tojoin);

        return view("exchange_program.index" , compact('Data'));
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
        //
        $request->validate([
            "post_id" => "required",
            "specialization" => "required"
        ]);
        $model = new Model("Exchange_Program");
        $requestData = $request->all();
        $id = $requestData["post_id"];
        $spec = "'".$requestData["Exchange_Program"]."'";
        
        $values = array(
            "post_id" => $id,
            "specialization" => $spec
        );
        $model->insert($values);
        return redirect("exchange_program")->with("status" , "Exchange Program added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new Model("Exchange_Program");
        $data = $model->select("*", "Exchange_Program.post_id = ".$id);
        return view("exchange_program.show", compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = new Model("Exchange_Program");
        $data = $model->select("*", "Exchange_Program.post_id = ".$id);
        return view("exchange_program.edit", compact('data'));
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
            "post_id" => "required",
            "specialization" => "required"
        ]);
        $model = new Model("Exchange_Program");
        $requestData = $request->all();
        $id = $requestData["post_id"];
        $spec = "'".$requestData["specialization"]."'";
        
        $values = array(
            "post_id" => $id,
            "specialization" => $spec
        );
        $conditions = array("id = ".$id);
        $model->update($values,$conditions);
        return redirect("exchange_program/".$id)->with("status" , "Exchange Program updated successfully");
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
        $model = new Model("Exchange_Program");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
        return redirect("exchange_program")->with("status" , "Exchange Program deleted successfully");
    }
}

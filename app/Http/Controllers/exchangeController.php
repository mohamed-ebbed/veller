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
            "Exchange_Program.post_id = Opportunity.post_id",
            "opportunity.posted_by = user_account.id"
        );

        $tojoin = array(
            "Opportunity",
            "user_account"
        );

        $posts = $Model->select($values , $conditions , $tojoin);

        return view("exchange_program.index" , compact('posts'));
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
    public function store(Request $request, $id)
    {
        //
        $request->validate([
            "post_id" => "required",
            "specialization" => "required"
        ]);
        $model = new Model("Exchange_Program");
        $requestData = $request->all();
        $spec = "'".$requestData["specialization"]."'";
        
        $values = array(
            "post_id" => $id,
            "specialization" => $spec
        );
        $model->insert($values);

        show($id);
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
        return view("exchange_program.edit/".$id, compact('data'));
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

        $spec = "'".$requestData["specialization"]."'";
        
        $values = array(
            "specialization" => $spec
        );
        $conditions = array("id = ".$id);
        $model->update($values,$conditions);
        show($id);
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
        return redirect("exchange_program.index")->with("status" , "Exchange Program deleted successfully");
    }
}

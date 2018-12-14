<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;

class messageController extends Controller
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
        return view("message");
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
            "sent_at" => "required",
            "sent_by" => "required",
            "content" => "required",
            "recieved_by" => "required"
        ]);
        $model = new Model("message");
        $requestData = $request->all();
        $sent_by = $requestData["sent_by"];
        $recieved_by = $requestData["recieved_by"];
        $sent_at = "'".date("Y-m-d h:i:sa")."'";
        $content = "'".$requestData["content"]."'";
        
        $values = array(
            "sent_at" => $sent_at,
            "sent_by" => $sent_by,
            "content" => $content,
            "recieved_by" => $recieved_by
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
        $model = new Model("message");
        $conditions = array("sent_by = " . $id);
        $columns = array('recieved_by','content','sent_at');
        $user = $model->select($columns , $conditions);
        return view("message" , compact('user'));
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
            "sent_at" => "required",
            "sent_by" => "required",
            "content" => "required",
            "recieved_by" => "required"
        ]);
        $model = new Model("message");
        $requestData = $request->all();
        $sent_by = $requestData["sent_by"];
        $recieved_by = $requestData["recieved_by"];
        $sent_at = "'".$requestData["sent_at"]."'";
        $content = "'".$requestData["content"]."'";
        
        $values = array(
            "sent_at" => $sent_at,
            "sent_by" => $sent_by,
            "content" => $content,
            "recieved_by" => $recieved_by
        );
        $conditions = array("sent_by = ".$sent_by);
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
        $model = new Model("message");
        $conditions = array("sent_by = " . $sent_by);
        $model->delete($conditions);
    }
}

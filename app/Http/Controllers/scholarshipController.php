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
            "scholarship.post_id = Opportunity.post_id",
            "opportunity.posted_by = user_account.id"
        );

        $tojoin = array(
            "Opportunity",
            "user_account"
        );

        $posts = $scholarModel->select($values , $conditions , $tojoin);

        return view("scholarship.index" , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('opportunity.types.scholar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    { 
        $model = new Model("scholarship");

        $requestData = $request->all();
        $spec = "'".$requestData["sspecialization"]."'";
        $paid = "'".$requestData["spaid"]."'";
        $type = "'".$requestData["stype"]."'";
        if($paid == "'yes'"){
            $paid = 1;
        }
        else{
            $paid = 0;
        }
        $values = array(
            "post_id" => $id,
            "specialization" => $spec,
            "paid" => $paid,
            "type" => $type
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
        $model = new Model("Scholarship");
        $values = array('*');
        $conditions = array('scholarship.post_id = '.$id);
        $data = $model->select($values, $conditions);
        return view("scholarship.show/".$id, compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
        
        $model = new Model("scholarship");
        $requestData = $request->all();
        $spec = "'".$requestData["sspecialization"]."'";
        $paid = "'".$requestData["spaid"]."'";
        $type = "'".$requestData["stype"]."'";
        if($paid == "'yes'"){
            $paid = 1;
        }
        else{
            $paid = 0;
        }
        $values = array(
            "specialization" => $spec,
            "paid" => $paid,
            "type" => $type
        );
        $conditions = array("post_id = ".$id);
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
        $model = new Model("scholarship");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
        return redirect("scholarship.index")->with("status" , "Scholarship deleted successfully");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;

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
            'Internship.post_id = Opportunity.post_id',
            'opportunity.posted_by = user_account.id'
        );

        $tojoin = array(
            "Opportunity",
            "user_account"
        );

        $posts = $internstsModel->select($values , $conditions , $tojoin);

        return view("internship.index" , compact('posts'));
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
        $request->validate([
            "post_id" => "required",
            "specialization" => "required",
            "paid" => "required"
        ]);

        $model = new Model("Internship");
        $requestData = $request->all();

        $spec = "'".$requestData["specialization"]."'";
        $paid = "'".$requestData["paid"]."'";
        
        $values = array(
            "specialization" => $spec,
            "paid" => $paid
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
        $model = new Model("Internship");
        $values = array('*');
        $conditions = array('Internship.post_id = '.$id);
        $data = $model->select($values, $conditions);
        return view("internship.show/".$id, compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = new Model("Internship");
        $values = array('*');
        $conditions = array('Internship.post_id = '.$id);
        $data = $model->select($values, $conditions);
        return view("internship.edit/".$id, compact('data'));
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

        $spec = "'".$requestData["specialization"]."'";
        $paid = "'".$requestData["paid"]."'";
        
        $values = array(
            "post_id" => $id,
            "specialization" => $spec,
            "paid" => $paid
        );

        $conditions = array("post_id = ".$id);

        $model->update($requestData , $conditions);

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
        $model = new Model("Internship");
        $conditions = array("applicant_id = ".$id);
        $model->delete($conditions);
        return redirect("internship.index")->with("status" , "internship deleted successfully");
    }
}

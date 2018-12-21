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
            "volunteering.post_id = Opportunity.post_id",
            "opportunity.posted_by = user_account.id"
        );

        $tojoin = array(
            "Opportunity",
            "user_account"
        );

        $posts = $volunteeringModel->select($values , $conditions , $tojoin);

        return view("volunteering.index" , compact('posts'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('opportunity.types.vol');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request,$id)
    {
        $model = new Model("volunteering");
        $requestData = $request->all();
        $p_exp = "'".$requestData["pexp"]."'";
        $values = array(
            "post_id" => $id,
            "previous_experience" => $p_exp
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
        $model = new Model("volunteering");
        $values = array('*');
        $conditions = array('Internship.post_id = '.$id);
        $data = $model->select($values, $conditions);
        return view("volunteering.show/".$id, compact('data'));
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
        
        $model = new Model("volunteering");

        $requestData = $request->all();
        $p_exp = "'".$requestData["pexp"]."'";
        $values = array(
            "post_id" => $id,
            "previous_experience" => $p_exp
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
        $model = new Model("volunteering");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
        return redirect("volunteering.index")->with("status" , "Volunteering deleted successfully");
    }
}

<?php

namespace App\Http\Controllers;
use App\Model;

use Illuminate\Http\Request;

class contestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contestModel = new Model("contest");
        $values = array(
            "post_id",
            "prizes",
            "specialization",
            "expiration_date",
            "opportunity.country",
            "opportunity.city",
            "duration",
            "funded",
            "user_account.name"
        );

        $conditions = array(
            "contest.post_id = opportunity.post_id",
            "opportunity.post_id = user_account.id"
        );

        $tables = array(
            "opportunity",
            "user_account"
        );

        $contests = $contestModel->select($values , $conditions , $tables);

        return view("contests.index" , compact('contests'));
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
            "specialization" => "required",
            "prizes" => "required"
        ]);

        $model = new Model("contest");
        $requestData = $request->all();
        $post_id = $requestData["post_id"];
        $specialization = "'".$requestData["specialization"]."'";
        $prizes = "'" . $requestData["prizes"] . "'";
        $values = array(
            "post_id" => $post_id,
            "specialization" => $specialization,
            "prizes" => $prizes
        );

        $model->insert($values);
        return redirect("contests")->with("status" , "Contest added successfully");
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
    public function update(Request $request, $id)
    {
        $request->validate([
            "specialization" => "required",
            "prizes" => "required"
        ]);

        $model = new Model("contest");
        $requestData = $request->all();
        $specialization = "'".$requestData["specialization"]."'";
        $prizes = "'" . $requestData["prizes"] . "'";
        $values = array(
            "specialization" => $specialization,
            "prizes" => $prizes
        );

        $conditions = array("post_id = ".$id);
        $model->update($values , $conditions);
        return redirect("contests/".$id)->with("status" , "Contest updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Model("contest");
        $conditions = array("post_id = ".$id);
        $model->delete($conditions);
        return redirect("contests/".$id)->with("status" , "Contest deleted successfully");
    }
}

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
            "opportunity.posted_by = user_account.id"
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
        return view('opportunity.types.contest');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $model = new Model("contest");
        $requestData = $request->all();
        $prizes = "'".$requestData["prizes"]."'";
        $spec = "'" . $requestData["cspecialization"] . "'";
        $values = array(
        "post_id" => $id,
        "prizes" => $prizes,
        "specialization" => $spec
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return view('opportunity.types.econtest');
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

        $model = new Model("contest");
        $requestData = $request->all();
        $specialization = "'".$requestData["cspecialization"]."'";
        $prizes = "'" . $requestData["prizes"] . "'";
        $values = array(
            "specialization" => $specialization,
            "prizes" => $prizes
        );

        $conditions = array("post_id = ".$id);
        $model->update($values , $conditions);
        //return redirect("contests/".$id)->with("status" , "Contest updated successfully");
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

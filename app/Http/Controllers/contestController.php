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
        $contestModel = new Model("Contest");
        $values = "*";

        $conditions = array(
            "contest.post_id = opportunity.post_id",
            "opportunity.posted_by = user_account.id"
        );

        $tables = array(
            "opportunity",
            "user_account"
        );

        $posts = $contestModel->select($values , $conditions , $tables);

        return view("contests.index" , compact('posts'));
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
        $model = new Model("contest");
        $values = array('title', 'name', 'description', 'requirements', 'expiration_date', 'opportunity.city oppCity', 'opportunity.country oppCountry', 'duration', 'funded', 'specialization', 'prizes');
        $conditions = array('contest.post_id = '.$id,
                            'contest.post_id = opportunity.post_id',
                            'opportunity.posted_by = User_account.id');
        $tojoin = array('opportunity', 'User_account');

        $dataObj = $model->select($values, $conditions, $tojoin);
        $data = $dataObj->fetch_assoc();
        return view("contests.show", compact('data'));
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
        $model = new Model("contest");
        $conditions = array("post_id = ".$id);
        $model->delete($conditions);
        return redirect("contests.index")->with("status" , "Contest deleted successfully");
    }
}

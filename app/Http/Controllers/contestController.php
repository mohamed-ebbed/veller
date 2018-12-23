<?php

namespace App\Http\Controllers;
use App\Model;
use App\CustomAuth;

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

        $conditions = array(
            "contest.post_id = opportunity.post_id",
            "opportunity.posted_by = user_account.id"
        );

        $tables = array(
            "opportunity",
            "user_account"
        );

        $posts = $contestModel->select("*" , $conditions , $tables);

        $AllCount = (array) $contestModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity;");
        $InternsCount = (array) $contestModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Internship';");
        $ScholarCount = (array) $contestModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Scholarship';");
        $ContestsCount = (array) $contestModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Contest';");
        $VolCount = (array) $contestModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Volunteering';");
        $ExchCount = (array) $contestModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Exchange';");
        
        $countArray = array('AllCount' => $AllCount,
                            'InternsCount' => $InternsCount,
                            'ScholarCount' => $ScholarCount,
                            'ContestsCount' => $ContestsCount,
                            'VolCount' => $VolCount,
                            'ExchCount' => $ExchCount);

        return view("contests.index" , compact('posts', 'countArray'));
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
        $model = new Model("contest");
        $auth = new CustomAuth();
        $logged_type = $auth->loggedInType();
        $logged_id = $auth->WhoIsHere();
        $name = "";
        $values = array('opportunity.post_id as post_id' , 'title', 'name', 'description', 'requirements', 'expiration_date', 'opportunity.city oppCity', 'opportunity.country oppCountry', 'duration', 'funded', 'specialization', 'prizes');
        $conditions = array('contest.post_id = '.$id,
                            'contest.post_id = opportunity.post_id',
                            'opportunity.posted_by = User_account.id');
        $tojoin = array('opportunity', 'User_account');

        $dataObj = $model->select($values, $conditions, $tojoin);
        $data = $dataObj->fetch_assoc();

        $applicants = (array) $model->ExcuteQuery("SELECT COUNT(*) FROM Apply_For WHERE Apply_For.post_id = ".$id.";");

        $tags = $model->select(array("tag"), array("Tags.post_id = contest.post_id", "contest.post_id = ".$id), array("Tags"));
        
        return view("contests.show", compact('data', 'applicants', 'tags' , 'logged_id' , 'logged_type' , 'name'));
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
            "specialization = ". $specialization,
            "prizes = ".$prizes
        );
        $conditions = array("post_id = ".$id);
        $model->update($values , $conditions);
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

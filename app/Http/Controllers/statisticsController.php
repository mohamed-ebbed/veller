<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
use App\CustomAuth;

class statisticsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auth = new CustomAuth();
        $logged_type = $auth->loggedInType();
        $logged_id = $auth->WhoIsHere();
        $name = "";

        if($logged_type == "applicant"){
            $model = new Model("user_account");
            $values = ["name"];
            $conditions = ["id = ".$logged_id];
            $name = $model->select($values , $conditions)->fetch_assoc()["name"];
        }
        else{
            $name = "";
        }

        $orgModel = new Model("organization");
        $orgNames = $orgModel->select(array("name"), array("organization.id = u.id"), array("User_account u"), array("name"));
        $orgNum = (array) $orgModel->ExcuteQuery("SELECT COUNT(*) FROM organization;");

        $applicantModel = new Model("Applicant");
        $appNum = (array) $applicantModel->ExcuteQuery("SELECT COUNT(*) FROM Applicant;");

        $oppModel = new Model("Opportunity");
        $oppNum = (array) $oppModel->ExcuteQuery("SELECT COUNT(*) FROM opportunity;");
        $oppos = $oppModel->select(array("COUNT(*) counter", "type"), NULL, NULL, array("type"));

        $applicationsModel = new Model("Apply_For");
        $applicationsNum = (array) $applicantModel->ExcuteQuery("SELECT COUNT(*) FROM Apply_For;");
        return view('statistics.index', compact('orgNum', 'orgNames', 'appNum', 'oppNum', 'oppos', 'logged_type', 'logged_id', 'name', 'applicationsNum'));
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
        //
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
    }
}

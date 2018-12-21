<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
use App\Http\Controllers\educationController;
use App\Http\Controllers\interestsController;
class applicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $id=1;
        $conditions = array("applicant.id = " . $id);
        $model = new Model("applicant");
        $values = array(
          // "id",
            "day",
            "month",
            "resume",
            "country"
        );
        $users = $model->select($values,$conditions);
        return view("applicant")->with('user',$users);
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
    public function store(Request $request,$id)
    {
        
        $model = new Model("applicant");
        $requestData = $request->all();
        $gender = "'".$requestData["gender"]."'";
        $day = "'".$requestData["day"]."'";
        $month = "'".$requestData["month"]."'";
        $year = "'".$requestData["year"]."'";
        $res = "'".$requestData["resume"]."'";
        
        $values = array(

            "id"    => $id,
            "gender" => $gender,
            "day" => $day,
            "month" => $month,
            "year" => $year,
            "resume" => $res
        );
        $model->insert($values);
        $ec=new educationController();
        //$ec->store($request,$id);
        $ic=new interestsController();
        $ic->store($request,$id);
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
        $model = new Model("applicant");
        $requestData = $request->all();
        $gender = "'".$requestData["gender"]."'";
        $day = "'".$requestData["day"]."'";
        $month = "'".$requestData["month"]."'";
        $year = "'".$requestData["year"]."'";
        $res = "'".$requestData["resume"]."'";
        
        $values = array(
            "id" => $id,
            "gender" => $gender,
            "day" => $day,
            "month" => $month,
            "resume" => $res
        );
        $conditions = array("id = ".$id);
        $model->update($values,$conditions);
        $ec=new educationController();
        //$ec->update($request,$id);
        $ic=new interestsController();
        $ic->update($request,$id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Model("applicant");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
    }
}

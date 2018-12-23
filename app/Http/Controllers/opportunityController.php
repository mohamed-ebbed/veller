<?php

namespace App\Http\Controllers;
use App\Model;

use Illuminate\Http\Request;
use App\Http\Controllers\contestController;
use App\Http\Controllers\exchangeController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\scholarshipController;
use App\Http\Controllers\volunteeringController;
class opportunityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $opportunityModel = new Model("Opportunity");
        
        $conditions = array("opportunity.posted_by = user_account.id");

        $tojoin = array("user_account");

        $posts = $opportunityModel->select("*" , $conditions , $tojoin);
        
        return view("opportunity.index" , compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        
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
            "title" => "required",
            "description" => "required",
            "country" => "required",
            "city" => "required",
        //    "expiration_date" => "required",
            "duration" => "required",
            "funded" => "required",
            "requirements" => "required",
            "tags" => "required"
        ]);
        $model = new Model("opportunity");
        $requestData = $request->all();
        $title = "'".$requestData["title"]."'";
        $description = "'" . $requestData["description"] . "'";
        $city = "'" . $requestData["city"] . "'";
        $country = "'" . $requestData["country"] . "'";
        $duration = "'" . $requestData["duration"] . "'";
       // $expiration_date = "'" . $requestData["expiration_date"] . "'";
        $funded = "'" . $requestData["funded"] . "'";
        $requirements = "'" . $requestData["requirements"] . "'";
        //$tags = "'" . $requestData["tags"] . "'";
        //$user_id = "'" . $requestData["user_id"] . "'";
        $columns=array('MAX(post_id) as last_id');
        $result = $model->select($columns);
        $id=$result->fetch_assoc()["last_id"];
        if($id == NULL)
            $id=1;
        else
            $id++;
        $expiration_date=date("Y-m-d");
        $d=date("Y-m-d");
        $user_id=3;
        $type = $requestData["temp"];
        $stype="";
        if($type=="1"){
            $con=new contestController();
            $stype="contest";
            $con->store($request,$id);
        }
        else if($type=="2"){
            $con=new exchangeController();
            $stype="exchange_program";
            $con->store($request,$id);
        }
        else if($type=="3"){
            $con=new InternshipController();
            $stype="internship";
            $con->store($request,$id);
        }
        else if($type=="4"){
            $con=new scholarshipController();
            $stype="scholarship";
            $con->store($request,$id);
        }
        else if($type=="5"){
            $con=new volunteeringController();
            $stype="volunteering";
            $con->store($request,$id);
        }
        $values = array(
            "post_id" => $id,
            "type"    => $stype,
            "post_date" => "'" . $d . "'",
            "expiration_date" => "'" . $expiration_date . "'",
            "description" => $description,
            "country" => $country,
            "city" => $city,
            "duration" => $duration,
            "funded" => $funded,
            "requirements" => $requirements,
            "posted_by" => $user_id
        );
        $model->insert($values);
        return redirect("welcome")->with("status" , "Opportunity added successfully");
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
        $model = new Model("opportunity");
        $conditions = array("post_id = " . $id);
        $op = $model->select("*" , $conditions);
        $op=$op->fetch_assoc();

        if($op["type"] == "scholarship"){
            $modelx = new Model("scholarship");
            $opt = $modelx->select("*" , $conditions);
            $opt=$opt->fetch_assoc();
            return view("opportunity.types.escholar")->with("op",$op)->with("type",$opt);
        }
        else if($op["type"] == "exchange_program"){
            $modelx = new Model("exchange_program");
            $opt = $modelx->select("*" , $conditions);
            $opt=$opt->fetch_assoc();
            return view("opportunity.types.eexchange")->with("op",$op)->with("type",$opt);
        }
        else if($op["type"] == "internship"){
            $modelx = new Model("internship");
            $opt = $modelx->select("*" , $conditions);
            $opt=$opt->fetch_assoc();
            return view("opportunity.types.eintern")->with("op",$op)->with("type",$opt);
        }
        else if($op["type"] == "contest"){
            $modelx = new Model("contest");
            $opt = $modelx->select("*" , $conditions);
            $opt=$opt->fetch_assoc();
            return view("opportunity.types.econtest")->with("op",$op)->with("type",$opt);
        }
        else{
            $modelx = new Model("volunteering");
            $opt = $modelx->select("*" , $conditions);
            $opt=$opt->fetch_assoc();
            return view("opportunity.types.evol")->with("op",$op)->with("type",$opt);
        }
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
            "title" => "required",
            "description" => "required",
            "country" => "required",
            "city" => "required",
            "expiration_date" => "required",
            "duration" => "required",
            "funded" => "required",
            "requirements" => "required",
            "tags" => "required"
        ]);
        $model = new Model("opportunity");
        $requestData = $request->all();
        $title = "'".$requestData["title"]."'";
        $description = "'" . $requestData["description"] . "'";
        $type = "'" . $requestData["type"] . "'";
        $city = "'" . $requestData["city"] . "'";
        $country = "'" . $requestData["country"] . "'";
        $duration = "'" . $requestData["duration"] . "'";
        $expiration_date = "'" . $requestData["expiration_date"] . "'";
        $funded = "'" . $requestData["funded"] . "'";
        $requirements = "'" . $requestData["requirements"] . "'";

        $conditions = array("post_id = ".$id);

        $values = array(
            "expiration_date" => $expiration_date,
            "description" => $description,
            "country" => $country,
            "city" => $city,
            "duration" => $duration,
            "funded" => $funded,
            "requirements" => $requirements,
        );
        $model->update($values,$conditions);
        
        if($type=="1"){
            $con=new contestController();
            $con->update($request,$id);
        }
        else if($type=="2"){
            $con=new exchangeController();
            $con->update($request,$id);
        }
        else if($type=="3"){
            $con=new InternshipController();
            $con->update($request,$id);
        }
        else if($type=="4"){
            $con=new scholarshipController();
            $con->update($request,$id);
        }
        else if($type=="5"){
            $con=new volunteeringController();
            $con->update($request,$id);
        }
        //return redirect("opportunity/".$id)->with("status" , "opportunity updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Model("opportunity");
        $conditions = array("post_id = ".$id);
        $model->delete($conditions);
    }
}

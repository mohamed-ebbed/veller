<?php

namespace App\Http\Controllers;
use App\Model;

use Illuminate\Http\Request;
use App\Http\Controllers\contestController;
use App\Http\Controllers\exchangeController;
use App\Http\Controllers\InternshipController;
use App\Http\Controllers\scholarshipController;
use App\Http\Controllers\volunteeringController;
use App\Http\Controllers\tagsController;
use App\CustomAuth;

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

        $posts = $opportunityModel->select("*" , $conditions , $tojoin, NULL, array("post_date DESC"));

        $AllCount = (array) $opportunityModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity;");
        $InternsCount = (array) $opportunityModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Internship';");
        $ScholarCount = (array) $opportunityModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Scholarship';");
        $ContestsCount = (array) $opportunityModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Contest';");
        $VolCount = (array) $opportunityModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Volunteering';");
        $ExchCount = (array) $opportunityModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Exchange';");
        
        $countArray = array('AllCount' => $AllCount,
                            'InternsCount' => $InternsCount,
                            'ScholarCount' => $ScholarCount,
                            'ContestsCount' => $ContestsCount,
                            'VolCount' => $VolCount,
                            'ExchCount' => $ExchCount);


        return view("opportunity.index", compact("posts", "countArray"));
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
        $auth = new CustomAuth();
        $logged_type = $auth->loggedInType();
        $logged_id = $auth->WhoIsHere();
        if($logged_type != "org"){
            return redirect("/");
        }
        $user_id = $logged_id;
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
        $type = $requestData["temp"];
        $stype="";
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
            "posted_by" => $user_id,
            "title" => $title
        );
        $tc = new tagsController();
        if($type=="1"){
            $con=new contestController();
            $values["type"] ="'contest'";
            $model->insert($values);
            $con->store($request,$id);
            $tc->store($request , $id);
        }
        else if($type=="2"){
            $con=new exchangeController();
            $values["type"]= "'exchange'";
            $model->insert($values);
            $con->store($request,$id);
            $tc->store($request , $id);

        }
        else if($type=="3"){
            $con=new InternshipController();
            $values["type"]="'internship'";
            $model->insert($values);
            $con->store($request,$id);
            $tc->store($request , $id);

        }
        else if($type=="4"){
            $con=new scholarshipController();
            $values["type"]="'scholarship'";
            $model->insert($values);
            $con->store($request,$id);
            $tc->store($request , $id);

        }
        else if($type=="5"){
            $con=new volunteeringController();
            $values["type"]="'volunteering'";
            $model->insert($values);
            $con->store($request,$id);
            $tc->store($request , $id);

        }

        return redirect("/")->with("status" , "Opportunity added successfully");
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

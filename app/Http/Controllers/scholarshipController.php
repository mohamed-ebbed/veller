<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
use App\CustomAuth;
class scholarshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Model = new Model("scholarship");
        
        $conditions = array(
            "scholarship.post_id = Opportunity.post_id",
            "opportunity.posted_by = user_account.id"
        );

        $tojoin = array(
            "Opportunity",
            "user_account"
        );

        $posts = $Model->select("*" , $conditions , $tojoin);

        $AllCount = (array) $Model->ExcuteQuery("SELECT COUNT(*) FROM Opportunity;");
        $InternsCount = (array) $Model->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Internship';");
        $ScholarCount = (array) $Model->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Scholarship';");
        $ContestsCount = (array) $Model->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Contest';");
        $VolCount = (array) $Model->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Volunteering';");
        $ExchCount = (array) $Model->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Exchange';");
        
        $countArray = array('AllCount' => $AllCount,
                            'InternsCount' => $InternsCount,
                            'ScholarCount' => $ScholarCount,
                            'ContestsCount' => $ContestsCount,
                            'VolCount' => $VolCount,
                            'ExchCount' => $ExchCount);

        return view("scholarship.index" , compact('posts', 'countArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('opportunity.types.scholar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    { 
        $model = new Model("scholarship");

        $requestData = $request->all();
        $spec = "'".$requestData["sspecialization"]."'";
        $paid = "'".$requestData["spaid"]."'";
        $type = "'".$requestData["stype"]."'";
        if($paid == "'yes'"){
            $paid = 1;
        }
        else{
            $paid = 0;
        }
        $values = array(
            "post_id" => $id,
            "specialization" => $spec,
            "paid" => $paid,
            "type" => $type
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
        $model = new Model("Scholarship");
        $auth = new CustomAuth();
        $logged_type = $auth->loggedInType();
        $logged_id = $auth->WhoIsHere();
        $name = "";
        $values = array('opportunity.post_id as post_id' , 'title', 'name', 'description', 'requirements', 'expiration_date', 'opportunity.city oppCity', 'opportunity.country oppCountry', 'duration', 'funded', 'specialization', 'scholarship.type ScholarType', 'paid');
        $conditions = array('Scholarship.post_id = '.$id,
                            'Scholarship.post_id = opportunity.post_id',
                            'opportunity.posted_by = User_account.id');
        $tojoin = array('opportunity', 'User_account');

        $dataObj = $model->select($values, $conditions, $tojoin);
        $data = $dataObj->fetch_assoc();
        $applicants = (array) $model->ExcuteQuery("SELECT COUNT(*) FROM Apply_For WHERE Apply_For.post_id = ".$id.";");
        
        $tags = $model->select(array("tag"), array("Tags.post_id = Scholarship.post_id", "Tags.post_id = ".$id), array("Tags"));
        
        return view("scholarship.show", compact('data', 'applicants', 'tags' , 'logged_type' , 'logged_id' , 'name'));
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
        
        $model = new Model("scholarship");
        $requestData = $request->all();
        $spec = "'".$requestData["sspecialization"]."'";
        $paid = "'".$requestData["spaid"]."'";
        $type = "'".$requestData["stype"]."'";
        if($paid == "'yes'"){
            $paid = 1;
        }
        else{
            $paid = 0;
        }
        $values = array(
            "specialization" => $spec,
            "paid" => $paid,
            "type" => $type
        );
        $conditions = array("post_id = ".$id);
        $model->update($values,$conditions);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Model("scholarship");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
        return redirect("scholarship.index")->with("status" , "Scholarship deleted successfully");
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;

class InternshipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internsModel = new Model("Internship");
        
        $conditions = array(
            'Internship.post_id = Opportunity.post_id',
            'opportunity.posted_by = user_account.id'
        );

        $tojoin = array(
            "Opportunity",
            "user_account"
        );

        $posts = $internsModel->select("*" , $conditions , $tojoin);

        $AllCount = (array) $internsModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity;");
        $InternsCount = (array) $internsModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Internship';");
        $ScholarCount = (array) $internsModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Scholarship';");
        $ContestsCount = (array) $internsModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Contest';");
        $VolCount = (array) $internsModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Volunteering';");
        $ExchCount = (array) $internsModel->ExcuteQuery("SELECT COUNT(*) FROM Opportunity WHERE type='Exchange';");
        
        $countArray = array('AllCount' => $AllCount,
                            'InternsCount' => $InternsCount,
                            'ScholarCount' => $ScholarCount,
                            'ContestsCount' => $ContestsCount,
                            'VolCount' => $VolCount,
                            'ExchCount' => $ExchCount);

        return view("internship.index" , compact('posts', 'countArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('opportunity.types.intern');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $model = new Model("internship");
        $requestData = $request->all();
        $paid = "'".$requestData["ipaid"]."'";
        $spec = "'" . $requestData["ispecialization"] . "'";
        if($paid == "'yes'"){
            $paid = 1;
        }
        else{
            $paid = 0;
        }
        $values = array(
        "post_id" => $id,
        "specialization" => $spec,
        "paid" => $paid
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
        $model = new Model("internship");
        $values = array('title', 'name', 'description', 'requirements', 'expiration_date', 'opportunity.city oppCity', 'opportunity.country oppCountry', 'duration', 'funded', 'specialization', 'paid');
        $conditions = array('Internship.post_id = '.$id,
                            'Internship.post_id = opportunity.post_id',
                            'opportunity.posted_by = User_account.id');
        $tojoin = array('opportunity', 'User_account');

        $dataObj = $model->select($values, $conditions, $tojoin);
        $data = $dataObj->fetch_assoc();
        $applicants = (array) $model->ExcuteQuery("SELECT COUNT(*) FROM Apply_For WHERE Apply_For.post_id = ".$id.";");
        return view("internship.show", compact('data', 'applicants'));
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
        
        $model = new Model("internship");
        $requestData = $request->all();
        $paid = "'".$requestData["ipaid"]."'";
        $spec = "'" . $requestData["ispecialization"] . "'";
        if($paid == "'yes'"){
            $paid = 1;
        }
        else{
            $paid = 0;
        }
        $values = array(
        "post_id" => $id,
        "specialization" => $spec,
        "paid" => $paid
        );
        $conditions = array("post_id = ".$id);

        $model->update($requestData , $conditions);
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
        $model = new Model("Internship");
        $conditions = array("applicant_id = ".$id);
        $model->delete($conditions);
        return redirect("internship.index")->with("status" , "internship deleted successfully");
    }
}

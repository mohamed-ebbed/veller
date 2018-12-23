<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
use App\CustomAuth;

class exchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Model = new Model("Exchange_Program");
        
        $conditions = array(
            "Exchange_Program.post_id = Opportunity.post_id",
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

        return view("exchange_program.index" , compact('posts', 'countArray'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('opportunity.types.exchange');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $model = new Model("exchange_program");
        $requestData = $request->all();
        $spec = "'".$requestData["especialization"]."'";
        $values = array(
            "post_id" => $id,
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
        $auth = new CustomAuth();
        $logged_type = $auth->loggedInType();
        $logged_id = $auth->WhoIsHere();
        $name = "";
        $model = new Model("Exchange_Program");
        $values = array('exchange_program.post_id as post_id' ,'title', 'name', 'description', 'requirements', 'expiration_date', 'opportunity.city oppCity', 'opportunity.country oppCountry', 'duration', 'funded', 'specialization' , 'posted_by');
        $conditions = array('Exchange_Program.post_id = '.$id,
                        'Opportunity.post_id = '.$id,
                        'opportunity.posted_by = User_account.id');
        
        $tojoin = array('Opportunity',
                        'User_account');

        $dataObj = $model->select($values, $conditions, $tojoin);
        $data = $dataObj->fetch_assoc();

        $applicants = (array) $model->ExcuteQuery("SELECT COUNT(*) FROM Apply_For WHERE Apply_For.post_id = ".$id.";");
        
        $tags = $model->select(array("tag"), array("Tags.post_id = Exchange_Program.post_id", "Tags.post_id = ".$id), array("Tags"));
        
        $applcableCountries = $model->select(array("country"), array("Applicable_Countries.post_id = Exchange_Program.post_id", 'exchange_program.post_id = '.$id), array("Applicable_Countries"));
        return view("exchange_program.show", compact('data', 'applicants', 'tags', 'applcableCountries' , 'logged_id' , 'logged_type' , 'name'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = new Model("Exchange_Program");
        $values = array('*');
        $conditions = array('Exchange_Program.post_id = '.$id);
        $data = $model->select($values, $conditions);
        return view("exchange_program.edit", compact('data'));
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
        
        $model = new Model("Exchange_Program");
        $requestData = $request->all();
        $spec = "'".$requestData["especialization"]."'";
        $values = array(
            "specialization = ".$spec
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
        //
        $model = new Model("Exchange_Program");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
        return redirect("exchange_program.index")->with("status" , "Exchange Program deleted successfully");
    }
}

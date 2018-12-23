<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model;
use mysqli_functions;
use App\CustomAuth;
class messageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $auth = new CustomAuth();
        $id = $auth->WhoIsHere();
        if($id == 0){
            return redirect("user_login")->with("status" , "please log in");
        }
        $model = new Model("message");
        $conditions = array("recieved_by = " . $id , "user_account.id = message.sent_by");
        $columns = array('email','content','sent_at');
        $tables = array('user_account');
        $recieveMessages = $model->select($columns , $conditions , $tables);

        $conditions = array("sent_by = " . $id , "user_account.id = message.recieved_by");
        $columns = array('email','content','sent_at');
        $tables = array('user_account');
        $sendMessages = $model->select($columns , $conditions , $tables);
        return view("tableOfMessage")->with('Rmessage',$recieveMessages)->with('Smessage',$sendMessages);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("message");
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
        $request->validate([
            "content" => "required",
            "recieved_by" => "required"
        ]);
        $auth = new CustomAuth();
        $sent_by = $auth->WhoIsHere();
        if($sent_by == 0){
            return redirect("user_login")->with("status" , "please log in");
        }
        $model = new Model("message");
        $requestData = $request->all();
        $sent_at = "'".date("Y-m-d h:i:s")."'";
        $content = "'".$requestData["content"]."'";

        $recieved_Email = "'".$requestData["recieved_by"]."'";
        $model1 = new Model("user_account");
        $conditions = ["email = ".$recieved_Email];
        $values = ["id"];
        $Id = $model1->select($values , $conditions)->fetch_assoc()["id"];

        $recieved_by = $Id;
        
        $values = array(
            "sent_at" => $sent_at,
            "sent_by" => $sent_by,
            "content" => $content,
            "recieved_by" => $recieved_by
        );

        $model->insert($values);
        return redirect("tableOfMessage")->with("status" , "sent successfully");
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

        $id=1;
        $model = new Model("message");
        $conditions = array("sent_by = " . $id);
        $columns = array('recieved_by','content','sent_at');
        $user = $model->select($columns , $conditions);
        return view("message")->with('message',$user);
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
        $request->validate([
            "sent_at" => "required",
            "sent_by" => "required",
            "content" => "required",
            "recieved_by" => "required"
        ]);
        $model = new Model("message");
        $requestData = $request->all();
        $sent_by = $requestData["sent_by"];
        $recieved_by = $requestData["recieved_by"];
        $sent_at = "'".$requestData["sent_at"]."'";
        $content = "'".$requestData["content"]."'";
        
        $values = array(
            "sent_at = ".$sent_at,
            "sent_by = ".$sent_by,
            "content = ".$content,
            "recieved_by = ".$recieved_by
        );
        $conditions = array("sent_by = ".$sent_by);
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
        $model = new Model("message");
        $conditions = array("sent_by = " . $sent_by);
        $model->delete($conditions);
    }
}

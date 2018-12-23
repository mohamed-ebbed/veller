<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
use App\CustomAuth;

class supportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()

    {
        $model = new Model("support_tickets");
        $toJoin = array("supervisor" , "user_account");
        $conditions = array(
            "supervisor.id = solved_by",
            "user_account.id = sent_by"
        );
        $values = array(
            "ticket_id" , 
            "sent_at" , 
            "content" , 
            "solved" ,
            "supervisor.id" ,
            "user_account.id"
        );
        $support_tickets = $model->select($values , $conditions , $toJoin);
        return view("support_tickets.index" , compact('support_tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("support_tickets.create");
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
            'content' => 'required'
        ]);
        $auth = new CustomAuth();
        $model = new Model("support_tickets");
        $requestData = $request->all();
        $content = "'".$requestData["content"]."'";
        $sent_at = "'".date("Y-m-d h:i:s")."'";
        $sent_by = $auth->WhoIsHere();
        if(!$sent_by){
            return redirect("/")->with("status" , "please log in");
        }
        $solved = 0;

        $columns=array('MAX(ticket_id) as last_id');
        $result = $model->select($columns);
        $ticket_id=$result->fetch_assoc()["last_id"];
        if($ticket_id == NULL){
            $ticket_id=1;
        }
        else{
            $ticket_id++;
        }



        $values = array(
            "ticket_id" => $ticket_id,
            "sent_at" => $sent_at,
            "sent_by" => $sent_by,
            "content" => $content,
            "solved" => $solved,
        );
        $model->insert($values);
        return redirect("/")->with('status' , 'ticket added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new Model("support_tickets");
        $conditions = array("ticket_id = " . $id);
        $support_ticket = $model->select("*" , $conditions);
        return view("support_tickets.show" , compact('support_ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model = new Model("support_tickets");
        $conditions = array("ticket_id = " . $id);
        $support_ticket = $model->select("*" , $conditions);
        return view("support_tickets.edit" , compact("support_tickets"));
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
            "content" => 'required'
        ]);

        $model = new Model("support_tickets");
        $requestData = $request->all();
        $conditions = array("ticket_id = " . $id);
        $model->update($requestData , $conditions);
        return redirect("support_tickets/".$id)->with('status' , 'ticket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Model("support_tickets");
        $conditions = array("ticket_id = " . $id);
        $model->delete($conditions);
        return redirect("/")->with('status' , 'ticket deleted successfully');
    }
}

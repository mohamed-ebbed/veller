<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model;
class volunteeringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('opportunity.types.vol');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $model = new Model("volunteering");
        $requestData = $request->all();
        $p_exp = "'".$requestData["pexp"]."'";
        $values = array(
            "post_id" => $id,
            "previous_experience" => $p_exp
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
        //return view('opportunity.types.vol');
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
        
        $model = new Model("volunteering");
        $requestData = $request->all();
        $p_exp = "'".$requestData["pexp"]."'";
        $values = array(
            "post_id" => $id,
            "previous_experience" => $p_exp
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
        $model = new Model("volunteering");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
    }
}

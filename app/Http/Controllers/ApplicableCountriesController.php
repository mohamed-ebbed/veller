<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model;

class ApplicableCountriesController extends Controller
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
        $request->validate([
            "country" => "required"
        ]);
        $model = new Model("Applicable_Countries");
        $data = $request->all();
        $countries=$data["country"];
        $values=explode(',', $countries);
        foreach($countries as $country)
        {
            $v=array(
                "post_id" => $id,
                "country" => $country
            );
            $model->insert($v);
        }
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
    public function update(Request $request, $id, $country)
    {
        $request->validate([
            "country" => "required"
        ]);
        $model = new Model("Applicable_Countries");
        $data = $request->all();
        $countries=$data["country"];
        $values=explode(',', $countries);
        $conditions = array("post_id = ".$id);
        $model->delete($conditions);
        foreach($countries as $country)
        {
            $v=array(
                "post_id" => $id,
                "country" => $country
            );
            $model->insert($v);
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
        $model = new Model("Applicable_Countries");
        $conditions = array("post_id = ".$id, "country = ".$country);
        $model->delete($conditions);
    }
}

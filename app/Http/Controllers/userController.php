<?php

namespace App\Http\Controllers;

use App\Model;
use Illuminate\Http\Request;
use App\Http\Controllers\applicantController;
use mysqli_functions;
class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=2;
      //  $conditions = array("user_account.id = " . $id);
        $model1 = new Model("user_account");
        $model2 = new Model("applicant");
        $model3 = new Model("interests");
        $model4 = new Model("education");

        $conditions = array("id = " . $id);
        $user = $model1->select("*" , $conditions);
        $applicant = $model2->select("*" , $conditions);
        $conditions = array("applicant_id = " . $id);
        $interests = $model3->select("*" , $conditions);
        $education = $model4->select("*" , $conditions);
        $user=$user->fetch_assoc();
        $applicant=$applicant->fetch_assoc();
        //$interests=$interests->fetch_assoc();
        //$education=$education->fetch_assoc();
        return view("users.show")->with("user",$user)->with("applicant",$applicant)->with("ints",$interests)->with("edu",$education);

   /*     $values = array(
            "id",
            "name",
            "email",
            "profile_picture",
            "country",
            "city",
            "zip", 
            "phone_number"
        );
        $users = $model->select($values,$conditions);
        return view("applicant")->with('user',$users); */

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("auth.RegisterAsUser");
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
            "name" => "required",
            "email" => "required",
            "country" => "required",
            "city" => "required",
            "zip" => "required",
            "password" => "required",
            "phone_number" => "required",
            "about" => "required",
            "resume" => "required",
            "profile_picture" => "image|nullable|max:1999",
            "gender" => "required",
            "year" => "required",
            "day" => "required",
            "month" => "required",
            "resume" => "required",
            "education" => "required",
            "interests" => "required"
        ]);
        
        
        $model = new Model("user_account");
        $requestData = $request->all();
        $name = "'".$requestData["name"]."'";
        $email = "'" . $requestData["email"] . "'";
        $country = "'" . $requestData["country"] . "'";
        $city = "'" . $requestData["city"] . "'";
        $zip = "'" . $requestData["zip"] . "'";
        $password = "'" . $requestData["password"] . "'";
        $phone_number = "'" . $requestData["phone_number"] . "'";
        $about = "'" . $requestData["about"] . "'";
        $values = ["email"];
        $conditions = ["email = ".$email];
        $old_user = $model->select($values , $conditions);
        if($old_user->num_rows != 0){
            return redirect()->back()->with("error" , "User already exists");
        }
        $columns=array('MAX(id) as last_id');
        $result = $model->select($columns);
        $id=$result->fetch_assoc()["last_id"];
        if($id == NULL){
            $id=1;
        }
        else{
            $id++;
        }
        if($request->hasFile('profile_picture')){
            //get file name with extention
            $fileNameWithExt = $request->file('profile_picture')->getClientOriginalName();
            // just file name
            $fileName = pathinfo($fileNameWithExt,PATHINFO_FILENAME);
            // just ext
            $fileExt = $request->file('profile_picture')->getClientOriginalExtension();
            //to store
            $fileNameToStore = $id .'.'.$fileExt;
            //upload
            $path = $request->file('profile_picture')->storeAs('public/applicants/profile_pictures',$fileNameToStore);
        }
        else
        {
            $fileNameToStore = 'default.jpg';
        }
        $values = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "profile_picture" => "'" . $fileNameToStore . "'",
            "country" => $country,
            "city" => $city,
            "zip" => $zip,
            "password" => $password,
            "phone_number" => $phone_number,
            "about" => $about
        );
        $model->insert($values);
        $appc=new applicantController();
        $appc->store($request,$id);
        return redirect("user_login")->with("success" , "User added successfully");   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $model = new Model("user_account");
        $conditions = array("id = " . $id);
        $user = $model->select("*" , $conditions);
        return view("users.show" , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $model1 = new Model("user_account");
        $model2 = new Model("applicant");
        $model3 = new Model("interests");
        $model4 = new Model("education");
        $conditions = array("id = " . $id);
        $user = $model1->select("*" , $conditions);
        $applicant = $model2->select("*" , $conditions);
        $conditions = array("applicant_id = " . $id);
        $interests = $model3->select("*" , $conditions);
        $education = $model4->select("*" , $conditions);
        $user=$user->fetch_assoc();
        $applicant=$applicant->fetch_assoc();
        $interests=$interests->fetch_assoc();
        $education=$education->fetch_assoc();
        return view("users.edit")->with("user",$user)->with("applicant",$applicant)->with("ints",$interests)->with("edu",$education);
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
            "name" => "required",
            "email" => "required",
            "country" => "required",
            "city" => "required",
            "zip" => "required",
            "password" => "required",
            "phone_number" => "required",
            "about" => "required",
            "resume" => "required",
            "profile_picture" => "required",
            "gender" => "required",
            "year"  =>"required",
            "day" => "required",
            "month" => "required",
            "resume" => "required",
            "education" => "required",
            "interests" => "required"
        ]);

        $model = new Model("user_account");
        $requestData = $request->all();
        $name = "'".$requestData["name"]."'";
        $email = "'" . $requestData["email"] . "'";
        $country = "'" . $requestData["country"] . "'";
        $city = "'" . $requestData["city"] . "'";
        $zip = "'" . $requestData["zip"] . "'";
        $password = "'" . $requestData["password"] . "'";
        $phone_number = "'" . $requestData["phone_number"] . "'";
        $about = "'" . $requestData["about"] . "'";


        $values = array(
            "id" => $id,
            "name" => $name,
            "email" => $email,
            "country" => $country,
            "city" => $city,
            "zip" => $zip,
            "password" => $password,
            "phone_number" => $phone_number,
            "about" => $about
        );

        $conditions = array("id = ".$id);
        $model->update($values , $conditions);
        $appc=new applicantController();
        $appc->update($request,$id);
        //return redirect("users/".$id)->with("status" , "User updated successfully");
    }

    /*
    *
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = new Model("user_account");
        $conditions = array("id = " . $id);
        $model->delete($conditions);
        return redirect("users")->with('status' , 'user deleted successfully');
    }
}

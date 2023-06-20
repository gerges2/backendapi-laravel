<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Nette\Utils\DateTime;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     
     public function register(StoreUserRequest $request)
     {
function is_18($dob)
{
    $dobObject = new DateTime(date("Y-m-d", strtotime($dob)));
    $nowObject = new DateTime();
    
    return $dobObject < $nowObject ? ($dobObject->diff($nowObject)->y > 18) : false;
}
if(is_18($request->barth_date)){
$user=new User();
$user->name=$request->name;
$user->email=$request->email;
$user->password=\Hash ::make( $request->password);
$user->barth_date=$request->barth_date;
$user->save();    
$token =  $user->createToken($request->name)->plainTextToken; 
return new UserResource([$user,$token]);
// return Response(['token' => $success,'user'=>$user],200);
    // $token = $request->user()->createToken($request->token_name) 
}
else{
    return "age is less 18";
}

        
     }

    public function index()
    {
        
        //
    }
    public function login(Request $request)
    {
// if(\Auth::attempt($request->only('email','password'))){
//     //  return \Auth::user();
//     $token =  \Auth::user()->createToken($request->email)->plainTextToken; 
// return new UserResource([\Auth::user(),$token]);
// }
// else{
//     return "not valied";
// }
return User::find(9)->tokens;
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => ['required', 'unique:users'],
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);                        
            }
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('AppName')->accessToken;
        return response()->json(['success'=>$success], 200);
    }

    public function user(){
        $user = Auth::user();
        $user['user'] = $user;
        return response()->json(['success' => $user], 200);
    }

    public function getusers(){
        return response()->json(User::where('is_admin', 0)->get(), 200);
    }

    public function login(Request $request){
        if(Auth::attempt(['username' => request('username'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] = $user->createToken($request->username)->plainTextToken;
            $success['id'] = $user->id;
            $success['level'] = $user->is_admin;
            $success['name'] = $user->name;
            return response()->json(['success' => $success], 200);
         } else{
            return response()->json(['error'=>'Unauthorized'], 401);
         }
    }
    
    public function deluser($id){
        $user = User::find($id);
        $user->delete();
        return response()->json(['status' => 'success','message' => 'successfully deleted'], 200);
    }

    public function logout(){
        if(Auth::user()){
            Auth::user()->tokens()->delete();
        } 
        return response()->json(['message'=>'logged out successfully'], 201);
    }
}

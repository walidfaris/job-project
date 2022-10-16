<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as AuthUser;

  use Whoops\Handler\PlainTextHandler;
class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request 
     * @return \Illuminate\Http\Response
     */
    public function index(){
        return User::all();
    }

    public function register(Request $request)
    {      
        
        $data=$request->all();
        $check=$this->create($data);
        return $request;
    //     $user = new User;  
    //     $data = [
    //         'name' => $request->name,
    //         'email' => $request->email,
    //         'password' => Hash::make($request->password),
    //         'remember_token' => Str::random(100),
    //     ];
    //    $user->save();
    //     return $data;
        // var_dump($request->all($data));

        // if ($user = new User($data))
        // {
        //    $token = $user -> createtoken ('auth_token');
        //     return response() -> json ([
        //         'access_token' => $token,
        //          'token-type' => 'bearer',
        //     ]);
        // }
    }   
    
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        $var = $request->only('email','password');
        if (Auth::attempt($var))
    {
            return response()->json([
                'message' => 'merhba ahmed'
            ], 200);
    }
         return response()->json([
            'message' => 'Invalid login details'
        ], 401);
    }
    
    //$user = User::where('email',$request ['email'])->firstofFail();
   // $token = $user->CreateToken('auth_token')->PlainTextToken;
    //return response()->json([
     //   'access_token'=> $token,
      //  'token_type'=> 'bearer',
    //]);

  public function me(request $request)
  {
    return $request->user();
  }
  public function create(array $data){
    return User::create([
        'name'=>$data['name'],
        'email'=>$data['email'],
        'password'=>Hash::make($data['password'])
    ]);
  }
}

    

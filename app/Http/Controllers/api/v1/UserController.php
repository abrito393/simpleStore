<?php

namespace App\Http\Controllers\api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
class UserController extends Controller
{
    public function viewAuthentication(Request $request)
    {
        return view('auth.authentication');
    }

    public function viewRegister(Request $request)
    {
        return view('auth.authentication');
    }

    public function viewUserInfo(Request $request)
    {
        return view('user.info');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string'
        ]);

        if($validator->fails()){
            return response()->json([
                'message' => $validator->messages()->first()
            ], 400);
        }

        $credentials = request(['email', 'password']);
        $user_check = User::where('email', $request->email)->first();

        if(!$user_check){
            return response()->json([
                'message' => 'User not found'
            ],400);
        }
        
        if(!Auth::attempt($credentials))
            return response()->json([
                'message' => 'Incorrect user or password. Please try again'
            ], 400);

        $token_result = $user_check->createToken('Personal Access Token');
        $token = $token_result->token;
        $token->expires_at = Carbon::now()->addWeeks(2);
        $token->save();

        return response()->json([
            'access_token' => $token_result->accessToken,
            'user_type_id' => $user_check->userType->type,
            'user' => $user_check->toArray()
        ],200);
    }

    public function create(Request $request)
    {
        if( isset($request->email) && is_object( User::where('email',strtolower($request->email))->first() ) ) {
            $error['email'] = 'El Correo ya existe';
            return [
                "status" => "fail", 
                "error" => $error
            ];
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) 
            return response()->json([
                "status" => "fail", 
                "error" => $validator->errors()
            ],400);


        $user = new User();
        
        $token_result = $user->createToken('Personal Access Token');
        $token = $token_result->token;
        $token->expires_at = Carbon::now()->addWeeks(2);
        $token->save();

        $searchAmdinProfile = Profile::where('cod','cl')->first();
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->user_type_id = $searchAmdinProfile->id;
        $user->save();

        return response()->json([
            'access_token' => $token_result->accessToken,
            'user_type_id' => $user->userType->type,
            'user' => $user->toArray()
        ],200);
    }

    public function show(Request $request)
    {
        try {
            return response()->json([
                'access_token' => $request->access_token,
                'user_type_id' => $request->user()->userType->type,
                'user' => $request->user()->toArray()
            ],200);
        } catch (Exception $e) {
            
        }
    }

    public function address(Request $request)
    {
        try {
            return response()->json([
                'access_token' => $request->access_token,
                'user_type_id' => $request->user()->addresses->type,
                'user' => $request->user()->toArray()
            ],200);
        } catch (Exception $e) {
            
        }
    }

    
}

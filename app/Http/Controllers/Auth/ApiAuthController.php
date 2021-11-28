<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), 
        [
            'name' => 'required|string|max:255', 
            'email' => 'required|string|email|max:255|unique:users', 
            'password' => 'required|string|min:3',
            ]
        );
        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $user = new User([
            'name' => $request->name, 
            'email' => $request->email, 
            'password' => Hash::make($request->password), 
            'tenant_id' => $request->tenant_id]);

        $user = $user->save();
        
        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }
        $token->save();
        return response()->json([
            'success' => true, 
            'id' => $user->id, 
            'name' => $user->name, 
            'email' => $user->email, 
            'access_token' => $tokenResult->accessToken, 
            'token_type' => 'Bearer', 
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ], 201);
    }

    public function login(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response(['errors' => $validator->errors()->all()], 422);
        }
        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {

                $credentials = request(['email', 'password']);
                Auth::attempt($credentials);
                $user = $request->user();
                $tokenResult = $user->createToken('SuninApiToken');

                $token = $tokenResult->token;
                if ($request->remember_me) {
                    $token->expires_at = Carbon::now()->addWeeks(1);
                }
                $token->save();
                $key = Str::random(12);
                $data = [
                    'success'=>true,
                    'id'=>$user->id,
                    'name'=>$user->name,
                    'email'=>$user->email,
                    'tenant_id'=>$user->tenant_id,
                    'access_token'=>$tokenResult->accessToken,
                    'token'=>$token,
                    'token_type'=>'Bearer',
                    'expires_at'=>Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
                ];

                Cache::put($key,$data,3600);

                return response()->json([
                    'type' => $user->tenant()->first()->type,
                    'axios' => $key,
                ], 201);

            } else {
                $response = ["message" => "Password mismatch"];
                return response($response, 422);
            }
        } else {
            $response = ["message" => 'User does not exist'];
            return response($response, 422);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $token = $request->user()->token();
        $token->revoke();
        $response = ['message' => 'You have been successfully logged out!'];
        return response($response, 200);
    }

    public function key($key)
    {
        if(Cache::has($key))
        {
            $data = Cache::get($key);

            return response()->json($data,200);
        }else {
            return response()->json(['message' => 'unauthorized'],400);
        }
        
    }

    public function user(Request $request){
         $user = [];
        if(Auth::check()){
            $user = $request->user();
        }
        return response()->json([
            'user'=>$user,
            'isLoggedIn'=>Auth::check()
        ]);
    }
}

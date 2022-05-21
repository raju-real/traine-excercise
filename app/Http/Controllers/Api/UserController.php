<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public $successStatus = 200;

    public function __construct() {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
    }

     // Login With Email Or Mobile
    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email_or_mobile' => 'required',
            'password' => 'required|string|min:6',
        ]);

        if(is_numeric($request->get('email_or_mobile'))){
            $credintials = [
                'mobile'=>$request->get('email_or_mobile'),
                'password'=>$request->get('password')
            ];
          } elseif (filter_var($request->get('email_or_mobile'), FILTER_VALIDATE_EMAIL)) {
            $credintials = [
                'email' => $request->get('email_or_mobile'), 
                'password'=>$request->get('password')
            ];
        }


        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        if (!$token = JWTAuth::attempt($credintials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        } 

        return $this->createNewToken($token);
    }

   public function register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|unique:users',
            'email' => 'required|unique:users',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $user = new User();
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->gender = $request->gender;
        $user->age = $request->age;
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'message' => 'Registraion Successfull',
            'user' => $user
        ], 201);
    }

    protected function createNewToken($token){
        $user = auth()->user();
        $user->online_status = 1;
        $user->save();        
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'user' => auth()->user()
        ]);
    }

    public function refresh()
    {
        //return $this->createNewToken(auth()->refresh());
        return $this->createNewToken(auth()->guard('api')->refresh());
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['user' => $user], $this-> successStatus);
    }

    public function updateProfile(Request $request){
        $user = auth()->user();
        $user->name = $request->name ? $request->name : $user->name;
        $user->email = $request->email ? $request->email : $user->email;
        $user->mobile = $request->mobile ? $request->mobile : $user->mobile;
        $user->gender = $request->gender ? $request->gender : $user->gender;
        $user->age = $request->age ? $request->age : $user->age;
        if(isset($request->password)){
            $user->password = Hash::make($request->password);
        }
        if($request->file('image') != null) {
            $this->validate($request,['image'=>'mimes:jpg,png,jpeg']);
            if(file_exists($user->image) AND !empty($user->image)){
                unlink($user->image);
            }
            $image = $request->file('image');
            $imageName = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(300, 300);
            $image_resize->save('assets/images/' .$imageName);
            $user->image = 'assets/images/'.$imageName;
        } 
        $user->save();
        return response()->json([
            'message' => 'Profile Update Successfully',
            'user' => $user
        ]);
    }

    public function resetPassword(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);
        if($validator->fails()){
            return response()->json($validator->errors()->toJson(), 400);
        }
        $old_password = $request->old_password;
        $new_password = $request->new_password;
        $current_password = Auth::user()->password;
        if(Hash::check($old_password, $current_password)){
            Auth::user()->update(['password'=>Hash::make($new_password)]);
            return response()->json([
                'status' => 'success',
                'message' => 'Password Changed Sucessfully'
            ]);
           
        } else {
            return response()->json([
                'status' => 'failed',
                'message' => 'Current Password Not Match'
            ]);
        }
    }


    public function logout()
    {
        Auth::guard('api')->logout();

        return response()->json([
            'status' => 'success',
            'message' => 'logout'
        ], 200);
    }
}

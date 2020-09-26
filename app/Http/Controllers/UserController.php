<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('role:user');
    }
    public function index()
    {
        return view('public.index');
    }

    public function all_users(){
        $users = User::orderBy('id','desc')->get();
        return response()->json([
           "users" => $users,
           "countUser" => $users->count(),
        ],200);
    }
    public function delete_user($id){
        $user = User::findOrFail($id);
        $user->delete();
    }
    public function add_user(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6'
        ]);

        //$img->save($upload_path.$name);
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'Grade' => $request['Grade'],
            'password' => Hash::make($request['password']),
            //'photo' => $name,
        ]);
    }


    public function edit_user($id){


        $user = User::findOrFail($id);
        return response()->json([
          'user' => $user
        ],200);

      }

      public function update_user(Request $request, $id){
        $this->validate($request,[
            'name' => 'required|string',
            'telephone' => 'required|string',
            'email' => 'required|string|email|max:191|unique:users',
            'password' => 'required|string|min:6'
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->Grade = $request->Grade;
        $user->telephone = $request->telephone;
        $user->password = Hash::make($request['password']);
        $user->save();
    }
    public function cherche_user(){
        $cherche = \Request::get('c');
        if($cherche!=null){
            $users = User::where('name','LIKE',"%$cherche%")
                ->orWhere('email','LIKE',"%$cherche%")
                ->get();
            return response()->json([
                'users'=>$users
            ],200);
        }else{
           return $this->all_users();
        }
    }
}

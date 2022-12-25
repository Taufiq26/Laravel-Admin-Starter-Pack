<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Users;
use App\Models\Profiles;
use App\Models\Menus;
use App\Models\Roles;

class UsersController extends Controller
{
    // Web function
    public function __Construct() {
        $this->menu= "Users";
    }

    public function index(Request $request) {
        $access = getMenuAccess($this->menu);
        $users  = Menus::with('access')->where('deleted_at', null)->orderBy('created_at', 'ASC')->get();
        $roles  = Roles::where('deleted_at', null)->get();

        return view('users_management.users.index', [
            'access' => $access,
            'users' => $users,
            'roles' => $roles,
        ]);
    }

    // Api Function
    public function retrive()
    {
        $data = Profiles::with('users', 'users.roles')->where('deleted_at', null)->orderBy('created_at', 'ASC')->get();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully retrive users',
            'data' => $data
        ));
    }

    public function retriveById($id)
    {
        $data = Profiles::with('users', 'users.roles')->where('id', $id)->first();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully retrive users by id',
            'data' => $data
        ));
    }

    public function create(Request $request)
    {
        $checkUser = Users::where('username', $request->post('username'))->first();
        $data = [];
        if($checkUser == null) {
            $users = new Users;
            $users->id = Str::uuid();
            $users->role_id = $request->post('role_id');
            $users->username = $request->post('username');
            $users->password = Hash::make($request->post('password'));
            $users->save();

            $checkProfile = Profiles::where('email', $request->post('email'))->first();

            if($checkProfile == null) {
                $data = new Profiles;
                $data->id = Str::uuid();
                $data->full_name = $request->post('full_name');
                $data->email = $request->post('email');
                $data->address = $request->post('address');
                $data->phone = $request->post('phone');
                $data->is_verified = true;
                $data->user_id = $users->id;
                $data->save();
            }else{
                Users::where('id', $users->id)->delete();
            }
        }else{
            return response()->json(array(
                'status'=> 500, 
                'message' => 'Created users Failed',
                'data' => $data
            ));
        }

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully created users',
            'data' => $data
        ));
    }

    public function update(Request $request, $id)
    {
        $data = Profiles::findOrFail($id);
        $data->full_name = $request->post('full_name');
        $data->email = $request->post('email');
        $data->address = $request->post('address');
        $data->phone = $request->post('phone');
        $data->is_verified = true;
        $data->save();

        $users = Users::findOrFail($data->user_id);
        $users->role_id = $request->post('role_id');
        $users->username = $request->post('username');
        if($request->post('password') != null){
            $users->password = Hash::make($request->post('password'));
        }
        $users->save();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully updated users',
            'data' => $data
        ));
    }

    public function delete(Request $request, $id)
    {
        $data = Profiles::findOrFail($id);
        $data->deleted_at = date('Y-m-d H:i:s');
        $data->save();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully deleted users',
            'data' => $data
        ));
    }
}

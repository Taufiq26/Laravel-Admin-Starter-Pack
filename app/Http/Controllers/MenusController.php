<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Menus;
use App\Models\MenusAccess;
use App\Models\Roles;

class MenusController extends Controller
{
    // Web function
    public function __Construct() {
        $this->menu= "Menus";
    }

    public function index(Request $request) {
        $access = getMenuAccess($this->menu);
        $menus  = Menus::with('access')->orderBy('created_at', 'ASC')->get();

        return view('users_management.menus.index', [
            'access' => $access,
            'menus' => $menus,
        ]);
    }

    // Api Function
    public function retrive()
    {
        $data = Menus::with('access')->orderBy('created_at', 'ASC')->get();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully retrive menus',
            'data' => $data
        ));
    }

    public function retriveById($id)
    {
        $data = Menus::with('access')->where('id', $id)->first();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully retrive menu by id',
            'data' => $data
        ));
    }

    public function create(Request $request)
    {
        $data = new Menus();
        $data->id = Str::uuid();
        $data->parent_id = $request->post('parent_id');
        $data->name = $request->post('name');
        $data->prefix = $request->post('prefix');
        $data->url = $request->post('url');
        $data->icon = $request->post('icon');
        $data->status = $request->post('status');
        $data->order_num = $request->post('order_num');
        $data->save();

        $admin_role = Roles::where('name','Admin')->first();
        if ($admin_role) {
            $access = new MenusAccess();
            $access->id = Str::uuid();
            $access->role_id = $admin_role->id;
            $access->menu_id = $data->id;
            $access->view = 1;
            $access->create = 1;
            $access->update = 1;
            $access->delete = 1;
            $access->save();
        }

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully created menu',
            'data' => $data
        ));
    }

    public function update(Request $request, $id)
    {
        $data = Menus::findOrFail($id);
        $data->parent_id = $request->post('parent_id');
        $data->name = $request->post('name');
        $data->prefix = $request->post('prefix');
        $data->url = $request->post('url');
        $data->icon = $request->post('icon');
        $data->status = $request->post('status');
        $data->order_num = $request->post('order_num');
        $data->save();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully updated menu',
            'data' => $data
        ));
    }

    public function delete(Request $request, $id)
    {
        $data = Menus::findOrFail($id);
        $data->deleted_at = date('Y-m-d H:i:s');
        $data->save();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully deleted menu',
            'data' => $data
        ));
    }
}

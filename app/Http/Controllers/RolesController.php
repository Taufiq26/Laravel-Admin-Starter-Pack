<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Roles;
use App\Models\Menus;
use App\Models\MenusAccess;

class RolesController extends Controller
{
    // Web function
    public function __Construct()
    {
        $this->menu = "Roles";
    }

    public function index(Request $request)
    {
        $access = getMenuAccess($this->menu);
        return view('users_management.roles.index', ['access' => $access]);
    }

    public function access(Request $request, $id)
    {
        return view('users_management.roles.access', ['role_id' => $id]);
    }

    public function accessPost(Request $request, $id)
    {
        $menus = Menus::orderBy('created_at', 'ASC')->get();

        foreach ($menus as $menu) {
            $view = 'view_'.$menu->id;
            $create = 'create_'.$menu->id;
            $update = 'update_'.$menu->id;
            $delete = 'delete_'.$menu->id;

            $akses = MenusAccess::where('role_id', $id)->where('menu_id', $menu->id)->first();
            if($akses != null) {
                $data = MenusAccess::where('role_id', $id)->where('menu_id', $menu->id)->first();
                $data->role_id = $id;
                $data->menu_id = $menu->id;
                $data->view = $request->$view ? 1 : 0;
                $data->create = $request->$create ? 1 : 0;
                $data->update = $request->$update ? 1 : 0;
                $data->delete = $request->$delete ? 1 : 0;
                $data->save();
            }else{
                $data = new MenusAccess;
                $data->id = Str::uuid();
                $data->role_id = $id;
                $data->menu_id = $menu->id;
                $data->view = $request->$view ? 1 : 0;
                $data->create = $request->$create ? 1 : 0;
                $data->update = $request->$update ? 1 : 0;
                $data->delete = $request->$delete ? 1 : 0;
                $data->save();
            }
        }

        $message = "Successfully create or update access Menu";
        return redirect()->back()->with('success', $message);
    }

    // Api Function
    public function retrive()
    {
        $data = Roles::get();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully retrive roles',
            'data' => $data
        ));
    }

    public function retriveById($id)
    {
        $data = Roles::where('id', $id)->first();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully retrive role by id',
            'data' => $data
        ));
    }

    public function create(Request $request)
    {
        $data = new Roles();
        $data->id = Str::uuid();
        $data->name = $request->post('name');
        $data->description = $request->post('description');
        $data->save();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully created role',
            'data' => $data
        ));
    }

    public function update(Request $request, $id)
    {
        $data = Roles::findOrFail($id);
        $data->name = $request->post('name');
        $data->description = $request->post('description');
        $data->save();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully updated role',
            'data' => $data
        ));
    }

    public function delete(Request $request, $id)
    {
        $data = Roles::findOrFail($id);
        $data->deleted_at = date('Y-m-d H:i:s');
        $data->save();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully deleted role',
            'data' => $data
        ));
    }

    public function rolesAccess(Request $request, $role_id)
    {
        $data = Menus::with('access')->whereHas('access', function($q) use ($role_id){
                    $q->where('role_id', $role_id);
                })->orderBy('created_at', 'ASC')->get();
        
        $menu_id = [];
        foreach($data as $key => $item){
            $menu_id[$key] = $item->id;
        }

        $older = Menus::with('access')->whereNotIn('id', $menu_id)->get();
        $data = $data->merge($older);

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully retrive role access',
            'data' => $data
        ));
    }
}

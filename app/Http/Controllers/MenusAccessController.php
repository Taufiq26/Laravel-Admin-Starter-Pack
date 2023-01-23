<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Menus;
use App\Models\MenusAccess;
use App\Models\Roles;

class MenusAccessController extends Controller
{
    // Web function
    public function __Construct() {
        $this->menu = "Menus Access";
    }

    public function index(Request $request) {
        $access = getMenuAccess($this->menu);
        $menus  = Menus::with('parent')->orderBy('parent_id','DESC')->get();
        $roles  = Roles::get();

        return view('users_management.menu-access.index', [
            'access' => $access,
            'menus' => $menus,
            'roles' => $roles,
        ]);
    }

    // Api Function
    public function retrive()
    {
        $data = MenusAccess::with('menu.parent')->get();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully retrive menus',
            'data' => $data
        ));
    }
    
    public function retriveByRole($role_id)
    {
        $data = MenusAccess::with('menu.parent')->where('role_id',$role_id)->get();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully retrive menus',
            'data' => $data
        ));
    }

    public function retriveById($id)
    {
        $data = MenusAccess::with('menu.parent')->where('id', $id)->first();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully retrive menu by id',
            'data' => $data
        ));
    }

    public function create(Request $request)
    {
        $data = new MenusAccess();
        $data->id = Str::uuid();
        $data->role_id = $request->post('role_id');
        $data->menu_id = $request->post('menu_id');
        $data->view = $request->post('view');
        $data->create = $request->post('create');
        $data->update = $request->post('update');
        $data->delete = $request->post('delete');
        $data->save();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully created menu access',
            'data' => $data
        ));
    }

    public function update(Request $request, $id)
    {
        $data = MenusAccess::findOrFail($id);
        $data->role_id = $request->post('role_id');
        $data->menu_id = $request->post('menu_id');
        $data->view = $request->post('view');
        $data->create = $request->post('create');
        $data->update = $request->post('update');
        $data->delete = $request->post('delete');
        $data->save();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully updated menu access',
            'data' => $data
        ));
    }

    public function delete(Request $request, $id)
    {
        $data = MenusAccess::findOrFail($id);
        $data->delete();

        return response()->json(array(
            'status'=> 200, 
            'message' => 'Successfully deleted menu access',
            'data' => $data
        ));
    }
}

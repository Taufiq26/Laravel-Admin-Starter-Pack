<?php
use Illuminate\Support\Facades\Session;
use App\Models\Menus;


if(! function_exists('getMenuParent')){
	function getMenuParent()
	{ 
        $data = Menus::with('access')
				->whereHas('access', function($q){
					$q->where('role_id', Session::get('role_id'));
				})
				->where('parent_id', null)
				->orderBy('order_num', 'ASC')
				->get();

		return	$data;
	}
}

if(! function_exists('getMenuPrefix')){
	function getMenuPrefix()
	{ 
        $data = Menus::with('access')
				->whereHas('access', function($q){
					$q->where('role_id', Session::get('role_id'));
				})
				->where('prefix', '!=', "-")
				->where('status', 1)
				->orderBy('order_num', 'ASC')
				->get();

		return	$data;
	}
}

if(! function_exists('getMenuItem')){
	function getMenuItem()
	{ 
        $data = Menus::with('access')
				->whereHas('access', function($q){
					$q->where('role_id', Session::get('role_id'));
				})
				->where('prefix', "-")
				->where('url', '!=', '#')
				->where('status', 1)
				->orderBy('order_num', 'ASC')
				->get();
				
		return	$data;
	}
}

if(! function_exists('getMenuAccess')){
	function getMenuAccess($menu)
	{ 
        $data = Menus::with('access')->where('name', $menu)->where('status', 1)->orderBy('order_num', 'ASC')->first();

		$access = [
			'view'   => $data->access ? $data->access->view : 0,
			'create' => $data->access ? $data->access->create : 0,
			'update' => $data->access ? $data->access->update : 0,
			'delete' => $data->access ? $data->access->delete : 0,
		];

		return	$access;
	}
}
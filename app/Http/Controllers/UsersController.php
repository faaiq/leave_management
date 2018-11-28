<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\User;
use Image;

class UsersController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke(Request $request) {
		$where = array();
    	$input = array();

    	if ($request->isMethod('post')) {
    		

    		$input = $request->all();

		}    		
    
		$User = new User();
		$rows = $User->orderBy('id', 'desc')
                    ->where($where)
                    ->paginate(15);


    	return view('users.index',['rows' => $rows,'input' => $input]);
    }


    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $validatedData = $this->validate($request,[
                'name' => 'required',
                'email' => 'required',
                'user_type' => 'required',
                
            ]);
            
            $fields = array();
            if ($request->has('id')) {
                if($request->id > 0) {
                    $User = User::find($request->id);    
                    $User->id = $request->id;
                }else {
                    $User = new User;        
                }
            }else {
                $User = new User;        
            }
            if ($request->has('name')) {
            	$User->name = $request->name;
            }
            if ($request->has('email')) {
            	$User->email = $request->email;
            }
            if ($request->has('password')) {
            	$User->password = $request->password;
            }
            if ($request->has('user_type')) {
            	$User->user_type = $request->user_type;
            }
            if ($request->has('designation')) {
            	$User->designation = $request->designation;
            }
            if ($request->has('department')) {
            	$User->department = $request->department;
            }
            if ($request->has('mobile')) {
            	$User->mobile = $request->mobile;
            }
            if ($request->has('address')) {
            	$User->address = $request->address;
            }
            if ($request->has('city')) {
            	$User->city = $request->city;
            }
            if ($request->has('state')) {
            	$User->state = $request->state;
            }
			   $User->save();
            return redirect('/users');
        }else {
            $action = action('UsersController@add');
            $method = "POST";
            $submit_text = "Create";
            $title_text = "Add Users";
            $User = new User();
            return view('users.add', compact('action', 'method', 'submit_text','title_text','User'));
            
        }
    }

    public function edit(Request $request, $id =  null) {

        $User = new User();

        $rows = $User->find($id);

        $action = action('UsersController@edit') . "/" .$id;
        $method = "POST";
        $submit_text = "Edit";
        $title_text = "Edit Users";
            $User = new User();

        return view('users.edit', compact('action', 'method', 'submit_text', 'rows','title_text','User'));

    }
	public function delete(Request $request, $id =  null) {
        if($id > 0) {
            DB::table('users')->where('id', '=', $id)->delete();
            $request->session()->flash('status', 'Users deleted successful!');
        }
        return redirect('/users');
    }



    public function myprofile(Request $request) {
        return view('users.myprofile');
    }

}

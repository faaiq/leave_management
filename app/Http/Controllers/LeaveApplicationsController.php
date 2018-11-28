<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\LeaveApplication;
use App\User;
use Image;

class LeaveApplicationsController extends Controller {

	public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function myleaves(Request $request) {
        $where = array();
    	$input = array();

    	if ($request->isMethod('post')) {
    		$input = $request->all();
        }    		
        $user = Auth::user();

        $where[] = array('user_id',"=",$user->id);

        
		$LeaveApplication = new LeaveApplication();
		$rows = $LeaveApplication->orderBy('id', 'desc')
                    ->where($where)
                    ->paginate(15);


    	return view('leaveapplications.myleaves',['rows' => $rows,'input' => $input]);
    }

    public function __invoke(Request $request) {
		$where = array();
    	$input = array();

    	if ($request->isMethod('post')) {
    		

    		$input = $request->all();

		}    		
    
		$LeaveApplication = new LeaveApplication();
		$rows = $LeaveApplication->orderBy('id', 'desc')
                    ->where($where)
                    ->paginate(15);


    	return view('leaveapplications.index',['rows' => $rows,'input' => $input]);
    }


    public function add(Request $request) {
        if ($request->isMethod('post')) {
            $validatedData = $this->validate($request,[
                'start_date'      => 'required|date|after:tomorrow|date_format:d/m/Y',
                'end_date'        => 'required|date|after:tomorrow|date_format:d/m/Y',
                'reason' => 'required',
                'backup_employee_id' => 'required',
                'approved' => 'required',
            ]);
            
            $fields = array();
            if ($request->has('id')) {
                if($request->id > 0) {
                    $LeaveApplication = LeaveApplication::find($request->id);    
                    $LeaveApplication->id = $request->id;
                }else {
                    $LeaveApplication = new LeaveApplication;        
                }
            }else {
                $LeaveApplication = new LeaveApplication;        
            }
            if ($request->has('user_id')) {
            	$LeaveApplication->user_id = $request->user_id;
            }
            if ($request->has('start_date')) {
            	$LeaveApplication->start_date = DateJsToMysql($request->start_date);
            }
            if ($request->has('end_date')) {
            	$LeaveApplication->end_date = DateJsToMysql($request->end_date);
            }
            if ($request->has('reason')) {
            	$LeaveApplication->reason = $request->reason;
            }
            if ($request->has('backup_employee_id')) {
            	$LeaveApplication->backup_employee_id = $request->backup_employee_id;
            }
            if ($request->has('approved')) {
            	$LeaveApplication->approved = $request->approved;
            }
			   $LeaveApplication->save();
            return redirect('/leaveapplications');
        }else {
            $action = action('LeaveApplicationsController@add');
            $method = "POST";
            $submit_text = "Create";
            $title_text = "Add Leave Applications";
            $LeaveApplication = new LeaveApplication();
            return view('leaveapplications.add', compact('action', 'method', 'submit_text','title_text','LeaveApplication'));
            
        }
    }

    public function edit(Request $request, $id =  null) {

        $LeaveApplication = new LeaveApplication();

        $rows = $LeaveApplication->find($id);

        $action = action('LeaveApplicationsController@edit') . "/" .$id;
        $method = "POST";
        $submit_text = "Edit";
        $title_text = "Edit Leave Applications";
        $LeaveApplication = new LeaveApplication();

        return view('leaveapplications.add', compact('action', 'method', 'submit_text', 'rows','title_text','LeaveApplication'));

    }

    public function delete(Request $request, $id =  null) {
        if($id > 0) {
            DB::table('leave_applications')->where('id', '=', $id)->delete();
            $request->session()->flash('status', 'Leave Applications deleted successful!');
        }
        return redirect('/leaveapplications');
    }

    public function applyforleave(Request $request) {
        if ($request->isMethod('post')) {
            $validatedData = $this->validate($request,[
                'start_date'      => 'required|date|after:today|date_format:"d/m/Y"',
                'end_date'        => 'required|date|after:today|date_format:"d/m/Y"',
                'reason' => 'required',
            ]);
            
            $fields = array();
            if ($request->has('id')) {
                if($request->id > 0) {
                    $LeaveApplication = LeaveApplication::find($request->id);    
                    $LeaveApplication->id = $request->id;
                }else {
                    $LeaveApplication = new LeaveApplication;        
                }
            }else {
                $LeaveApplication = new LeaveApplication;        
            }
            $user_arr = Auth::user()->toArray();
            $user_id = $user_arr['id'];
            $LeaveApplication->user_id = $user_id;
            
            if ($request->has('start_date')) {
            	$LeaveApplication->start_date = DateJsToMysql($request->start_date);
            }
            if ($request->has('end_date')) {
            	$LeaveApplication->end_date = DateJsToMysql($request->end_date);
            }
            if ($request->has('reason')) {
            	$LeaveApplication->reason = $request->reason;
            }
            $LeaveApplication->backup_employee_id = 0;
            $LeaveApplication->approved = 0;

			$LeaveApplication->save();
            return redirect('/myleaves');
        }else {
            return view('leaveapplications.applyforleave');
        }        
    }


}

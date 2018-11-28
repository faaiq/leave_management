<?php

/**
* change plain number to formatted currency
*
* @param $number
* @param $currency
*/
use App\AmenityMaster;
use App\Contents;

function formatNumber($number, $currency = 'IDR')
{
   if($currency == 'USD') {
        return number_format($number, 2, '.', ',');
   }
   return number_format($number, 0, '.', '.');
}


function getBaseUrl() {

	return 'http://localhost/leave_management';
	
}


function getRelBaseUrl() {
	
		return "/leave_management/";

	

}

function getBasePath() {

	
		return "/var/www/html/leave_management/";

	

}


function DateJsToMysql($date) {
	//04/05/2018
	if(strstr($date, "/")) {
		list($d,$m,$y) = explode("/", $date);
		$my = $y . "-" . $m . "-" . $d;
		return $my;
	}else {
		return $date;
	}

}


function DateMysqlToJs($date) {
	//04/05/2018
	list($y,$m,$d) = explode("-", $date);
	$my = $d . "/" . $m . "/" . $y;
	return $my;
}

//2018-07-26T11:19:38Z

function ApiDateToJs($date) {
	//04/05/2018
	list($date,$time) = explode("T", $date);
	list($y,$m,$d) = explode("-", $date);
	$my = $d . "/" . $m . "/" . $y;
	return $my;
}


function get_currrent_env() {
	$array = array();
	$array['test'] = "Test";
	$array['Prod'] = "Production";
	return $array;
}

function build_select($options, $sel = '', $blank = 0) {
	$opt = "";
	if($blank == 1) {
		$opt .= '<option value=""></option>';
	}
	foreach($options as $key => $value) {
		if($sel == $key) {
			$opt .= '<option value="'.$key.'" selected="selected">'.$value.'</option>';

		}else {
			$opt .= '<option value="'.$key.'">'.$value.'</option>';
		}
	}
	return $opt;
}

function build_select_rec($records, $fields, $sel = '', $blank = 0) {
	$opt = "";
	if($blank == 1) {
		$opt .= '<option value="">--SELECT--</option>';
	}

	foreach($records as $rows) {
    if(trim($sel) ==  trim($rows->{$fields[0]})) {
			$opt .= '<option value="' . $rows->{$fields[0]} . '" selected="selected">' . $rows->{$fields[1]} . '</option>';

		}else {
			$opt .= '<option value="' . $rows->{$fields[0]} . '">' . $rows->{$fields[1]} . '</option>';
		}
	}
	return $opt;
}

function build_select2($options, $sel = '', $blank = 0) {
	$opt = "";
	if($blank == 1) {
		$opt .= '<option value=""></option>';
	}
	foreach($options as $key => $value) {
		if($sel == $key) {
			$opt .= '<option  style="background-image:url('.$value.');" value="'.$key.'" selected="selected">'.$value.'</option>';

		}else {
			$opt .= '<option  style="background-image:url('.$value.');"  value="'.$key.'">'.$value.'</option>';
		}
	}
	return $opt;
}


function getisActiveDom() {
	$array = array();
	$array[] = 'InActive';
	$array[] = 'Active';
	return $array;
}



function sanitize_title($title) {
  $title = trim($title);
	$title = str_replace(" ", "", $title);
  $title = str_replace("&", "", $title);
  $title = strtolower($title);

	return $title;
}


function userTypeDom() {
    $arr = array();
    $arr["employee"] = "Employee";
    $arr["super_admin"] = "Super Admin";

	return $arr;
}

function getSelUserType($key = '') {
    $arr = userTypeDom();
    return $arr[$key];
}

function getUsersDom() {
    $arr = array();
    
    $where = array();
    $where[] = array("user_type","=","employee");
    $users = $users = DB::table('users')->orderBy('name','asc')->where($where)->get();
    $users = $users->toArray();
    
    $users_arr = array();
	for($i = 0; $i < count($users); ++$i) {
		$users_arr[$users[$i]->id] = $users[$i]->name;
	}
	return $users_arr;
}

function getSelUser($user_id) {
    $arr = array();
    
    $where = array();
	$where[] = array("user_type","=","employee");
	$where[] = array("id","=",$user_id);
	$user = $users = DB::table('users')->where($where)->first();
	if($user) {
		return $user->name;
	}else {
		return "";
	}
}

function getEmployeeList() {
    return getUsersDom();
    
}

function getApprovedList() {
    $arr = array();
    $arr[] = 'Not Approved';
	$arr[] = 'Approved';
	return $arr;
}

function getSelApproved($key = '') {
    $arr = getApprovedList();
    return $arr[$key];
	
}
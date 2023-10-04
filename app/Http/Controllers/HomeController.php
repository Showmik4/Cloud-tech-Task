<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;
use App\Jobs\UpdateTopTopupUsers;
use Illuminate\Support\Facades\Artisan;

class HomeController extends Controller
{
    public function welcome_home()
    {
        return view('users.view_users');
    }
    
    public function getTopUsers()
{
    $users = DB::table('users')
        ->join('top_ups', 'users.id', '=', 'top_ups.user_id')
        ->select('users.name', 'users.email', DB::raw('COUNT(top_ups.id) as topup_count'))
        ->groupBy('users.id', 'users.name', 'users.email')
        ->orderBy('topup_count', 'desc')
        ->get();   
   
    return DataTables::of($users)->make(true);
}

public function getTopTopUpUsers()
{
    $users = DB::table('users')
        ->join('top_up_users', 'users.id', '=', 'top_up_users.user_id')
        ->select('users.name', 'users.email', 'top_up_users.count')        
        ->orderBy('top_up_users.count', 'asc')
        ->get(); 
    return DataTables::of($users)->make(true);
}

public function updateTopTopupUsers()
{    
    dispatch(new UpdateTopTopupUsers);   
    return redirect()->back();
}

public function run()
    {
        Artisan::call('topupusers:process');
        return redirect()->back()->with('success', 'TopTopUpUsers process initiated successfully.');
    }
}

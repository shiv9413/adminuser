<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\Transactions;

class DashboardController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }


    public function index()
    {
        if (is_null($this->user) || !$this->user->can('dashboard.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view dashboard !');
        }
        $user_role = $this->user->hasRole('users');
        $total_roles = count(Role::select('id')->get());
        $total_admins = count(Admin::select('id')->get());
        $total_permissions = count(Permission::select('id')->get());
        $total_transactions = count(Transactions::select('id')->where('user_id',$this->user->id)->get());
        $history = Transactions::where('user_id',$this->user->id)->orderBy('id', 'desc')->get();
        $total_balance = $this->user->total_balance;
        if($user_role){
            return view('backend.pages.users.transaction.index', compact('history','total_balance'));
        } else {
            return view('backend.pages.dashboard.index', compact('total_admins', 'total_roles', 'total_permissions','total_transactions'));
        }
    }
}

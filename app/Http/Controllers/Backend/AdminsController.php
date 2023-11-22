<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use App\Models\Transactions;

class AdminsController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('admin.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any admin !');
        }

        $admins = Admin::all();
        return view('backend.pages.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        $roles  = Role::all();
        return view('backend.pages.admins.create', compact('roles'));
    }

    public function manageTransactions()
    {
        if (is_null($this->user) || !$this->user->can('transaction.manage')) {
            abort(403, 'Sorry !! You are Unauthorized to manage any transaction !');
        }

        $admins = Admin::all();
        return view('backend.pages.admins.transaction.manage', compact('admins'));
    }

    public function listTransactions($id)
    {
        if (is_null($this->user) || !$this->user->can('transaction.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view transaction details !');
        }

        $history = Transactions::where('user_id',$id)->orderBy('id', 'desc')->get();
        return view('backend.pages.admins.transaction.index', compact('history','id'));
    }

    public function createTransactions(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        $admin = Admin::find($request->user_id);

        // Validation Data
        $request->validate([
            'amount' => 'required|numeric', 
            'date' => 'required|date',
            'transaction_type' => 'required|in:debit,credit',
            'description' => 'required|min:5',
        ]);

        $available_amount = 0;

        if($request->transaction_type == 'debit') {
            // if($admin->total_balance < 1){
            //     abort(403, 'Sorry !! Total Balance Zero, Can not create debit history !');
            // }
            // if($request->amount > $admin->total_balance){
            //     abort(403, 'Sorry !! Total Balance less than debit amount');
            // }
            $available_amount = $admin->total_balance - $request->amount;
        } else {
            $available_amount = $admin->total_balance + $request->amount;
        }

        $create = new Transactions();
        $create->date = $request->date;
        $create->transaction_type = $request->transaction_type;
        $create->description = $request->description;
        $create->amount = $request->amount;
        $create->available_balance =  $available_amount;
        $create->user_id = $admin->id;

        if($create->save()){
            $admin->total_balance = $available_amount;
            $admin->save();
        }

        session()->flash('success', 'History Created !!');
        return back();
    }

    public function updateTransactions(Request $request)
    {
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'date' => 'required|date',
            'transaction_type' => 'required|in:credit,debit',
            'description' => 'required|string',
        ]);

        $txn = Transactions::findOrFail($request->txn_id);

        $admin = Admin::findOrFail($txn->user_id);

        $available_amount = 0;

        if($validatedData['transaction_type'] == 'debit') {
            // if($admin->total_balance < 1){
            //     abort(403, 'Sorry !! Total Balance Zero, Can not create debit history !');
            // }
            // if($validatedData['amount'] > $admin->total_balance){
            //     abort(403, 'Sorry !! Total Balance less than debit amount');
            // }
            $available_amount = $admin->total_balance - $validatedData['amount'];
        } else {
            if($admin->total_balance > $validatedData['amount']){
                $available_amount = $admin->total_balance - $validatedData['amount'];
            } else {
                $available_amount = $admin->total_balance + $validatedData['amount'];
            }
        }

        // Update the admin's transaction details
        $txn->update([
            'amount' => $validatedData['amount'],
            'date' => $validatedData['date'],
            'transaction_type' => $validatedData['transaction_type'],
            'available_balance' => $available_amount,
            'description' => $validatedData['description'],
        ]);

        $admin->total_balance = $available_amount;
        $admin->save();

        session()->flash('success', 'History Updated !!');
        return back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (is_null($this->user) || !$this->user->can('admin.create')) {
            abort(403, 'Sorry !! You are Unauthorized to create any admin !');
        }

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:admins',
            'username' => 'required|max:100|unique:admins',
            'password' => 'required|min:6|confirmed',
        ]);

        // Create New Admin
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->password = Hash::make($request->password);
        $admin->save();

        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        session()->flash('success', 'Admin has been created !!');
        return redirect()->route('admin.admins.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        $admin = Admin::find($id);
        $roles  = Role::all();
        return view('backend.pages.admins.edit', compact('admin', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.edit')) {
            abort(403, 'Sorry !! You are Unauthorized to edit any admin !');
        }

        // TODO: You can delete this in your local. This is for heroku publish.
        // This is only for Super Admin role,
        // so that no-one could delete or disable it by somehow.
        if ($id === 1) {
            session()->flash('error', 'Sorry !! You are not authorized to update this Admin as this is the Super Admin. Please create new one if you need to test !');
            return back();
        }

        // Create New Admin
        $admin = Admin::find($id);

        // Validation Data
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|max:100|email|unique:admins,email,' . $id,
            'password' => 'nullable|min:6|confirmed',
        ]);


        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->username = $request->username;
        if ($request->password) {
            $admin->password = Hash::make($request->password);
        }
        $admin->save();

        $admin->roles()->detach();
        if ($request->roles) {
            $admin->assignRole($request->roles);
        }

        session()->flash('success', 'Admin has been updated !!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        if (is_null($this->user) || !$this->user->can('admin.delete')) {
            abort(403, 'Sorry !! You are Unauthorized to delete any admin !');
        }

        // TODO: You can delete this in your local. This is for heroku publish.
        // This is only for Super Admin role,
        // so that no-one could delete or disable it by somehow.
        if ($id === 1) {
            session()->flash('error', 'Sorry !! You are not authorized to delete this Admin as this is the Super Admin. Please create new one if you need to test !');
            return back();
        }

        $admin = Admin::find($id);
        if (!is_null($admin)) {
            $admin->delete();
        }

        session()->flash('success', 'Admin has been deleted !!');
        return back();
    }
}

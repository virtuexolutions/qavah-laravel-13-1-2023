<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Users_subcribtion;
use App\Package;
use App\User;

class SubscriptionController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:subscriptions-list|subscriptions-create|subscriptions-edit|subscriptions-delete', ['only' => ['index','store']]);
        $this->middleware('permission:subscriptions-create', ['only' => ['create','store']]);
        $this->middleware('permission:subscriptions-delete', ['only' => ['destroy']]);
        $this->middleware('permission:subscriptions-show', ['only' => ['show']]);
        $this->middleware('permission:subscriptions-status', ['only' => ['status']]);

    }

    public function index()
    {
        $subscriptions = Users_subcribtion::with('User')->get();
        return view('admin.views.showSubscription',compact('subscriptions'));
    }
    
    
    public function create()
    {
        $data['packages'] = Package::all();
        $data['users'] = User::all();
        return view('admin.views.add_offer_package',$data);
    }
    
    
    public function store(Request $request)
    {
        $package = Package::find($request->pkg_id);
        
        Users_subcribtion::create([
            'user_id' => $request->user_id,
            'pkg_id' => $request->pkg_id,
            'pkg_name' => $package->title,
            'pkg_catogery' => $package->type,
            'spotlights' => $package->spotlights,
            'lovenotes' => $package->lovenotes,
            'staring' => $request->starting,
            'ending' => $request->ending,
            'status' => 1,
        ]);
        
        \Session::flash('success','Record Uploaded Successfully');
        return redirect('subscription')->with('success','Record Uploaded Successfully');
    }

    public function destroy($id)
    {
        $p = Users_subcribtion::find($id);
        $p->delete();
        \Session::flash('success','Record has been deleted Successfully');
        return redirect()->back();
    }
    
    
    public function status($id,$status)
    {
        $p = Users_subcribtion::find($id);
        $p->update(['status'=> $status]);
        \Session::flash('success','Record Updated Successfully');
        return redirect()->back();
    }
    
    
}

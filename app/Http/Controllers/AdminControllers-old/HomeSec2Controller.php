<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HomeSec2;
use File;

class HomeSec2Controller extends Controller
{
    public function store(Request $request)
    {
        $data = [
            'iframe' => $request->iframe,
        ];
        HomeSec2::create($data); 
        return redirect()->back()->with('success', 'Created Successfull');
    }


    public function update(Request $request,$id)
    {
        $slider = HomeSec2::find($id);
        $data = [
            'iframe' => $request->iframe,
        ];
        $slider->update($data); 
        return redirect()->back()->with('success', 'Update Successfull');
    }

    public function destroy($id)
    {
        // $data = DB::table('home_sec_1')->where('id',$id)->first();
        $data = HomeSec2::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Delete Successfull');
    }
}

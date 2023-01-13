<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HomeSec4;

class HomeSec4Controller extends Controller
{
    public function store(Request $request)
    {

        $data = [
            'title' => $request->title,
            'iframe' => $request->iframe,
            'title1' => $request->title1,
            'description1' => $request->description1,
            'title2' => $request->title2,
            'description2' => $request->description2,
            'title3' => $request->title3,
            'description3' => $request->description3,
            'description' => $request->description,
            'created_at' => date('y-m-d'),
        ];
        HomeSec4::create($data); 
        return redirect()->back()->with('success', 'Created Successfull');
    }


    public function update(Request $request,$id)
    {
        $slider = HomeSec4::find($id);

        $data = [
            'title' => $request->title,
            'iframe' => $request->iframe,
            'title1' => $request->title1,
            'description1' => $request->description1,
            'title2' => $request->title2,
            'description2' => $request->description2,
            'title3' => $request->title3,
            'description3' => $request->description3,
            'description' => $request->description,
            'created_at' => date('y-m-d'),
        ];
        $slider->update($data); 
        return redirect()->back()->with('success', 'Update Successfull');
    }

    public function destroy($id)
    {
        // $data = DB::table('home_sec_1')->where('id',$id)->first();
        $data = HomeSec4::find($id);
        $data->delete();
        return redirect()->back()->with('success', 'Delete Successfull');
    }
}

<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HomeSec3;
use File;

class HomeSec3Controller extends Controller
{
    public function store(Request $request)
    {
        $fileName1 ='';
        $fileName2 ='';
        $fileName3 ='';
        $destinationPath = public_path('uploads/home/'); // upload path

        if($request->hasFile('image1')) 
        {
            $files1 = $request->file('image1');
            $fileName1 =  date('YmdHis') . rand(1,10) . "." . $files1->getClientOriginalExtension();
            $files1->move($destinationPath, $fileName1);
        }
        if($request->hasFile('image2')) 
        {
            $files2 = $request->file('image2');
            $fileName2 =  date('YmdHis') . rand(12,10) . "." . $files2->getClientOriginalExtension();
            $files2->move($destinationPath, $fileName2);
        }
        if($request->hasFile('image3')) 
        {
            $files3 = $request->file('image3');
            $fileName3 =  date('YmdHis') . rand(133,10) . "." . $files3->getClientOriginalExtension();
            $files3->move($destinationPath, $fileName3);
        }

        $data = [
            'title1' => $request->title1,
            'image1' => $fileName1,
            'description1' => $request->description1,
            'title2' => $request->title2,
            'image2' => $fileName2,
            'description2' => $request->description1,
            'title3' => $request->title3,
            'image3' => $fileName3,
            'description3' => $request->description1,
            'created_at' => date('y-m-d'),
        ];
        HomeSec3::create($data); 
        return redirect()->back()->with('success', 'Created Successfull');
    }


    public function update(Request $request,$id)
    {
        $slider = HomeSec3::find($id);
        $fileName1 = $slider->image1;
        $fileName2 = $slider->image2;
        $fileName3 = $slider->image3;
        $destinationPath = public_path('uploads/home/'); // upload path

        if($request->hasFile('image1')) 
        {
            $files1 = $request->file('image1');
            $fileName1 =  date('YmdHis') . rand(1333,10) . "." . $files1->getClientOriginalExtension();
            $files1->move($destinationPath, $fileName1);
        }

        if($request->hasFile('image2')) 
        {
            $files2 = $request->file('image2');
            $fileName2 =  date('YmdHis') . rand(122,10) . "." . $files2->getClientOriginalExtension();
            $files2->move($destinationPath, $fileName2);
        }

        if($request->hasFile('image3')) 
        {
            $files3 = $request->file('image3');
            $fileName3 =  date('YmdHis') . rand(12,10) . "." . $files3->getClientOriginalExtension();
            $files3->move($destinationPath, $fileName3);
        }

        $data = [
            'title1' => $request->title1,
            'image1' => $fileName1,
            'description1' => $request->description1,
            'title2' => $request->title2,
            'image2' => $fileName2,
            'description2' => $request->description1,
            'title3' => $request->title3,
            'image3' => $fileName3,
            'description3' => $request->description1,
            'created_at' => date('y-m-d'),
        ];
        $slider->update($data); 
        return redirect()->back()->with('success', 'Update Successfull');
    }

    public function destroy($id)
    {
        // $data = DB::table('home_sec_1')->where('id',$id)->first();
        $data = HomeSec3::find($id);
        $imagepath1 = public_path('uploads/home/'. $data->image1);
        $imagepath2 = public_path('uploads/home/'. $data->image2);
        $imagepath3 = public_path('uploads/home/'. $data->image3);
        File::delete($imagepath1);
        File::delete($imagepath2);
        File::delete($imagepath3);
        $data->delete();
        return redirect()->back()->with('success', 'Delete Successfull');
    }
}

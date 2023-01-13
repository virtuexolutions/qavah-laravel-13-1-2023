<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\HomeSec1;
use File;

class HomeSec1Controller extends Controller
{
    public function store(Request $request)
    {





        
        $fileName1 ='';
        $fileName2 ='';
        $fileName3 ='';
        $destinationPath = public_path('uploads/home/'); // upload path

        if($request->hasFile('cover_img')) 
        {
            $files1 = $request->file('cover_img');
            $fileName1 =  date('YmdHis') . rand(1,10) . "." . $files1->getClientOriginalExtension();
            $files1->move($destinationPath, $fileName1);
        }
        if($request->hasFile('left_img')) 
        {
            $files2 = $request->file('left_img');
            $fileName2 =  date('YmdHis') . rand(12,10) . "." . $files2->getClientOriginalExtension();
            $files2->move($destinationPath, $fileName2);
        }
        if($request->hasFile('right_img')) 
        {
            $files3 = $request->file('right_img');
            $fileName3 =  date('YmdHis') . rand(133,10) . "." . $files3->getClientOriginalExtension();
            $files3->move($destinationPath, $fileName3);
        }

        $data = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'message' => $request->message,
            'cover_img' => $fileName1,
            'left_img' => $fileName2,
            'right_img' => $fileName3,
            'created_at' => date('y-m-d'),
        ];
        HomeSec1::create($data); 
        return redirect()->back()->with('success', 'Created Successfull');
    }


    public function update(Request $request,$id)
    {
        $slider = HomeSec1::find($id);
        $fileName1 = $slider->cover_img;
        $fileName2 = $slider->left_img;
        $fileName3 = $slider->right_img;
        $destinationPath = public_path('uploads/home/'); // upload path

        if($request->hasFile('cover_img')) 
        {
            $files1 = $request->file('cover_img');
            $fileName1 =  date('YmdHis') . rand(1333,10) . "." . $files1->getClientOriginalExtension();
            $files1->move($destinationPath, $fileName1);
        }

        if($request->hasFile('left_img')) 
        {
            $files2 = $request->file('left_img');
            $fileName2 =  date('YmdHis') . rand(122,10) . "." . $files2->getClientOriginalExtension();
            $files2->move($destinationPath, $fileName2);
        }

        if($request->hasFile('right_img')) 
        {
            $files3 = $request->file('right_img');
            $fileName3 =  date('YmdHis') . rand(12,10) . "." . $files3->getClientOriginalExtension();
            $files3->move($destinationPath, $fileName3);
        }

        $data = [
            'title' => $request->title,
            'sub_title' => $request->sub_title,
            'message' => $request->message,
            'cover_img' => $fileName1,
            'left_img' => $fileName2,
            'right_img' => $fileName3,
            'created_at' => date('y-m-d'),
        ];
        $slider->update($data); 
        return redirect()->back()->with('success', 'Update Successfull');
    }

    public function destroy($id)
    {
        // $data = DB::table('home_sec_1')->where('id',$id)->first();
        $data = HomeSec1::find($id);
        $imagepath1 = public_path('uploads/home/'. $data->cover_img);
        $imagepath2 = public_path('uploads/home/'. $data->left_img);
        $imagepath3 = public_path('uploads/home/'. $data->right_img);
        File::delete($imagepath1);
        File::delete($imagepath2);
        File::delete($imagepath3);
        $data->delete();
        return redirect()->back()->with('success', 'Delete Successfull');
    }
}

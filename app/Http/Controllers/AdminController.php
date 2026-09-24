<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    function blog2()
    {
        $blogs = Blog::paginate(10);
        return view('blog2', compact('blogs'));
    }

    function about2()
    {
        $name = 'Natkrita Kingchaiyaphum';
        $date = '6 กรกฎาคม 2026';

        return view('about2', compact('name', 'date'));
    }

    function create()
    {
        return view('from');
    }

    function insert(Request $request)
    {
    
        $request->validate([
            'title' => 'required|string|max:50',
            'content' => 'required|string',
        ], [
            'title.required' => 'กรุณากรอกชื่อบทความ',
            'title.max' => 'ชื่อบทความต้องไม่เกิน 50 ตัวอักษร',
            'content.required' => 'กรุณากรอกเนื้อหาบทความ',
        ]);

      
        Blog::insert([
            'title' => $request->title,
            'content' => $request->content,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/author/blog2');
    }

    function delete($id)
    {
        Blog::find($id)->delete();
        return redirect('/blog2');
    }
    function change($id){
        $blog = Blog::find($id);
        $data = [
            'status' =>$blog->status
        ];
        if($data['status'] == 0){
            $data['status'] = 1;
        }else{
            $data['status'] = 0;
        }
        Blog::find($id)->update($data);
        return redirect()->back();
    }
    function edit($id){
        $blog = Blog::find($id);
        return view('edit', compact('blog'));
    }
    function update(Request $request, $id){
         $request->validate([
            'title' => 'required|string|max:50',
            'content' => 'required|string',
        ], [
            'title.required' => 'กรุณากรอกชื่อบทความ',
            'title.max' => 'ชื่อบทความต้องไม่เกิน 50 ตัวอักษร',
            'content.required' => 'กรุณากรอกเนื้อหาบทความ',
        ]);
        $data = [
            'title' => $request->title,
            'content' => $request->content,
        ];
        Blog::find($id)->update($data);
        return redirect('/author/blog2');
    }
}
<?php

namespace App\Http\Controllers\CMS;

use App\Http\Controllers\Controller;

use\App\Models\Student;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;


class StudentController extends Controller
{
    public function index()
    {
        $data['student'] = Student::get();
        return view('student.index', compact('data'));
    }
    public function create()
    {
        return view('student.create');
    }

    public function remove($id)
    {
        $data['student'] = Student::findOrFail($id);
        $path = getcwd().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR. 'students'.DIRECTORY_SEPARATOR. $data['student']->image;
        $data['student']->delete();
       // dd($file_path);
        if(is_file($path)){
            unlink($path);
        }
        return redirect('/form/index');
    }

    public function edit($id)
    {
        $data['student'] = Student::findOrFail($id);
        // dd($data['student']);
        return view('student.edit', compact('data'));
    }
    public function update(Request $request, $id)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:25',
            'contact' => 'required|numeric|digits:10',
            'address' => 'required|max:255',
            'email' => 'required|email',
            'faculty' => 'required',
            'gender' => 'required'

        ]);
        $data['student'] = Student::findOrFail($id);
        $data['student']->name = $request->input('name');
        $data['student']->address = $request->input('address');
        $data['student']->email = $request->input('email');
        $data['student']->contact = $request->input('contact');
        $data['student']->gender = $request->input('gender');
        $data['student']->faculty = $request->input('faculty');
        if ($request->hasfile('image')) {
            $path = getcwd().DIRECTORY_SEPARATOR.'uploads'.DIRECTORY_SEPARATOR. 'students'.DIRECTORY_SEPARATOR. $data['student']->image;
            $data['student']->delete();
           // dd($file_path);
            if(is_file($path)){
                unlink($path);
            }
            // $destination = 'uploads/students/' . $data['student']->image;
            // if (File::exists($destination)) {
            //     File::delete($destination);
            // }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/students/', $filename);
            $data['student']->image = $filename;
        }




        $data['student']->update();
        $data['student']->save();
        return redirect('/form/index/')->with('status', "Data updated Successfully");
    }
    //     public function store(Request $request)
    // {
    // $path = $request->file('image')->store('public/images');
    // // save $path to the database
    // return back()->with('success', 'Image uploaded successfully.');
    // }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:25',
            'contact' => 'required|numeric|digits:10',
            'address' => 'required|max:255',
            'email' => 'required|email',
            'faculty' => 'required',
            'gender' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:5000'

        ]);

        //$data  = $request->all();
        $model = new Student;
        $model->name = $request->name;
        $model->address = $request->address;
        $model->contact = $request->contact;
        $model->email = $request->email;
        $model->gender = $request->gender;
        $model->faculty = $request->faculty;

        if ($request->hasfile('image')) {

            $file = $request->file('image');

            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/students/', $filename);
            $model->image = $filename;
        } else {
            return $request;
            $model->image = '';
        }
        $success = $model->save();
        dd($success);
    }

    public function login()
    {
        return view('auth.login');
    }
}

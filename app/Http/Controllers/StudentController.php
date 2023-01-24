<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{    
    /**
     * index
     *
     * @return void
     */
    public function index()
    {
        //get posts
        $students = Student::latest()->paginate(5);

        //render view with posts
        return view('students.index', compact('students'));
    }
    
    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        return view('students.create');
    }

    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'number'   => 'required|min:0',
            'name'   => 'required|min:3',
            'photo'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'     => 'required|min:5',
            'phone'   => 'required|min:12'
        ]);

        //upload image
        $photo = $request->file('photo');
        $photo->storeAs('public/storage', $photo->hashName());

        //create post
        Student::create([
            'number'    => $request->number,
            'name'    => $request->name,
            'photo'     => $photo->hashName(),
            'email'     => $request->email,
            'phone'   => $request->phone
        ]);

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Disimpan!']);
    
}

 
    /**
     * edit
     *
     * @param  mixed $post
     * @return void
     */
    public function edit(Student $student)
    {
        var_dump($student->name);
        return view('students.edit', compact('student'));
    }
    
    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $student
     * @return void
     */
    public function update(Request $request, Student $student)
    {
        //validate form
        $this->validate($request, [
            'number'   => 'required|min:0',
            'name'   => 'required|min:3',
            'photo'     => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'email'     => 'required|min:5',
            'phone'   => 'required|min:12'
        ]);

        //check if image is uploaded
        if ($request->hasFile('photo')) {

            //upload new image
            $photo = $request->file('photo');
            $photo->storeAs('public/students', $photo->hashName());

            //delete old image
            Storage::delete('public/students/'.$student->photo);

            //update post with new image
            $student->update([
                'number'    => $request->number,
                'name'    => $request->name,
                'photo'     => $photo->hashName(),
                'email'     => $request->email,
                'phone'   => $request->phone
            ]);

        } else {

            //update post without image
            $student->update([
                'number'    => $request->number,
            'name'    => $request->name,
            'email'     => $request->email,
            'phone'   => $request->phone
            ]);
        }

        //redirect to index
        return redirect()->route('students.index')->with(['success' => 'Data Berhasil Diubah!']);
    } /**
    * destroy
    *
    * @param  mixed $student
    * @return void
    */
   public function destroy(Student $student)
   {
       //delete image
       Storage::delete('public/students/'. $student->photo);

       //delete post
       $student->delete();

       //redirect to index
       return redirect()->route('students.index')->with(['success' => 'Data Berhasil Dihapus!']);
   }
}
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index(Request $request){
        $perPage = 10; // Number of records per page
    $query = Student::query();

    // Search functionality
    if ($request->has('search')) {
        $search = $request->get('search');
        $query->where('name', 'like', "%$search%")
              ->orWhere('email', 'like', "%$search%");
    }

    // Sorting functionality
    if ($request->has('sort_by')) {
        $sortBy = $request->get('sort_by');
        $sortDirection = $request->get('sort_direction', 'asc');
        $query->orderBy($sortBy, $sortDirection);
    }

    $student = $query->paginate($perPage);
    
    return view("students.index", compact("student"));    
    }

    public function create()
{
    return view('students.create');
}

public function store(Request $request)
{
    // Validation
    $validatedData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|string',
            'gender' => 'required|string',
            'dob' => 'nullable|date',
            'doj' => 'nullable|date',
            'father_name' => 'required|string',
            'mother_name' => 'required|string',
            'address' => 'required|string',
            'roll_no' => 'required|string|unique:students,roll_no',
    ]);

    $student = Student::create($validatedData);

    return redirect()->back()->with('success', 'Student created successfully!');
}

public function destroy(Student $student)
{
    $student->delete();
    return redirect()->route('home')->with('success', 'Student deleted successfully!');
}

public function edit($id)
    {
       $update_student = Student::find($id);
       return view('students.update',compact('update_student'));
    }

    public function update(Request $request, $id)
        {
            $validatedData = $request->validate([
                'name' => 'required|string',
                'email' => 'required|email',
                'phone' => 'required|string',
                'gender' => 'required|in:male,female,other',
                'dob' => 'required|date',
                'doj' => 'required|date',
                'father_name' => 'required|string',
                'mother_name' => 'required|string',
                'address' => 'required|string',
                'roll_no' => 'required|string',
            ]);
        
            // Find the student record by ID
            $student = Student::findOrFail($id);
        
            // Update the student record with validated data
            $student->update($validatedData);
            return redirect()->route('students.edit', ['student' => $id])->with('success', 'Records updated successfully!');

        }


}

<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\Validator;


class StudentController extends Controller
{
    // Get all students
    public function index()
    {
        return response()->json(Student::all(), 200);
    }

    // Get a single student by ID
    public function show($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }
        return response()->json($student, 200);
    }

    // Add a new student
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'id' => 'integer|unique:student',
            'name' => 'required|string|max:150',
            'dob' => 'required|date',
            'email' => 'required|string|email|max:150|unique:student',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'blood_group' => 'required|string|max:10',
        ]);
        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 400);
        }
        $student = Student::create($request->all());
        return response()->json($student, 201);
    }

    // Update an existing student
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $validatedData = Validator::make($request->all(),[
            'name' => 'sometimes|required|string|max:150',
            'dob' => 'sometimes|required|date',
            'email' => 'sometimes|required|string|email|max:150|unique:student,email,' . $id,
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'blood_group' => 'required|string|max:10',
        ]);

        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 400);
        }
        $student = Student::create($request->all());
        return response()->json($student, 201);
    }

    // Delete a student
    public function destroy($id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student not found'], 404);
        }

        $student->delete();
        return response()->json(['message' => 'Student deleted successfully'], 200);
    }
}

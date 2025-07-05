<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use Illuminate\Support\Facades\Validator;


class TeacherController extends Controller
{

    public function index()
    {
        return response()->json(Teacher::all(), 200);
    }


    public function show($id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }
        return response()->json($teacher, 200);
    }

    // Add a new teacher
    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'id' => 'integer|unique:teacher',
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:150|unique:teacher',
            'subject' => 'required|string|max:30',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'age' => 'required|integer',
            'experience' => 'required|integer',
            'joining_date' => 'required|date'
        ]);
        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 400);
        }
        $teacher = Teacher::create($request->all());
        return response()->json($teacher, 201);
    }


    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }

        $validatedData = Validator::make($request->all(),[
            'name' => 'required|string|max:150',
            'email' => 'required|string|email|max:150|unique:teacher',
            'subject' => 'required|string|max:30',
            'phone' => 'required|string|max:15',
            'address' => 'required|string',
            'age' => 'required|integer',
            'experience' => 'required|integer',
            'joining_date' => 'required|date'
        ]);

        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 400);
        }
        $teacher = Teacher::create($request->all());
        return response()->json($teacher, 201);
    }


    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        if (!$teacher) {
            return response()->json(['message' => 'Teacher not found'], 404);
        }

        $teacher->delete();
        return response()->json(['message' => 'Teacher deleted successfully'], 200);
    }
}

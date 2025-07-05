<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Assignments;
use Illuminate\Support\Facades\Validator;


class AssignmentController extends Controller
{
    // Get all students
    public function index()
    {
        return response()->json(Assignments::all(), 200);
    }

    // Get a single student by ID
    public function show($id)
    {
        $assignment = Assignments::find($id);
        if (!$assignment) {
            return response()->json(['message' => 'assignment not found'], 404);
        }
        return response()->json($assignment, 200);
    }


    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(),[
            'id' => 'integer|unique:assignments',
            'assignment' => 'required|bytea',
            'created_by' => ''
        ]);
        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 400);
        }
        $assignment = Assignments::create($request->all());
        return response()->json($assignment, 201);
    }

    // Update an existing student
    public function update(Request $request, $id)
    {
        $assignment = Assignments::find($id);
        if (!$assignment) {
            return response()->json(['message' => 'assignment not found'], 404);
        }

        $validatedData = Validator::make($request->all(),[
            'id' => 'integer|unique:assignments',
            'assignment' => 'required|bytea',
            'created_by' => ''
        ]);

        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 400);
        }
        $assignment = Assignments::create($request->all());
        return response()->json($assignment, 201);
    }

    // Delete a student
    public function destroy($id)
    {
        $assignment = Assignments::find($id);
        if (!$assignment) {
            return response()->json(['message' => 'assignment not found'], 404);
        }

        $assignment->delete();
        return response()->json(['message' => 'assignment deleted successfully'], 200);
    }
}

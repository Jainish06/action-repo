<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Courses;
use Illuminate\Support\Facades\Validator;

class CoursesController extends Controller
{
    public function index()
    {
        return response()->json(Courses::all());
    }

    public function show($id)
    {
        $course = Courses::find($id);
        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }
        return response()->json($course);
    }

    public function store(Request $request)
    {
        $validatedData = Validator::make($request->all(), [
            'id' => 'integer|unique:courses',
            'name' => 'required|string|max:150',
            'description' => 'nullable|string|max:150',
            'teacher_id' => 'required',
        ]);

        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 400);
        }
        $course = Courses::create($request->all());
        dd($course);
        return response()->json($course, 201);
    }

    public function update(Request $request, $id)
    {
        $course = Courses::find($id);
        if (!$course) {
            return response()->json(['message' => 'courses not found'], 404);
        }

        $validatedData = Validator::make($request->all(), [
            'name' => 'required|string|max:150',
            'description' => 'nullable|string|max:150',
            'teacher_id' => 'required|exists:teacher_id',
        ]);

        if ($validatedData->fails()) {
            return response()->json($validatedData->errors(), 400);
        }
        $course = Courses::create($request->all());
        return response()->json($course, 201);
    }

    public function destroy($id)
    {
        $course = Courses::find($id);
        if (!$course) {
            return response()->json(['message' => 'Course not found'], 404);
        }

        $course->delete();
        return response()->json(['message' => 'Course deleted successfully']);
    }
}

<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/


$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('students', 'StudentController@index'); // Get all students
    $router->get('students/{id}', 'StudentController@show'); // Get student by ID
    $router->post('students', 'StudentController@store'); // Add new student
    $router->patch('students/{id}', 'StudentController@update'); // Update student by ID
    $router->delete('students/{id}', 'StudentController@destroy'); // Delete student by ID
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('teacher', 'TeacherController@index'); 
    $router->get('teacher/{id}', 'TeacherController@show'); 
    $router->post('teacher', 'TeacherController@store'); 
    $router->put('teacher/{id}', 'TeacherController@update'); 
    $router->delete('teacher/{id}', 'TeacherController@destroy'); 
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->get('courses', 'CoursesController@index');
    $router->get('courses/{id}', 'CoursesController@show');
    $router->post('courses', 'CoursesController@store');
    $router->put('courses/{id}', 'CoursesController@update');
    $router->delete('courses/{id}', 'CoursesController@destroy');
});
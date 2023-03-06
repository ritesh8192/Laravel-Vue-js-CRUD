<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
/*
|--------------------------------------------------------------------------
| AuthController
|--------------------------------------------------------------------------
*/
Route::post('register','API\AuthController@register');
Route::post('login','API\AuthController@login');

/*
|--------------------------------------------------------------------------
| AboutController
|--------------------------------------------------------------------------
*/
Route::get('edit_about','API\AboutController@edit_about');
Route::post('update_about/{id}','API\AboutController@update_about');

/*
|--------------------------------------------------------------------------
| ServiceController
|--------------------------------------------------------------------------
*/
Route::get('get_all_service','API\ServiceController@get_all_service');
Route::post('/create_service','API\ServiceController@create_service');
Route::post('/update_service/{id}','API\ServiceController@update_service');
Route::get('/delete_service/{id}','API\ServiceController@delete_service');

/*
|--------------------------------------------------------------------------
| SkillController
|--------------------------------------------------------------------------
*/
Route::get('/get_all_skill','API\SkillController@get_all_skill');
Route::post('/create_skill','API\SkillController@create_skill');
Route::post('/update_skill/{id}','API\SkillController@update_skill');
Route::get('/delete_skill/{id}','API\SkillController@delete_skill');

/*
|--------------------------------------------------------------------------
| EducationController
|--------------------------------------------------------------------------
*/
Route::get('/get_all_education','API\EducationController@get_all_education');
Route::post('/create_education','API\EducationController@create_education');
Route::post('/update_education/{id}','API\EducationController@update_education');
Route::get('/delete_education/{id}','API\EducationController@delete_education');

/*
|--------------------------------------------------------------------------
| ExperienceController
|--------------------------------------------------------------------------
*/
Route::get('/get_all_experiences','API\ExperienceController@get_all_experiences');
Route::post('/create_experience','API\ExperienceController@create_experience');
Route::post('/update_experience/{id}','API\ExperienceController@update_experience');
Route::get('/delete_experience/{id}','API\ExperienceController@delete_experience');

/*
|--------------------------------------------------------------------------
| ProjectController
|--------------------------------------------------------------------------
*/
Route::get('/get_all_project','API\ProjectController@get_all_project');
Route::post('/add_project','API\ProjectController@add_project');
Route::get('/get_edit_project/{id}','API\ProjectController@get_edit_project');
Route::post('/update_project/{id}','API\ProjectController@update_project');
Route::get('/delete_project/{id}','API\ProjectController@delete_project');
/*
|--------------------------------------------------------------------------
| TestimonialController
|--------------------------------------------------------------------------
*/
Route::get('/get_all_testimonial','API\TestimonialController@get_all_testimonial');
Route::post('/add_testimonial','API\TestimonialController@add_testimonial');
Route::get('/get_edit_testimonial/{id}','API\TestimonialController@get_edit_testimonial');
Route::post('/update_testimonial/{id}','API\TestimonialController@update_testimonial');
Route::get('/delete_testimonial/{id}','API\TestimonialController@delete_testimonial');

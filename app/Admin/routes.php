<?php

use App\Http\Controllers\downloadFilesController;

// Категория - Таблица с данными
Route::get('', ['as' => 'admin.dashboard', function () {
//    $profileData =  \App\Models\PersonalData::all();
    $profileData =  DB::table('personal_dataMBA')->orderBy('created_at', 'desc')->get();
    $content = view('adminPanel.profileUser')->with('profileData', $profileData);
	return AdminSection::view($content, 'Dashboard');
}])->middleware('admin');

// Категория - Quiz
Route::get('information', ['as' => 'admin.information', function () {
	$content = 'Define your information here.';
	return AdminSection::view($content, 'Information');
}])->middleware('admin');


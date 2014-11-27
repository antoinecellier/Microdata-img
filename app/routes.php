<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Page d'accueil  (liste des images )
Route::get('/', array('as' => 'home','uses' => 'ImagesController@listImg'));

//Page d'une image 
Route::get('/image/{imageName}', array('as' => 'showImg','uses' => 'ImagesController@showImg'));

//Page d'une image 
Route::get('/image/add', array('as' => 'addImg','uses' => 'ImagesController@addImg'));


//Télécharger une image 
Route::get('/image/download/{imageURL}', array('as' => 'downloadIMG','uses' => 'ImagesController@downloadImg'));

//Télécharger fichier XMP correspondant à une image 
Route::get('/image/downloadXMP/{imageURL}', array('as' => 'downloadXMP','uses' => 'ImagesController@downloadXMP'));

// Page 404
App::missing(function($exception)
{
    return Response::view('errors.404', array(), 404);
});

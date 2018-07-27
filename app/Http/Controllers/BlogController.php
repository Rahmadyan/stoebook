<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
    	return view('adminlte'); 
    }

    public function show($id)
    {
    	$nilai = 'nilainya adalah '. $id;
    	$user = 'Rahmadyan Nurwidhi Biddaris';
    	$users = ['rahmadyan','nurwidhi'];

    	return view('single', ['blog' =>$nilai, 'user'=>$user, 'users'=>$users ]);
    }


}

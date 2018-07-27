<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BelajarController extends Controller
{
    public function index()
    {
        $title = 'Ini halaman home';
        $content = 'Saat ini kita berada di halaman Home onphpid.com';
 
        return view('home.indexlatihan', compact('title', 'content'));
    }
 
    public function getPage()
    {
        $title = 'Ini halaman HTML';
        $content = 'Saat ini kita berada di halaman HTML onphpid.com';
 
        return view('home.indexlatihan2', compact('title', 'content'));
    }

	//method untuk menampilkan relasi table user dan table profiles dengan profile mereka semua
    public function getOne()
	{
   		$title = 'One To One Relationships ONPHPID.';
   		$content = 'Saat ini kita belajar relasi One To One.';
   		$users = \App\User::get();
 
   		return view('home.indexlatihan', compact('title', 'content', 'users'));
	}

	//method untuk menampilkan relasi profile dan user, dengan menginputkan parameter
	public function hasOne($nama)
	{
    	$title = 'One To One Relationships ONPHPID.';
    	$content = 'Saat ini kita belajar relasi One To One.';
    	$profile = \App\Profile::where('nama', $nama)->first();
 
    	return view('home.indexlatihan2', compact('title', 'content', 'profile'));
	}

    //method relasi one to many
    public function getOneMany()
    {
        $title = 'One To Many and Many To One Relationships ONPHPID.';
        $content = 'Saat ini kita belajar relasi One To Many and Many To One.';
        $users = \App\User::all();
 
        return view('one_to_many', compact('users', 'title', 'content'));
    }
    
    //method relasi many to one
    public function getmanyOne()
    {
        $title = 'One To Many and Many To One Relationships ONPHPID.';
        $content = 'Saat ini kita belajar relasi One To Many and Many To One.';
        $kendaraans = \App\Kendaraan::all();
 
        return view('many_to_one', compact('kendaraans', 'title', 'content'));
    }

    //relasi many to many
    public function getManyToMany($name = 'onphpid')
    {
        $title = 'Many To Many Relationships ONPHPID.';
        $content = 'Saat ini kita belajar relasi Many To Many.';
        $users = \App\User::where('name', $name)->first();
 
        return view('many_to_many', compact('users', 'title', 'content', 'name'));
    }
}

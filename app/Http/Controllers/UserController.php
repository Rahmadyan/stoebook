<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Thread;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(User $user)
    {
      $threads=Thread::where('user_id',$user->id)->latest()->get();
      return view('user.profile', compact('user','threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('user.editprofile', compact('user'));
    }

    public function update(Request $request, $id)
    {
      $user = User::findOrFail($id);
      $user->update($request->all());

      if($request->file('avatar') == "")
        {
            $user->avatar = $user->avatar;
        }
        else
        {
            $file       = $request->file('avatar');
            $fileName   = $file->getClientOriginalName();
            $request->file('avatar')->move("img/", $fileName);
            $user->avatar = $fileName;
            
            //dd($user);
        }
        $user->save();
      
      return redirect()->route('user_profile',auth()->user())->withMessage('Thread Updated!');

      // $this->validate($request,
      // [
      //     'email' => 'required|min:5',
      //     'birthdate' => 'required',
      //     'address' => 'required|min:5',
      //     'phone_number' => 'required|min:5',
      //     'gender' => 'required'
      // ]);
      // $user->update($request->all());
      // return view('home.index');
      // return redirect()->route('user.index', auth()->id)->withMessage('Profile Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Thread;
use App\User;
use App\Role;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ThreadController extends Controller
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

    // Request $request
    public function index(Thread $threads)
    {
        if(request()->has('sort')){
            $threads = Thread::orderBy('subject', request('sort'))->paginate(15)->appends('sort', request('sort'));
       }elseif (request()->has('new')) {
           $threads = Thread::orderBy('created_at', request('new'))->paginate(15)->appends('new', request('new'));
       }
       else{
        $threads = Thread::paginate(15);
       }

        return view('home.index', compact('threads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOneMany()
    {
        
        $users = \App\User::all();
        return view('home.index', compact('users'));
    }

    public function getmanyOne()
    {
        $kendaraans = \App\Thread::all();
        return view('home.index', compact('kendaraans'));
    }

    //controller menampilkan jabatan user
    public function getManyToMany($name = 'onphpid')
    {
        $title = 'Many To Many Relationships ONPHPID.';
        $content = 'Saat ini kita belajar relasi Many To Many.';
        $users = \App\User::where('name', $name)->first();
     
        return view('many_to_many', compact('users', 'title', 'content', 'name'));
    }
 


    public function create()
    {

        return view('thread.input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validataion
        $this->validate($request,[
            'subject'=>'required|min:5',
            'thread'=>'required|min:0'

        ]);

        //store
        
        auth()->User()->thread()->create($request->all()); //mass assigment

        //redirect
       
        return back()->withMessage('Thread Created!!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */


    public function show(Thread $thread) //menampilkan halaman diskusi
    { 

        // $thread = Thread::findOrFail($thread);

        // return $thread;

        return view('thread.open', compact('thread'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function edit(Thread $thread)
    {
        return view('thread.edit', compact('thread'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Thread $thread)
    {
        if(auth()->user()->id !== $thread->user_id){
           abort(401,"unauthorized");
        }       

        $this->validate($request, [
            'subject' => 'required|min:5',
            'thread'  => 'required|min:10'
        ]);

        $thread->update($request->all());
        return redirect()->route('thread.show', $thread->id)->withMessage('Thread Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Thread  $thread
     * @return \Illuminate\Http\Response
     */

    public function destroy(Thread $thread)
    {
        // if(auth()->user()->id !== $thread->user_id){
        //    abort(401,"unauthorized");
        // }

        $thread->delete();
        return redirect()->route('thread.index')->withMessage("Thread Deleted!");
    }
    
}

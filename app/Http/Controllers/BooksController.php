<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Crud;
use App\User;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mylist()
    {
		if(Auth::user()){			
			$user_id = Auth::user()->id;
			$cruds = Crud::where('user_id',$user_id)->get();
			return view('crud.mylist', compact('cruds'));
		}else{
			return redirect('/');
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('crud.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$user_id = Auth::user()->id;
		//echo "<pre>";print_r($user);exit;
		//echo "<pre>";print_r($_POST);exit;
		//upload image
        if ($file = $request->file('file')) {
			//die('a');
            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension() ?: 'png';
            $folderName = '/uploads/users/';
            $destinationPath = public_path() . $folderName;
            $safeName = str_random(10) . '.' . $extension;
            $file->move($destinationPath, $fileName);
            $request->pic = $fileName;
        }
		
        $crud = new Crud([
          'title' => $request->get('title'),
		  'user_id' => $user_id,
          'description' => $request->get('description'),
		  'isbn' => $request->get('isbn'),
		  'icon' => $request->pic
        ]);

        $crud->save();

        return redirect('/crud');
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
		$books = Crud::all();
		return view('crud.list', compact('books','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $crud = Crud::find($id);

        return view('crud.edit', compact('crud','id'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $crud = Crud::find($id);
        $crud->title = $request->get('title');
        $crud->post = $request->get('post');
        $crud->save();

        return redirect('/crud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $crud = Crud::find($id);
      $crud->delete();

      return redirect('/crud');
    }
}

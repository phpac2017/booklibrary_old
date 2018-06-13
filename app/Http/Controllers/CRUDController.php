<?php

namespace App\Http\Controllers;
use Auth;
use Validator;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Crud;
use App\User;
use App\catalogue;

class CRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		if(Auth::user()){
			$cruds = Crud::all()->toArray();
			$user_id = Auth::user()->id;
			return view('crud.index', compact('cruds','user_id'));
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
		if(Auth::user()){
			$books = Crud::all();
			$user_id = Auth::user()->id;
			return view('crud.list', compact('books','id','user_id'));
		}else{
			return redirect('/');
		}
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
		
        $crud = Crud::find($id);
        $crud->title = $request->get('title');
        $crud->description = $request->get('description');
		$crud->isbn = $request->get('isbn');
		$crud->icon = $request->pic;
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
	
	/**
     * Add Book to Catalogue
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addToCatalogue($id)
    {
      $users = Crud::where('id',$id)->get()->toArray();
	  $bookID = catalogue::where('book_id',$id)->get()->toArray();
	  //echo"<pre>";print_r($bookID);exit;
	  $user_id = Auth::user()->id;
	  //echo $user_id;exit;
	  if($users > 0 && $bookID == array()){
		   $catalogue = new Catalogue;
		   $catalogue->user_id = $user_id;
		   $catalogue->book_id = $users[0]['id'];
		   $catalogue->owner_id = $users[0]['user_id'];
		   $catalogue->title = $users[0]['title'];
		   $catalogue->description = $users[0]['description'];
		   $catalogue->isbn = $users[0]['isbn'];
		   $catalogue->icon = $users[0]['icon'];
		   $catalogue->save();
		   return redirect('/mylist');
	  }
	  return redirect('/mylist');
    }
	
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mylist()
    {
		if(Auth::user()){			
			$user_id = Auth::user()->id;
			$books = Crud::where('user_id',$user_id)->get()->toArray();
			$catalogues = catalogue::where('user_id',$user_id)->get()->toArray();
			$cruds = array_merge($books,$catalogues);
			//echo"<pre>";print_r($cruds);exit;
			return view('crud.mylist', compact('cruds'));
		}else{
			return redirect('/');
		}
    }
	
	/* Live Search */
	public function liveSearch(Request $request)
    { 
        return view('crud.livesearch');
    }
	
	/* Live Search Action */
	function action(Request $request)
    {
		if($request->ajax()){
			$output = '';
			$query = $request->get('query');
			if($query != ''){
			   $data = \DB::table('cruds')
						 ->where('title', 'like', '%'.$query.'%')
						 ->orWhere('isbn', 'like', '%'.$query.'%')
						 ->orderBy('title', 'asc')
						 ->get();
         
			}
			else{
			   $data = \DB::table('cruds')->orderBy('id', 'asc')->get();
			}
			$total_row = $data->count();
			if($total_row > 0){
			   foreach($data as $row){
					$output .= '
					<tr>
					 <td>'.$row->title.'</td>
					 <td>'.$row->description.'</td>
					 <td>'.$row->isbn.'</td>
					</tr>
					';
			   }
			}else{
			   $output = '
			   <tr>
				<td align="center" colspan="5">No Data Found</td>
			   </tr>
			   ';
			}
			$data = array(
				'table_data'  => $output,
				'total_data'  => $total_row
			);

			echo json_encode($data);
		}
    }
}

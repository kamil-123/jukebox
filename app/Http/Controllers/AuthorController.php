<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Author;

class AuthorController extends Controller
{
    
    public function index(){
        $authors = Author::all();
        return view('admin/author/index',compact('authors'));
    }
    
    public function create(){ // display the form to create new Autrhor
        $author = new Author;
        return view('admin/author/edit', compact('author'));
    }



    public function store(Request $request){
        
        $this->validate($request, [             //validation if name was inserted
            'name' => 'required'
        ]);
        
        $authoris = Author::where('name', $request->input('name'))->first();
        if ($authoris === null){
        $author = new Author;
        // $request = request();    //second possible way to catch the request   

        $author->name = $request->input('name');
        
        $author->save();
        session()->flash('success_message', 'Successfully added to database');
        return redirect(action('AuthorController@index'));
        } else {
            session()->flash('success_message', 'Author exist in database');
            return redirect(action('AuthorController@index'));
        }
    }



    public function edit($id){      //displays the form to edit an existing record
        $author = Author::findOrFail($id);
        return view('admin/author/edit', compact('author'));
    }



    public function update(Request $request, $id){    //update existing record
        
        $this->validate($request, [             //validation if name was inserted
            'name' => 'required'
        ]);
        
        $author = Author::findOrFail($id);
        // $request = request();    //second possible way to catch the request   
        $author->name = $request->input('name');
        $author->save();
        session()->flash('success_message', 'Success!');
        return redirect(action('AuthorController@index')); 
    }

    public function delete(Request $request){
        $author = Author::findOrFail($request->input('authorid'));
        $author->delete();
        return redirect(action('AuthorController@index'));
    }
}

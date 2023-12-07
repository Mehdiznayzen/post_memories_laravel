<?php

namespace App\Http\Controllers;
use App\Models\memoriesModel;

use Illuminate\Http\Request;

class memoriesController extends Controller
{
    public function show_memories(){
        $data = memoriesModel::orderBy('created_at', 'desc')->get();
        return view('show_memories', ['data' => $data]);
    }
    public function create_memories(){
        return view('create_memorie');
    }

    public function post_memorie(Request $request){
        // Validate the inputs
        $request->validate([
            'creator' => 'required',
            'title' => 'required',
            'message' => 'required',
            'tags' => 'required',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'image' => 'required'
        ]);


        // Add the data to database
        $newMemorie = new memoriesModel();

        $newMemorie->creator = $request->input('creator');
        $newMemorie->title = $request->input('title');
        $newMemorie->message = $request->input('message');
        $newMemorie->tags = $request->input('tags');
        // $newMemorie->image = $request->input('image');
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' .$extension;
            $file->move('uploads/memories/', $fileName);
            $newMemorie->image = $fileName;
        }

        $newMemorie->save();

        return redirect('/show_memories')->with('add_memorie', 'The memorie is added successfully');
    }

    public function delete_memorie($id){
        try{
            $memorieDeleted = memoriesModel::findOrFail($id);
            $memorieDeleted->delete();
            return redirect('/show_memories')->with('remove_memorie', 'The memorie is removed.');
        }catch(\Exception $eror){
            return redirect('/show_memories')->with('remove_memorie', 'The memorie is not removed.');
        }
    }
}

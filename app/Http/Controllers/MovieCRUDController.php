<?php

namespace App\Http\Controllers;
use App\Models\Movie;
use App\Http\Requests\MovieRequest;
use Illuminate\Http\Request;


class MovieCRUDController extends Controller
{
    public function create ()
    {   
        $movie = new Movie ();

        return view('movies.form', compact('movie'));
    }

    public function store(MovieRequest $request)
    {      
           $this->validateMovie($request);
           
           $movie = new Movie();
           $movie->name = $request->input('name');
           $movie->name = $request->input('year');
           $movie->save();
           return redirect()->route('movies.edit', $movie->id);

        
    }
    public function update(MovieRequest $request, $id)
    {   
            $this->validateMovie($request);
            
            $movie = Movie::findOrFail($id);
            $movie->name = $request->input('name');
            $movie->name = $request->input('year');
            $movie->save();
            session()->flash('success_message', 'The movie was updated');
            return redirect()->route('movies.edit', $movie->id);
    }

    public function edit($id)
    {   
        $movie = Movie::findOrFail($id);

        return view('movies.form', compact('movie'));
    }



    // private function validateMovie($request)
    // {
    //     $this->validate($request, [
    //         'name' => 'required|string',
    //         'year' => 'required|numeric',
    //     ], [
    //         'name.required' => 'Hey you are autistic af'
    //     ]);
    // }
  
}

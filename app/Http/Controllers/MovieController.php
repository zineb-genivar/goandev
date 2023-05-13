<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\RedirectResponse;

class MovieController extends Controller
{

    public function store()
    {
        $api_url = "https://api.themoviedb.org/3/trending/movie/week";
        $token = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMjJkNjNjZGRjMDY2ZDk5ZWQzZTgwNmQzMjY3MThjYSIsInN1YiI6IjYyNGVhNTRhYjc2Y2JiMDA2ODIzODc4YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.zuuBq1c63XpADl8SQ_c62hezeus7VibE1w5Da5UdYyo";
        $response = Http::withToken($token)->get($api_url);
        $response_json = json_decode($response->body(), TRUE);

        foreach ($response_json["results"] as $item) {
            $post = Movie::updateOrCreate(
                [
                    'id' => $item['id'],
                    'title' => $item['title'],
                    'original_title' => $item['original_title'],
                    'overview' => $item['overview'],
                    'original_language' => $item['original_language'],
                    'adult' => $item['adult'],
                    'backdrop_path' => $item['backdrop_path'],
                    'poster_path' => $item['poster_path'],
                    'popularity' => $item['popularity'],
                    'release_date' => $item['release_date'],
                    'video' => $item['video'],
                    'vote_average' => $item['vote_average'],
                    'vote_count' => $item['vote_count']
                ],
            );
        } //fin foreach

        return redirect()->route('dashboard')
                        ->with('success','Movie added successfully');
        //die;
    }


    public function index(){
        $movies = Movie::orderBy('vote_count')->paginate(8);
        return view('dashboard', compact('movies'));
    }

    public function show(Movie $movie): View{
        return view('detail-movie',compact('movie'));
    }

    public function edit(movie $movie): View
    {
        return view('edit-movie',compact('movie'));
    }

    public function update(Request $request, movie $product): RedirectResponse{
        $request->validate([
            'title' => 'required',
            'overview' => 'required',
        ]);
        
        $product->update($request->all());
        
        return redirect()->route('dashboard')
                        ->with('success','Movie updated successfully');
    }

    public function destroy(Movie $movie): RedirectResponse{
        $movie->delete();
    
        return redirect()->route('dashboard')
                        ->with('success','Movie deleted successfully');
    }

    public function search(Request $request){
        $movies = Movie::where('title','LIKE',"%{$request->title}%")->paginate(8);
        return view('dashboard', compact('movies'));
    }

}

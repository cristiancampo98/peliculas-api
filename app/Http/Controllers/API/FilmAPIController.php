<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFilmRequest;
use App\Http\Resources\FilmResource;
use App\Models\Film;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class FilmAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Carbon::today();
        $films = Film::whereDate('release_date', '>=', $data->subWeeks(3))->get();
        return response()->json(FilmResource::collection($films), 200);
    }

    public function getFilmsByCat($id)
    {
        $films = Film::whereHas('categories', function (Builder $query) use ($id) {
            $query->where('category_id', $id);
        })->get();

        return response()->json(FilmResource::collection($films), 200);
    }

    public function getFilmsByName($name)
    {
        $films = Film::where('title', 'like', '%' . $name . '%')->get();

        return response()->json(FilmResource::collection($films), 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilmRequest $request)
    {
        $film = (new Film)->fill($request->all());
        $film->caratula = $request->file('caratula')->storeAs(
            'caratulas',
            $request->file('caratula')->getClientOriginalName(),
            'visible'
        );
        $film->save();
        $film->categories()->sync($request->categories);
        return response()->json($film, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function show(Film $film)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Film $film)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Film  $film
     * @return \Illuminate\Http\Response
     */
    public function destroy(Film $film)
    {
        //
    }
}

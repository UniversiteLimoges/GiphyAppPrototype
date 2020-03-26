<?php

namespace App\Http\Controllers;

use App\Fav;
use Illuminate\Http\Request;

class FavController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favs = Fav::all();

        return view('fav.indexFav', [
            'favs' => $favs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fav.addFormFav');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fav = new Fav;
        $fav->name = $request->input('tag-name');
        $fav->save();

        return redirect()->route('favs.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function show(Fav $fav)
    {

        return redirect()->route('favs.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function edit(Fav $fav)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Fav $fav)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Fav  $fav
     * @return \Illuminate\Http\Response
     */
    public function destroy(Fav $fav)
    {
        $fav->delete();

        return redirect()->route('favs.index');
    }
}

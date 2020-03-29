<?php

namespace App\Http\Controllers;

use App\User;
use App\UsersGeolocalisation;

use Illuminate\Http\Request;
//use App\Http\Middleware\GetIp;

class UserController extends Controller
{


    function __construct()
    {
        $this->middleware('getIp');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $current_user = $request->user();

        return view('user.index', [
            'current_user' => $current_user,
        ]);
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        // dd($user);
        // $location = geoip()->getLocation('37.167.181.124');
        $location = geoip()->getLocation('77.141.147.73'); // tony

        // dd(geoip($ip = null));
        return view('user.edit', [
            'current_user' => $user,
            'location' => $location
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        // Values from the geolocalisation
        //https://laravel.com/docs/5.8/eloquent
        // $users = DB::table('users');
        // dd($users->where('user_id', 2)->first());
        // $userGeolocalisation = userGeolocalisation::find($user->id); // facade
        
        
        // Call from the model thanks to the relation
        
        $userGeolocalisation  = User::find($user->id)->geolocalisation;
        
        // If no user corresponding to the selected user, we create it
        if (is_null($userGeolocalisation )) {
            $userGeolocalisation = new UsersGeolocalisation;
            $userGeolocalisation->user_id = $user->id;
            $userGeolocalisation->ip = $request->input('ip');
            $userGeolocalisation->country = $request->input('country');
            $userGeolocalisation->city = $request->input('city');
            $userGeolocalisation->state = $request->input('state');
            $userGeolocalisation->state_name = $request->input('state_name');
            $userGeolocalisation->postal_code = $request->input('postal_code');
            $userGeolocalisation->lat = $request->input('lat');
            $userGeolocalisation->lon = $request->input('lon');
            $userGeolocalisation->timezone = $request->input('timezone');
            $userGeolocalisation->continent = $request->input('continent');
            $userGeolocalisation->currency = $request->input('currency');
            $userGeolocalisation->save();    
        } else {
            // update it
            $userGeolocalisation->user_id = $user->id;
            $userGeolocalisation->ip = $request->input('ip');
            $userGeolocalisation->country = $request->input('country');
            $userGeolocalisation->city = $request->input('city');
            $userGeolocalisation->state = $request->input('state');
            $userGeolocalisation->state_name = $request->input('state_name');
            $userGeolocalisation->postal_code = $request->input('postal_code');
            $userGeolocalisation->lat = $request->input('lat');
            $userGeolocalisation->lon = $request->input('lon');
            $userGeolocalisation->timezone = $request->input('timezone');
            $userGeolocalisation->continent = $request->input('continent');
            $userGeolocalisation->currency = $request->input('currency');
            $userGeolocalisation->save();    
        }

        // $geolocalisation = UsersGeolocalisation::all();
        // foreach ($geolocalisation as $geo) {
        //     // dd($geolocalisation);
        //     echo $geo->ip;
        // }
        // dd($userGeolocalisation);

        // Modify the user and save it
        $user->email = $request->input('email');
        $user->name = $request->input('name');
        $user->save();

        // return redirect()->route('home')->with('success','User modified successfully');
        return redirect()->route('user.index',  [
            'current_user' => $user
        ])->with('success','User modified successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

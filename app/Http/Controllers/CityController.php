<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $query = City::query();
        if ($request->q) {
            // tu by som normalne v postgrese pouzil ILIKE (case insensitive),
            // pre slovensku lokalizaciu by som sa pohral aj s indexom bez diakritiky
            $query = $query->where('name', 'LIKE', '%'.$request->q.'%');
        }
        return $query->paginate(5);
    }

    public function show(City $city)
    {
        return view('cities.show',compact('city', $city));
    }
}

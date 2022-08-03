<?php

namespace App\Http\Controllers;

use App\Http\Requests\CountryCreateRequest;
use App\Models\MstCountry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MstCountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = MstCountry::with('states')->get();
        return view('countries.index', compact('countries'));
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
    public function store(CountryCreateRequest $request)
    {
        $country = MstCountry::create($request->validated());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MstCountry  $mstCountry
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $country = MstCountry::where('id', $id)->firstOrFail();
        } catch (\Exception $ex) {
            if ($ex instanceof \Illuminate\Database\Eloquent\ModelNotFoundException) {
                dd('Country Record Not Found..');
            }
            dd('Whooops, Something Went Wrong !');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MstCountry  $mstCountry
     * @return \Illuminate\Http\Response
     */
    public function edit(MstCountry $mstCountry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MstCountry  $mstCountry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MstCountry $mstCountry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MstCountry  $mstCountry
     * @return \Illuminate\Http\Response
     */
    public function destroy(MstCountry $mstCountry)
    {
        //
    }
}

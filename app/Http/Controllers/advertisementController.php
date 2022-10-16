<?php

namespace App\Http\Controllers;

use App\Models\advertisements;
use Illuminate\Http\Request;

class advertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(advertisements::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     $user = $request->user();
         if (
             $advertisements = advertisements::create(
                 [
                 'typeof'=> $request-> typeof,
                  'salary' => $request->salary,
                 'place' => $request ->place,
                  'description' => $request ->description,
                 ]
                  )
                 )
                 {
                     return $advertisements;
                }

      //  $advertisements=new Advertisements;
       // $advertisements->typeof=$request->typeof;
       // $advertisements->salary=$request->salary;
        //$advertisements->place=$request->place;
        ////$advertisements->description=$request->description;

        $advertisements->save();
        return $advertisements;
            }
    /*
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $advertisements = advertisements::findorFail($id);
        return $advertisements;

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
        $advertisements = advertisements::findorFail($id);
        if ($advertisements->update($request->all())) {
            return response()->json([
                'success'=> 'mis a jour du job' ],200);
        }
        $advertisements->update($request->all());
        return response($advertisements,200);
        }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $advertisements = advertisements::find($id);
        if (is_null($advertisements)){
            return response()->json(['failed!'=> 'undefined' ],200);
            
        }$advertisements->delete();
            return response(null,200);
        }
        
    }

//  public function showmyadvertisements(Request $request , $id)
// {
//     return advertisements::where($id, $request->user()->id)->get();
// }


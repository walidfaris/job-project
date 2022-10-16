<?php

namespace App\Http\Controllers;

use App\Models\job_application;
use Illuminate\Http\Request;

class jobapplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(job_application::all());
    }

    /** 
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $job_application=new job_application;
        
         $job_application->firstname=$request->firstname;
         $job_application->lastname=$request->lastname;
         $job_application->age=$request->age;
         $job_application->number=$request->number;
         $job_application->mail=$request->mail;
        // $job_application = $request->job_application();
        //  if (
        //      $job_application = job_application::create(
        //          [
        //          'firstname'=> $request-> firstname,
        //           'lastname' => $request->lastname,
        //          'age' => $request ->age,
        //           'number' => $request ->number,
        //           'mail'=>$request ->mail,
        //          ]
        //           )
        //          )
        //          {
        //              return $job_application;
        //         }
    

            $job_application->save();
               return response ($job_application,200);
            }
     
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
    $job_application = job_application::find($id);
    if (is_null($job_application)){
        return response()->json( ['done'=>'offer has been deleted'],200);
    }
    $job_application->delete();
    return response(null,200);
    }

}
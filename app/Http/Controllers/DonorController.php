<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Donor;


class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $donors = Donor::all();
         $bloods = ['A+', 'B+', 'O+', 'AB+', 'A-', 'B-', 'O-', 'AB-'];
        $counts= array();
           foreach($bloods as $blood){
            array_push($counts, $blood = [
                    'title' => $blood,
                    'count' => Donor::where([['blood_group', $blood], ['confirmed', 1]])->count()
                ]
            );
        }
        return view('admin.index', compact(['donors','counts']));
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
    public function store(Request $request, Donor $donor)
    {
        //
        $validated = $request->validate([
            'name'  => ['required', 'min:4'],
            'location'  => ['required', 'min:4'],
            'city'  => ['required', 'min:4'],
            'email'  => ['email', 'unique:donors'],
            'mobile'  => ['required', 'unique:donors', 'min:9'],
            'blood_group'  => ['required', 'in:A+,A-,B+,B-,O+,O-,AB+, AB-'],
        ]);
         array_push($validated,['confirmed' => 1]);
        $donor->create($validated);
        return redirect('/admin')->withSuccess('Donor Successfullly added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $donor = Donor::findOrFail($id);
        //return $donor;
        return view('admin.edit', compact('donor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Donor $donor, $id)
    {
            if(Request()->confirmed == 1){
                //$validator
                $donor = $donor::findOrFail($id);
                $donor->update([
                    'confirmed' => 1
                ]); 
                return redirect('/admin')->withSuccess('Donor Successfullly Updated');
            }else{

            $validated = Request()->validate([
            'name'  => ['required', 'min:4'],
            'location'  => ['required', 'min:4'],
            'city'  => ['required', 'min:4'],
            'email'  => ['required','email'],
            'mobile'  => ['required', 'min:9'],
            'blood_group'  => ['required', 'in:A+,A-,B+,B-,O+,O-,AB+, AB-'],
        ]);
        $donor = $donor::findOrFail($id);
        $donor->update($validated);
        return redirect('/admin')->withSuccess('Donor Successfullly Updated');

            }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $donor= Donor::findOrFail($id)->delete();
        return redirect('/admin')->withSuccess('Donor Successfullly Deleted');
    }
}

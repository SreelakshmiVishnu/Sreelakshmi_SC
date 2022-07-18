<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use App\Models\Candidate;
use Hash;

class CandidateController extends Controller
{
    public function store()
    {
        return view('can_register');
    } 
    public function view()
    {
        $data = Candidate::all();
        //dd($data);
        return view('can_view',compact('data'));
    }  
    public function storeData(Request $request)
    {
        //dd("hii");
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'file' => 'required',
        ]);
        
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $dob = $request->dob;
        $address = $request->address;
        $file = $request->file('file')->getClientOriginalName();
 
        $path = $request->file('file')->store('public/files');
 
        $candidate = new Candidate;
 
            $candidate->file = $file;
            $candidate->file_path = $path;
            $candidate->name = $name;
            $candidate->email = $email;
            $candidate->phone = $phone;
            $candidate->dob = $dob;
            $candidate->address = $address;
            
            //dd($candidate);
            $candidate->save();
            return back()
            ->with('success','Data has been uploaded.');
        
            
        
    }

    public function show(Candidate $candidate)
    {
        return view('candidate_show',compact('candidate'));
    }
    public function edit(Candidate $candidate)
    {
        return view('candidate_edit',compact('candidate'));
    }



    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
    
        return view('dashboard');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'file' => 'required',
            ]);
            $candidate = Candidate::find($id);
            //dd($candidate);
            $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $dob = $request->dob;
        $address = $request->address;
        $file = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->store('public/files');


            $candidate->file = $file;
            $candidate->file_path = $path;
            $candidate->name = $name;
            $candidate->email = $email;
            $candidate->phone = $phone;
            $candidate->dob = $dob;
            $candidate->address = $address;
            $candidate->save();
     
        return view('dashboard')
                        ->with('success','created successfully.');
    }

    
}


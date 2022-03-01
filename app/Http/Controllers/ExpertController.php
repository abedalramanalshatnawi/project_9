<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Expert;
use App\Http\Requests\StoreExpertRequest;
use App\Http\Requests\UpdateExpertRequest;

class ExpertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $experts = Expert::all();
        return view('dashboard.experts.index', compact('experts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.experts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreExpertRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('expert_img')){
            $file = $request->expert_img;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads', $new_file);
        }

        Expert::create([
            'expert_name'     => $request->expert_name,
            'email'           => $request->email,
            'password'        => $request->password,
            'bio'             => $request->bio,
            'certifications'  => $request->certifications,
            'experience'      => $request->experience,
            'price_per_hours' => $request->price_per_hours,
            'expert_img'      => './uploads/' . $new_file,
        ]);
        
        return redirect()->route('expert.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function show(Expert $expert)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editExpert = Expert::find($id);
        return view('dashboard.experts.edite', compact('editExpert'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateExpertRequest  $request
     * @param  \App\Models\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expertUpdate = Expert::find($id);
        if($request->hasFile('expert_img')){
            $file = $request->expert_img;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads', $new_file);
            $expertUpdate->expert_img =  './uploads/' . $new_file ;

        }
        $expertUpdate->expert_name     = $request->expert_name ;
        $expertUpdate->email           = $request->email ;
        $expertUpdate->password        = $request->password ;
        $expertUpdate->bio             = $request->bio ;
        $expertUpdate->certifications  = $request->certifications ;
        $expertUpdate->experience      = $request->experience ;
        $expertUpdate->price_per_hours = $request->price_per_hours ;
        
        $expertUpdate->update();
        return redirect()->route('expert.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Expert  $expert
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expertDestroy = Expert::find($id);
        $expertDestroy->destroy($id);
        return redirect()->route('expert.index');
    }
}

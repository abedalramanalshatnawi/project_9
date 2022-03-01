<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Http\Requests\StoreConsultationRequest;
use App\Http\Requests\UpdateConsultationRequest;
use App\Models\Category;
use Illuminate\Http\Request;

use App\Models\Expert;

class ConsultationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $consultations = Consultation::all();
        return view('dashboard.consultations.index', compact('consultations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $experts = Expert::all();
        $categories = Category::all();
        return view('dashboard.consultations.create', compact('experts', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreConsultationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('consultation_img')){
            $file = $request->consultation_img;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads', $new_file);
        }
        Consultation::create([
            'consultation_name'  => $request->consultation_name,
            'title'              => $request->title,
            'description'        => $request->description,
            'expert_id'          => $request->expert_id,
            'category_id'        => $request->category_id,
            'consultation_img'   => './uploads/' . $new_file,
        ]);
        return redirect()->route('consultation.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function show(Consultation $consultation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $editConsultation = Consultation::find($id);
        return view('dashboard.consultations.edit', compact('editConsultation', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateConsultationRequest  $request
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $consultationUpdate = Consultation::find($id);
        if($request->hasFile('consultation_img')){
            $file = $request->consultation_img;
            $new_file = time() . $file->getClientOriginalName();
            $file->move('uploads', $new_file);
            $consultationUpdate->consultation_img =  './uploads/' . $new_file ;

        }
        $consultationUpdate->consultation_name     = $request->consultation_name;
        $consultationUpdate->title           = $request->title;
        $consultationUpdate->description           = $request->description;
        $consultationUpdate->category_id        = $request->category_id ;
        $consultationUpdate->expert_id        = $request->expert_id ;
        $consultationUpdate->update();
        return redirect()->route('consultation.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Consultation  $consultation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroyConsultation = Consultation::find($id);
        $destroyConsultation->destroy($id);
        return redirect()->route('consultation.index');
    }
}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\Subscription;
use App\Models\Consultation;
use App\Models\User;

use App\Http\Requests\StoreSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;

class SubscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscriptions = Subscription::all();
        return view('dashboard.subscriptions.index', compact('subscriptions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $consultations = Consultation::all();
        $users = User::all();
        return view('dashboard.subscriptions.create', compact('consultations','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreSubscriptionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        Subscription::create([
            'type'             => $request->type,
            'total_price'      => $request->total_price,
            'user_id'          => $request->user_id,
            'consultation_id'  => $request->consultation_id,
        ]);
        return redirect()->route('subscription.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function show(Subscription $subscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editSubscription = Subscription::find($id);
        return view('dashboard.subscriptions.edit', compact('editSubscription'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSubscriptionRequest  $request
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $subscriptionUpdate = Subscription::find($id);

        $subscriptionUpdate->type            = $request->type;
        $subscriptionUpdate->total_price     = $request->total_price;
        $subscriptionUpdate->user_id         = $request->user_id;
        $subscriptionUpdate->consultation_id = $request->consultation_id ;
        $subscriptionUpdate->update();
        return redirect()->route('subscription.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscription  $subscription
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroySubscription = Subscription::find($id);
        $destroySubscription->destroy($id);
        return redirect()->route('subscription.index');
    }
}

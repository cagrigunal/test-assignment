<?php

namespace App\Http\Controllers\Api;

use App\Helpers\SubscriberState;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\SubscriberRequest;
use App\Http\Resources\SubscriberResource;
use App\Models\FieldValue;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Resource_;
use Throwable;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subscribers = SubscriberResource::collection(Subscriber::all());

        return response()->json([
            'status' => true,
            'subscribers' => $subscribers
        ]);
    }

  
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubscriberRequest $request)
    {

        $subscriber = Subscriber::create(['name' => $request->name, 'email' => $request->email, 'state' => SubscriberState::SUBSCRIBER_STATE["active"]]);
        if($request->has("fieldValues")){
            foreach($request->fieldValues as $key => $value){
                FieldValue::create(['subscriber_id'=> $subscriber->id, 'title'=>$key , 'value'=>$value]);
            }
        }
            
      
        return response()->json([
            'status' => true,
            'message' => "Subscriber Created successfully!",
            'subscriber' => $subscriber
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
    
        $subscriber = Subscriber::find($subscriber->id);
       
        $subscriber = new SubscriberResource($subscriber);
        return response()->json([
            'status' => true,
            'message' => "Subscriber found!",
            'subscriber' => $subscriber
        ], 200);
    }

 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriberRequest $request, Subscriber $subscriber)
    {
        $subscriber->update($request->all());

        return response()->json([
            'status' => true,
            'message' => "Subscriber Updated successfully!",
            'subscriber' => $subscriber
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return response()->json([
            'status' => true,
            'message' => "Subscriber Deleted successfully!",
        ], 200);
    }
}

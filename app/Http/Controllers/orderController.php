<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use App\Mail\orderConfirmation;
use Illuminate\Support\Facades\App;
use Throwable;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        $validated = $request->validate([
            'address' => 'required',
            'city' => 'required',
            'country' => 'required',
            'name' => 'required',
            'surname' => 'required',
            'phoneNumber' => 'required',
        ]);
        if($request->setNewAddress){
            $validatedNew = $request->validate([
                'newAddress.address' => 'required',
                'newAddress.city' => 'required',
                'newAddress.country' => 'required',
                'newAddress.postCode' => 'required',
            ]);
        }
        $orderCode = Str::random(12);
        order::create([
            'name'=>$request->name,
            'order_code'=>$orderCode,
            'surname'=>$request->surname,
            'country'=> $request->country,
            'address' => $request->address,
            'postCode' => $request->postCode,
            'city' => $request->city,
            'phoneNumber'=> $request->phoneNumber,
            'price'=>$request->cena,
            'username'=>$request->newAccount ? $request->username : null,
            'password'=>$request->newAccount ? Hash::make($request->password):null,
            'delivery_country'=>$request->setNewAddress ? $request->newAddress['country'] : null,
            'delivery_address'=>$request->setNewAddress ? $request->newAddress['address']:null,
            'delivery_postCode'=>$request->setNewAddress ? $request->newAddress['postCode']:null,
            'delivery_city'=>$request->setNewAddress ? $request->newAddress['city']:null,
            'delivery_method'=>$request->delivery,
            'payment_method'=>$request->payment,
            'promo_code'=>$request->code,
            'comment'=>$request->comment,
        ]);
        //email
        $details = $request;
        $details['order_code'] = $orderCode;
        if(config('mail.mailers.smtp.password')!='' && config('mail.mailers.smtp.password') != null){
            Mail::to($request->email)->send(new orderConfirmation($details));
            $details['mail_send']=true;
        }else{
            $details['mail_send']=false;
        }
        return $details;
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
        //
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
        //
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
    }
}

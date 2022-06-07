<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use Illuminate\Support\Str;

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
        // if($request->setNewAddress){
        //     $validatedNew = $request->validate([
        //         'newAddress.address' => 'required',
        //         'newAddress.city' => 'required',
        //         'newAddress.country' => 'required',
        //         'newAddress.name' => 'required',
        //         'newAddress.surname' => 'required',
        //     ]);
        // }
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
            'price'=>120
        ]);
        return $orderCode;
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

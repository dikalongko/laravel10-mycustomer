<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer = Customer::all();

        return response()->json([
            'message' => "List All Customers",
            'data' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'address' => 'required',
        ]);

        $customer = Customer::create($data);

        return response()->json([
            'message' => "Customer was added succesfully",
            'data' => $customer,
        ], 200);
    } 

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return response()->json([
            'message' => "Show Customer",
            'data' => $customer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'name' => 'required',
            'email' => 'required',
            'telephone' => 'required',
            'address' => 'required',
        ]);

        $customer->update($data);

        return response()->json([
            'message' => "Customer was update succesfully",
            'data' => $customer,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();

        return response()->json([
            'message' => "Customer was deleted",
        ],200);
    }
}

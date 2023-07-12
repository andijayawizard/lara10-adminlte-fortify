<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer=Customer::orderBy('id', 'desc')->paginate(10);
        return view('customers.index', compact('customer'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);
        Customer::create($request->post());
        return redirect()->route('customers.index')->with('success', 'data added');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Customer $customer)
    {
        $request->validate([
            'nama'=>'required',
            'email'=>'required',
            'phone'=>'required',
        ]);
        $customer->fill($request->post())->save();
        return redirect()->route('customers.index')->with('success', 'data updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'data deleted');
    }
}

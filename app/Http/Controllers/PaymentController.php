<?php

namespace App\Http\Controllers;

use App\Models\Enrollment;
use App\Models\Payment;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() :View
    {
        $payments = Payment::all();
        return view('payments.index')->with('payments', $payments);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() :View
    {
        $enrollment = Enrollment::pluck('enroll_no','id');
        return view('payments.create', compact('enrollment'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
       $input = $request->all();
       Payment::create($input);
       return redirect('payments')->with('flash message','payments added successfully');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id) :View
    {
        $payments = Payment::find($id);
        return view('payments.show')->with('payments', $payments);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id) :View
    {
        
        $payments = Payment::find($id);
        $enrollment = Enrollment::pluck('enroll_no',"id");
        return view('payments.edite', compact('payments','enrollment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) :RedirectResponse
    {
        $payments = Payment::find($id);
        $input = $request->all();
        $payments->update($input);
        return redirect('payments')->with('flash_message','Payment updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) :RedirectResponse
    {
        Payment::destroy($id);
        return redirect('payments')->with('flash_message','delete Payemnt successfully');
    }
}

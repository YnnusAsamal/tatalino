<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    

        $query = Customer::query();

    
    if ($request->has('search')) {
        $searchTerm = $request->input('search');
        $query->where(function ($q) use ($searchTerm) {
            $q->where('firstname', 'like', "%$searchTerm%")
            ->orWhere('lastname', 'like', "%$searchTerm%")
            ->orwhere('address2', 'like', "%$searchTerm%")
            ->orWhere('contactNumber', 'like', "%$searchTerm%")
            ->orWhere('meterNumber', 'like', "%$searchTerm%");
        });

    }

    $customers = $query->get();

    $title = 'Delete Customer!';
    $text = "Are you sure you want to delete?";
    confirmDelete($title, $text);

    return view('customers.index', compact('customers'));
    }


    public function filter(Request $request)
    {
        $selectedPurok = $request->input('address2');

        // Fetch data based on the selected Purok
        $customers = Customer::when($selectedPurok, function ($query) use ($selectedPurok) {
            return $query->where('address2', $selectedPurok);
        })->get();

        return view('customers.index', compact('customers'));
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
        $userLog = Auth::user();
        $customers = new Customer();
        $customers->lastname=$request->Input('lastname');
        $customers->firstname=$request->Input('firstname');
        $customers->middlename=$request->Input('middlename');
        $customers->dob='0';
        $customers->address=$request->Input('address');
        $customers->address2=$request->Input('address2');
        $customers->contactNumber = '+63' . $request->input('contactNumber');
        $customers->meterNumber=$request->Input('meterNumber');
        $customers->status=$request->Input('status');
        $customers->save();
        $userLog->log("Added a new costumer");
        Alert::success('Added a new Customer', '');
        return redirect()->route('customers.index');

        
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
        $customers = Customer::find($id);

        return view('customers.edit', compact('customers'));
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
        
        $userLog = Auth::user();
        $customers = Customer::findOrFail($id);

        $customers->lastname=$request->Input('lastname');
        $customers->firstname=$request->Input('firstname');
        $customers->middlename=$request->Input('middlename');
        $customers->dob='0';
        $customers->address=$request->Input('address');
        $customers->address2=$request->Input('address2');
        $customers->contactNumber=$request->Input('contactNumber');
        $customers->meterNumber=$request->Input('meterNumber');
        $customers->status=$request->Input('status');
        $customers->update();
        $userLog->log("Updated a costumer");
        Alert::success('Updated Customer', '');
        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $userLog = Auth::user();
        Customer::findOrFail($id)->delete();
        
        $userLog->log("Deleted a costumer");
        Alert::success('Deleted Successfully');
        return redirect()->route('customers.index');
    }
}

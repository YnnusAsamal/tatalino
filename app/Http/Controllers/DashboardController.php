<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Research;
use App\Models\User;
use App\Models\Cost;
use App\Models\Customer;
use App\Models\Consumption;
use App\Notifications\ResearchNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
     
        $research = Research::count();
        $ongoing = Research::where('researchStatus', '=', 'Ongoing')->count();
        $complete = Research::where('researchStatus', '=', 'Completed')->count();
        $users = User::count();
        
        $eng = Research::where('department','=','College of Engineering')->count();
        $teach = Research::where('department', '=', 'College of Teacher Education')->count();

        $adminacc = Research::where('department', '=', 'College of Administration and Accountancy')->count();
        $hos = Research::where('department', '=', 'College of Hospitality Management Tourism')->count();
        $it = Research::where('department', '=', 'College of Industrial Technology')->count();
        $com = Research::where('department', '=', 'College of Computer Studies')->count();
        $crim = Research::where('department', '=', 'College of Criminal Justice Education')->count();
        $art = Research::where('department', '=', 'College of Art and Sciences')->count();

        
        
        
        // $ceng = Research::where([['department','=','College of Engineering'],['researchStatus','=','Ongoing']])->count();
        //

        $costs = Cost::all();
        $customers = Customer::where('status', 'Active')->count();
        $sumPaidAmount = Consumption::where('statusCons', 'paid')->sum('amountCons');

        return view('dashboard', compact('sumPaidAmount','costs','customers','research', 'users', 'ongoing','complete', 'eng','teach','adminacc','hos', 'it','com','crim','art'));
      
        // return view('dashboard', compact('research', 'users','ongoing','complete'));
       
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
        //
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

    public function barChart()
    {
       
    }

    public function markNotification(Request $request,$id)
    {
        auth()->user()
            ->unreadNotifications
            ->when($request->input('id'), function ($query) use ($request) {
                return $query->where('id', $request->input('id'));
            })
            ->markAsRead();

        return response()->noContent();
    }
}

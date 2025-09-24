<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Consumption;
use App\Models\Customer;
use App\Models\Cost;
use GuzzleHttp\Client;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;



class ConsumptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $customers = Customer::all();
        $consumptions = Consumption::orderBy('created_at', 'desc')->get();
    
        $title = 'Delete Customer!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);

        $filteredConsumptions = $consumptions;
        $selectedYear = null;
        $selectedMonth = null;
        $selectedCustomer = null;
    
   
        if ($request->has('year') && $request->has('month')) {
            
            $selectedYear = $request->input('year');
            $selectedMonth = $request->input('month');
    
         
            $filteredConsumptions = Consumption::byMonth($selectedYear, $selectedMonth)->get();
        }
    
       
        if ($request->has('customer')) {
            
            $selectedCustomer = $request->input('customer');
    
       
            $filteredConsumptions = $filteredConsumptions->where('customer_id', $selectedCustomer);
        }
    
        return view('consumptions.index', [
            'consumptions' => $consumptions,
            'filteredConsumptions' => $filteredConsumptions,
            'selectedYear' => $selectedYear,
            'selectedMonth' => $selectedMonth,
            'selectedCustomer' => $selectedCustomer,
            'customers' => $customers,
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::where('status', '=','Active')->get();

        return view('consumptions.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function storeSingle(Request $request)
    {
        $userLog = Auth::user();

        $costs = Cost::pluck('cost')->first();

        $vonageApiKey = '8357998c';
        $vonageApiSecret = 'h369A5vfm5Tw4H9g';

        $consumptions = new Consumption();
        $httpClient = new Client();

        $consumptions->customer_id=$request->Input('customer_id');
        $consumptions->referenceNum= 'WB-'.rand(1111,9999);
        $consumptions->dateCons=$request->Input('dateCons');
        $consumptions->meterNumber=$request->Input('meterNumber');
        $consumptions->contactNumber=$request->Input('contactNumber');
        $consumptions->totalCons=$request->Input('totalCons');
        $consumptions->amountCons = $consumptions->totalCons * $costs;
        $consumptions->statusCons = 'Unpaid';
        $consumptions->save();
        $userLog->log("Added a new consumption");

        $message = "Welcome to Tumbaga 1 Water System, Hello {$consumptions->customer->firstname} {$consumptions->customer->lastname}, your current reading is Php {$consumptions->amountCons}.00,  Thank you!";
        
        $response = $httpClient->post('https://rest.nexmo.com/sms/json', 
        [
            'form_params' => [
                'api_key' => $vonageApiKey,
                'api_secret' => $vonageApiSecret,
                'to' => $consumptions->customer->contactNumber,
                'from' => '+639288154947',
                'text' => $message,
            ],
        ]);

        $responseBody = $response->getBody()->getContents();

        Alert::success('Successfully added consumption');
        return redirect()->route('consumptions.index');


    }
    public function store(Request $request)
    {
        
        $costs = Cost::pluck('cost')->first();
        $userLog = Auth::user();
        $vonageApiKey = '8357998c';
        $vonageApiSecret = 'h369A5vfm5Tw4H9g';
        
        $validatedData = $request->validate([
            'customer_id' => 'required',
            'dateCons' => 'required',
            'meterNumber' => 'required|array',
            'contactNumber' => 'required|array',
            'totalCons' => 'required|array',
        ]);
        
        $customer_id = $validatedData['customer_id'];
        $dateCons = $validatedData['dateCons'];
        $meterNumber = $validatedData['meterNumber'];
        $contactNumber = $validatedData['contactNumber'];
        $totalCons = $validatedData['totalCons'];
        
        $httpClient = new Client();
        
        foreach ($totalCons as $userId => $total) {
            $user = Customer::find($userId);
        
            if ($user) {
                $amountCons = $total * $costs;
        
                $user->consumptions()->create([
                    'customer_id' => $customer_id,
                    'referenceNum' =>('WB-').rand(1111,9999),
                    'dateCons' => $dateCons[$userId],
                    'meterNumber' => $meterNumber[$userId],
                    'contactNumber' => $contactNumber[$userId],
                    'totalCons' => $total,
                    'amountCons' => $amountCons,

                    
                ]);
                $message = "Welcome to Water Billing System, Hello {$user->firstname} {$user->lastname}, your current reading is {$amountCons}. Thank you!";
        
                $response = $httpClient->post('https://rest.nexmo.com/sms/json', 
                [
                    'form_params' => [
                        'api_key' => $vonageApiKey,
                        'api_secret' => $vonageApiSecret,
                        'to' => $user->contactNumber,
                        'from' => '+639288154947',
                        'text' => $message,
                    ],
                ]);
        
                $responseBody = $response->getBody()->getContents();
            }
               
        }
        $userLog->log("Added a new consumption");
        Alert::success('Successfully added consumption');
        return redirect()->route('consumptions.index');

    }

    public function getCustomerInfo($customerId)
    {
        // Query the customer based on the provided $customerId
        $customer = Customer::find($customerId);

        if (!$customer) {
            return Response::json(['error' => 'Customer not found'], 404);
        }

        // You can customize the data you want to return here
        $customerInfo = [
            'meterNumber' => $customer->meterNumber,
            'contactNumber' => $customer->contactNumber,
            // Add more fields as needed
        ];

        return Response::json($customerInfo);
    }

    // public function store(Request $request)
    // {
    //     $data = $request->all();
    //     $twilioSid = 'your_twilio_sid';
    //     $twilioToken = 'your_twilio_token';
    //     $twilioFromNumber = 'your_twilio_phone_number';

    //     $twilio = new Client($twilioSid, $twilioToken);

    //     foreach ($data['dateCons'] as $customerId => $date) {
    //         $customer = Customer::find($customerId);

    //         $newRecord = [
    //             'date' => $date,
    //             'total_cons' => $data['totalCons'][$customerId],
    //             'remarks' => $data['remarks'][$customerId],
    //             // Add other fields here that you want to store
    //         ];

    //         $consumption = $customer->consumptions()->create($newRecord);

    //         // Send SMS notification
    //         $message = "Hello {$customer->firstname}, your current reading is {$consumption->total_cons}. Thank you!";
            
    //         $twilio->messages->create(
    //             $customer->contactNumber, // Customer's phone number
    //             [
    //                 'from' => $twilioFromNumber,
    //                 'body' => $message,
    //             ]
    //         );
    //     }

    //     return redirect()->route('customers.index')->with('success', 'Data has been stored successfully and SMS notifications sent.');
    // }
    
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $consumptions = Consumption::findOrFail($id);

        $prevCons = Consumption::where('customer_id', $consumptions->customer_id)
        ->where('id', '<', $consumptions->id) // Fetch only the consumptions with IDs less than the selected consumption
        ->orderBy('id', 'desc') // Order by ID in descending order to get the previous consumption
        ->get();

        $prevConsChart = $prevCons->sortBy('dateCons')->take(12); // Get last 12 records sorted by date

        $monthlyConsumption = $prevConsChart->groupBy(function ($item) {
            return Carbon::parse($item->dateCons)->format('Y-m'); // Convert to DateTime and then format
        })->map(function ($group) {
            return $group->sum('amountCons'); // Calculate sum of consumption for each month
        });

        $chartLabels = $monthlyConsumption->keys()->toArray();
        $chartValues = $monthlyConsumption->values()->toArray();
    
        return view('consumptions.show', compact('consumptions','prevCons','monthlyConsumption','prevConsChart'));
    }

    public function showByCustomerId($customerId)
    {
        // Retrieve all data with the same customer_id
        $filteredConsumptions = Consumption::where('customer_id', $customerId)->get();
        
        // Pass the data to the view
        return view('consumptions.show_by_customer_id', compact('filteredConsumptions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consumptions = Consumption::findOrFail($id);

        return view('consumptions.edit', compact('consumptions'));
    }

    /**
     * Update the specified resour  ce in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $costs = Cost::pluck('cost')->first();
        $userLog = Auth::user();
        $consumptions = Consumption::findOrFail($id);

        $consumptions->totalCons=$request->Input('totalCons');  
        $consumptions->amountCons=$consumptions->totalCons * $costs;
        $consumptions->update();
        $userLog->log("Updated consumption");
        Alert::success('Successfully updated consumption');
        return redirect()->route('consumptions.index');
    }

    public function paymentShow($id)
    {
        $consumptions = Consumption::find($id);

        return view('consumptions.payment', compact('consumptions'));
    }
    public function payment(Request $request, $id)
    {
        $userLog = Auth::user();
        $consumptions = Consumption::find($id);
        $consumptions->paidCons = $request->Input('paidCons');
        $consumptions->statusCons = 'Paid';
        $consumptions->datePayment = $request->Input('datePayment');
        $consumptions->update();
        $userLog->log("Updated Payment");
        Alert::success('Payment successfully updated');
        return redirect()->route('consumptions.index');
    }

    // public function monthlyReport()
    // {
    //     $totalConsumption = Consumption::sum('amountCons');
        
    //     $currentMonth = Carbon::now()->month;
    //     $currentYear = Carbon::now()->year;

    //     $totalConsumptionMonthly  = Consumption::whereMonth('dateCons', $currentMonth)
    //         ->whereYear('dateCons', $currentYear)
    //         ->sum('amountCons');

    //         $monthlyData = DB::table('consumptions')
    //         ->select(DB::raw('YEAR(dateCons) as year, MONTH(dateCons) as month, SUM(amountCons) as total'))
    //         ->groupBy(DB::raw('YEAR(dateCons), MONTH(dateCons)'))
    //         ->orderBy('year', 'asc')
    //         ->orderBy('month', 'asc')
    //         ->get();

    //     $labels = [];
    //     $data = [];

    //     foreach ($monthlyData as $entry) {
    //         $labels[] = Carbon::createFromDate($entry->year, $entry->month)->format('M Y');
    //         $data[] = $entry->total;
    //     }

    //     return view('consumptions.monthly_report', compact('labels', 'data','totalConsumption','totalConsumptionMonthly'));
    // }

    public function monthlyReport(Request $request)
    {
        $selectedYear = $request->input('year', Carbon::now()->year);

        // Total consumption for the selected year
        $totalConsumptionYearly = Consumption::whereYear('dateCons', $selectedYear)->sum('amountCons');

        // Monthly consumption for the selected year
        $monthlyData = DB::table('consumptions')
            ->select(DB::raw('YEAR(dateCons) as year, MONTH(dateCons) as month, SUM(amountCons) as total'))
            ->whereYear('dateCons', $selectedYear)
            ->groupBy(DB::raw('YEAR(dateCons), MONTH(dateCons)'))
            ->orderBy('year', 'asc')
            ->orderBy('month', 'asc')
            ->get();

        $labels = [];
        $data = [];

        foreach ($monthlyData as $entry) {
            $labels[] = Carbon::createFromDate($entry->year, $entry->month)->format('M Y');
            $data[] = $entry->total;
        }

        // Find the month with the highest sales
    $topMonth = $monthlyData->max('total');
    $topMonthData = $monthlyData->where('total', $topMonth)->first();
    $topMonthName = Carbon::createFromDate($topMonthData->year, $topMonthData->month)->format('M Y');

        // List of years to populate the select dropdown
        $years = Consumption::select(DB::raw('YEAR(dateCons) as year'))
            ->groupBy('year')
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('consumptions.monthly_report', compact('labels', 'data', 'totalConsumptionYearly', 'years', 'selectedYear', 'topMonthName', 'topMonth'));
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
        
        Consumption::find($id)->delete();

        $userLog->log("Deleted a consumption");
        Alert::success('Deleted Successfully');
        return redirect()->route('consumptions.index');
    }
}

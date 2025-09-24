<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Asset;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)

    {
        $search = $request->get('search');
        $supplies = DB::table('assets')->where('assetId', 'like','%' .$search. '%')->paginate(10);
        return view('assets.supplies.index', ['supplies' => $supplies])

            ->with('i', ($request->input('page', 1) - 1) * 10);
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
        $user = Auth::user();
        $id = IdGenerator::generate(['table' => 'assets','field' =>'assetId', 'length' => 12, 'prefix' =>('NTRL-ASS-')]);

        $this->validate($request,[
            'assetEntity'=>'required',
            'assetDescription'=>'required',
            'assetPackageDetails'=>'required',
            'assetCategory'=>'required',
            'assetUnitofMeasure'=>'required',
            'assetLocation'=>'required',
        ]);

        $supplies = new Asset();
        $supplies->assetId=$id;
        $supplies->assetEntity= $request->Input('assetEntity');
        $supplies->assetDescription= $request->Input('assetDescription');
        $supplies->assetPackageDetails= $request->Input('assetPackageDetails');
        $supplies->assetCategory= $request->Input('assetCategory');
        $supplies->assetUnitofMeasure= $request->Input('assetUnitofMeasure');
        $supplies->assetCurrentStock= $request->Input('assetCurrentStock');
        $supplies->assetLocation= $request->Input('assetLocation');
        $supplies->assetExp= $request->Input('assetExp');
        $supplies->assetBufferLevel= $request->Input('assetBufferLevel');
        $supplies->save();

        $user->log("added asset");

        return redirect()->route('supplies.index')->with('message','Added new asset succesfuly');

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

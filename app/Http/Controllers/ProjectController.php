<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->get('search');
        $projects = DB::table('projects')->where('projectId', 'like','%' .$search. '%')->paginate(10);
        return view('projects.index', ['projects' => $projects])

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
        $this->validate($request, [
            'projectName' => 'required',
            'projectDetails' => 'required',
            'projectPrice' => 'required',
            'projectStart' => 'required',
            'projectEnd' => 'required',
            'user_id' => 'required'
            
        ]);

        $user = Auth::user();
        $id = IdGenerator::generate(['table' => 'projects','field' =>'projectId', 'length' => 12, 'prefix' =>('Pro-2022-')]);

        $projects = new Project();

        $projects->projectId=$id;
        $projects->projectName=$request->Input('projectName');
        $projects->projectDetails=$request->Input('projectDetails');
        $projects->projectPrice=$request->Input('projectPrice');
        $projects->user_id=$request->Input('user_id');
        $projects->projectStatus=$request->Input('projectStatus');
        $projects->projectStart=$request->Input('projectStart');
        $projects->projectEnd=$request->Input('projectEnd');

        $projects->save();

        $user->log("added project");

        return redirect()->route('projects.index')->with('success','New project added succesfuly');
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
        $projects=Project::find($id);

        return view('projects.edit', compact('projects'));
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
        $this->validate($request, [
            'projectName' => 'required',
            'projectDetails' => 'required',
            'projectPrice' => 'required',
            'user_id' => 'required'
            
        ]);

        $user = Auth::user();

        $projects = Project::find($id);

        $projects->projectName=$request->Input('projectName');
        $projects->projectDetails=$request->Input('projectDetails');
        $projects->projectPrice=$request->Input('projectPrice');
        $projects->user_id=$request->Input('user_id');
        $projects->projectStatus=$request->Input('projectStatus');
        $projects->projectStart=$request->Input('projectStart');
        $projects->projectEnd=$request->Input('projectEnd');

        $projects->save();

        $user->log("edited project");

        return redirect()->route('projects.index')->with('success','Project edited succesfully');
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

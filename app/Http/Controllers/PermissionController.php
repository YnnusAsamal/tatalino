<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{


    function __construct()
    {
         
         $this->middleware('permission:permission-create', ['only' => ['create','store']]);
         
    }

    
    public function create()
    {
        $permissions = Permission::pluck('name', 'name')->all();
        return view('permissions.create',compact('permissions'));
    }
    
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|unique:permissions,name',
            
        ]);

        $permissions = Permission::create(['name'=> $request->input('name')]);
    

        return redirect()->route('permissions.index')
                        ->with('success'.'Permission created successfully');
    }

    public function edit($id)
    {
        $permissions = Permission::find($id);

        return view('permissions.edit', compact('permissions'));
    }

    public function update(Request $request, $id)
    {

        $this->validate($request, ['name' => 'required',]);

        $input = $request->all();
        

        $permissions = Permission::find($id);
        $permissions->update($input);

        return redirect()->route('permissions.index')
                        ->with('success','Permission updated successfully');
    }
    public function index(Request $request)
    {
        

    
        $permissions = Permission::where([
            ['name', '!=', Null],
            [function ($query) use ($request) {
                if(($term = $request->term)) {
                    $query->orWhere('name', 'LIKE', '%' . $term . '%')->get();
                }
            }]
        ])


                ->orderBy("id","desc")
                ->paginate(10);



                return view('permissions.index', compact('permissions'))
                    ->with('i', ($request->input('page', 1) -1) * 5);

    }

    public function destroy($id)
    {
        DB::table("permissions")->where('id',$id)->delete();
        return redirect()->route('permissions.index')
                        ->with('success','Permissions deleted successfully');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\AuditTrail;
use DB;

class AuditController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->get('search');
        
        $audit_trails = DB::table('audit_trails')->where('name', 'like','%' .$search. '%')->paginate(10);
        return view('logs.index', ['audit_trails' => $audit_trails])
        ->with('i', ($request->input('page', 1) - 1) * 10);
        
        // AuditTrail::all();

        // return view('logs.index', compact('audit_trails'));
    }
}

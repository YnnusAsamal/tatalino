<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Research;

class PdfController extends Controller
{
    public function index()
    {
        $userDep = Auth::user()->department;
        $researchs= Research::where('department', $userDep)->get();

        return view('pdf.index', compact('userDep', 'researchs'));
    }

    public function exportPdf() 
    {
        $pdf = PDF::loadView('pdf.index'); // <--- load your view into theDOM wrapper;
        $path = public_path('pdf_docs/'); // <--- folder to store the pdf documents into the server;
        $fileName =  time().'.'. 'pdf' ; // <--giving the random filename,
        $pdf->save($path . 'pdf' . $fileName);
        $generated_pdf_link = url('pdf_docs/'.$fileName);
        return response()->json($generated_pdf_link);
    }

    public function getData($id)
    {
        // $projects = Project::find($id);  
        
        // $trans=Transaction::all()->where('projectId','=',$projects->projectId);
        // $total=Transaction::where('projectId', '=', $projects->projectId)->sum('expenses');
        // $mytime = now();

        // return view('trans.printPdf', compact('projects','trans','total','mytime'));

        
        $userDep = Auth::user()->department;
        $researchs= Research::where('department', $userDep)->get();

        return view('pdf.index', compact('userDep', 'researchs'));
    }
    
    public function downloadPdf($id)
    {
        $projects = Project::find($id);  
        
        $trans=Transaction::all()->where('projectId','=',$projects->projectId);
        $total=Transaction::where('projectId', '=', $projects->projectId)->sum('expenses');
        $mytime = now();

        $pdf = PDF::loadView('/trans/printPdf', compact('projects','trans','total','mytime'))->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->download('expenses.pdf');
    }
}

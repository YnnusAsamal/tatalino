<?php

namespace App\Http\Controllers;


use App\Models\Research;
use App\Models\User;
use App\Notifications\ResearchNotification;
use Illuminate\Support\Facades\Notification;

use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Exports\ResearchExport;
use Maatwebsite\Excel\Facades\Excel;



class ResearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       $forApprove = Research::where('remarks','=','For Approval')->count();
        $user = User::find(1);
        // $researchs = Research::all();
        if($request->filled('search')){
            $researchs = Research::search($request->search)->where('remarks', 'Approved')->get();
        }else{
            $researchs = Research::where('remarks', '=','Approved')->paginate(5);
        }

        return view('researchs.index', compact('researchs', 'user','forApprove'));
    }
    public function myResearch()
    {
        $userId = Auth::user()->id;
        $researchs = Research::where('user_id',$userId)->get();

        return view('researchs.myResearch', compact('researchs', 'userId'));
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

        $this->validate($request,[

            'researchTitle' => 'required',
            'researchDescription' => 'required',
            'author' => 'required',
            'researchStatus' => 'required',
            'meta_title' => 'required',
            'meta_keywords' => 'required',
            'meta_description' => 'required',
        ]);
        $userLog = Auth::user();
        $user = User::all();
        $data = new Research();

        $file=$request->file;
        $filename=time().'.'.$file->getClientOriginalExtension();
        $request->file->move('assets',$filename);
        $data->file=$filename;

        // if($request->hasFile('file'))
        // {
        //     $file = $request->file('file');
        //     $ext = $file->getClientOriginalExtension();
        //     $filename = time() .'.'. $ext;
        //     $file->move('assets', $filename);
        //     $data->file = $filename;
        // }
        $data->user_id=Auth::user()->id;
        $data->researchTitle=$request->researchTitle;
        $data->researchDescription=$request->researchDescription;
        $data->author=$request->author;
        $data->researchStatus=$request->researchStatus;
        $data->department=$request->department;
        $data->remarks=$request->remarks;
        $data->meta_title=$request->meta_title;
        $data->meta_keywords=$request->meta_keywords;
        $data->meta_description=$request->meta_description;

        $data->save();

        $userLog->log("Added a new research");
        Notification::send($user, new ResearchNotification($request->researchTitle));
        return redirect()->route('researchs.myResearch')
                        ->with('success', 'Added new research successfully');
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
        $researchs=Research::find($id);

        return view('researchs.edit', compact('researchs'));
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
        $data =Research::find($id);

        // $file=$request->file;
        // $filename=time().'.'.$file->getClientOriginalExtension();
        // $request->file->move('assets',$filename);
        // $data->file=$filename;

        if($request->hasFile('file'))
        {
            $path = 'assets/'.$data->file;
            if(File::exists($path))
            {
                File::delete($path);
            }
            $file = $request->file('file');
            $ext = $file->getClientOriginalName();
            $filename = time().'.'.$ext;
            $file->move('assets',$filename);
            $data->file=$filename;
        }

        $data->researchTitle=$request->researchTitle;
        $data->researchDescription=$request->researchDescription;
        $data->author=$request->author;
        $data->researchStatus=$request->researchStatus;
        $data->department=$request->department;
        $data->meta_title=$request->meta_title;
        $data->meta_keywords=$request->meta_keywords;
        $data->meta_description=$request->meta_description;

        $data->save();

        $userLog->log("Updated a research");

        return redirect()->route('researchs.index')
                        ->with('success','Research Updated Successfully');
    }


    public function download($file)
    {
        $file_path = public_path('assets/'.$file);

        
        return response()->download( $file_path);

        // $response =  response()->download( $file_path);
        
        // return $reponse;
    }

   
    public function noticeView($id)
    {
        $notice = Notice::where('id', $id)->firstOrFail();
        $pathToFile = $notice->file;
        $fileName =  $notice->fileName;
        $path = $pathToFile.'/';
        $file = public_path($path.$fileName);
        return response()->file($file);
    }
                
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Research::find($id);
            $path = 'assets/'.$data->file;
            if(File::exists($path))
            {
                File::delete($path);
            }
        
            $data->delete();
            return redirect()->route('researchs.index')
                        ->with('success','Research Deleted Successfully');
    }
    //RIU
    public function researchApprove()
    {
        
        $userDep = Auth::user()->department;
        $researchs = Research::where([['department', $userDep],['remarks', '=','For RIU Approval']])->get();

        return view('researchs.researchApprove', compact('researchs'));
    }

    public function researchApproved($id)
    {
        
        $userLog =Auth::user();

        $researchs=Research::findOrFail($id);
        $researchs->update(['approved_at' => now()]);
        $researchs->update(['remarks' =>'For RDO Approval']);
        $userLog->log("Updated a status research(Research Approved by College RIU)");

        return redirect()->route('researchApprove')->withMessage('Research approved successfully');
    }
    public function researchDisapproved($id)
    {
        $userLog = Auth::user();

        $researchs=Research::findOrFail($id);
        $researchs->update(['approved_at' =>'']);
        $researchs->update(['remarks' =>'RIU Disapproved']);

        $userLog->log("Updated a status research(Research Dispproved by College RIU)");

        return redirect()->route('researchApprove')->withMessage('Research disapproved successfully');
    }
    //RDO
    public function rdoresearchApprove()
    {
        $researchs = Research::where('remarks','=','For RDO Approval')->get();

        return view('researchs.rdoApproval', compact('researchs'));
    }

    public function rdoresearchApproved($id)
    {
        $userLog=Auth::user();
        $researchs=Research::findOrFail($id);
        $researchs->update(['rodapproved_at' => now()]);
        $researchs->update(['remarks' =>'Approved']);

        $userLog->log("Updated a status research(Research Approved by RDO)");

        return redirect()->route('rdoApproval')->withMessage('Research approved successfully');
    }
    public function rdoresearchDisapproved($id)
    {
        $userLog=Auth::user();
        $researchs=Research::findOrFail($id);
        $researchs->update(['approved_at' =>'']);
        $researchs->update(['remarks' =>'RDO Disapproved']);
        $userLog->log("Updated a status research(Research Disapproved by RDO)");
        return redirect()->route('rdoApproval')->withMessage('Research disapproved successfully');
    }
   

    public function exportresearch()
    {
        $userDep = Auth::user()->department;
        $researchs = Research::where('department', $userDep)->get();

        return view('researchs.exportResearch', compact('researchs', 'userDep'));
    }

    public function export()
    {
        $userDep = Auth::user()->department;
        $researchs = Research::where('department',$userDep)->get();
        // return Excel::download(new ResearchExport,'researchs.xlsx');
        
        return Excel::download(new ResearchExport($userDep,$researchs), 'researchs.xlsx');
    }
}

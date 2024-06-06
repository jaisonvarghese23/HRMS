<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Leave;
use App\Models\Project;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function EmployeeDashboard(){
           $id=auth()->guard('Employee')->user()->id;

        $leadingprojectCount = Project::where('pleader', $id )->count();

       $leavecount =  Leave::whereMonth('fromdate' , Carbon::today()->month)->where('status','Approved')->count();

        $pmember = Project::get('pmembers');
      $count = 0 ;

    foreach($pmember as $P){
        for($i=0;$i<strlen($P['pmembers']);$i++)
             if($P['pmembers'][$i]==$id){
                $count++;
             }
    }
             $pmember = $count;

          return view('Employee.index',compact('leadingprojectCount','pmember','leavecount'));

    }
    public function Employeeprofile(){

        return view('Employee.profile');


  }
  public function EmployeeprofileUpdate(){

    $id = auth()->guard('Employee')->user()->id;
    $Employee = Employee::find($id);
    $input = [
        'fname' => request('fname'),
        'gender' => request('gender'),
        'blood' => request('blood'),
        'email' => request('email'),
        'phone' => request('phone'),
        'dob' => request('dob'),
    ];
    if(request()->hasFile('image')){

        if( auth()->guard('Employee')->user()->image){
            unlink(storage_path('app/images/'.$Employee->image));
        }

        $extenstion = request('image')->extension();
        $filename = 'HRPIC_'.time().'.'.$extenstion;
        request('image')->storeAs('images',$filename);
        $input['image'] = $filename;
    }
    $Employee->update($input);

       return redirect()->route('Employeeprofile')->with('message',"Profile Updated");




}
public function EmployeePasswordUpdate(){

    $id = auth()->guard('Employee')->user()->id;

   $Employee = Employee::find($id);

   $Employee->update([

    'password' => bcrypt(request('npassword')),

   ]);

   return redirect()->route('Employeeprofile')->with('message',"Password Updated");


}

   public function EmployeeLeave(){

    return view('Employee.leave');

  }
  public function leavesubmit(){
    $to = \Carbon\Carbon::parse(request('todate'));
    $from = \Carbon\Carbon::parse(request('fromdate'));
    $days = $to->diffInDays($from);
    if($days == 0){
        $days = 1;
    }
    Leave::create([

        'Employee_id'=>auth()->guard('Employee')->user()->id,
        'fromdate'=>request('fromdate'),
        'todate'=>request('todate'),
        'days'=>$days,
        'leave_type'=>request('leave_type'),
    ]);

    return redirect()->route('EmployeeLeave')->with('message' , 'Leave Applicatio sucessfully submited');


  }
  public function LeaveHistory(){

     $leaves = Leave::where('Employee_id',auth()->guard('Employee')->user()->id)->get();
     return view('Employee.LeaveHistory',compact('leaves'));

  }

  public function leadingprojects(){

    $leadingprojects = Project::where('pleader',auth()->guard('Employee')->user()->id)->get();
    return view('Employee.leadingprojects',compact('leadingprojects'));


}
   public function    updateprojectstatus($id){

      $project = Project::find($id);
      return view('Employee.updateproject',compact('project'));


   }

   public function updateprojectdetails($pid){

    $project = Project::find($pid);
    $project->update([
         'status' =>request('status'),
         'percentage'=>request('percentage'),
    ]);
    return redirect()->route('leadingprojects')->with('message' , 'Project Status Updated');


   }
   public function projectmember(){

    $projectmember = array();
    $id = auth()->guard('Employee')->user()->id;
   $pmember = Project::get('pmembers');
    foreach($pmember as $P){
        for($i=0;$i<strlen($P['pmembers']);$i++)
             if($P['pmembers'][$i]==$id){


                $project = Project::where('pmembers' , $P['pmembers'])->get();

             }
    }


     return view('Employee.projectsMember',compact('project'));

   }
}


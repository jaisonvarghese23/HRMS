<?php

namespace App\Http\Controllers;

use App\Mail\recruitmentMail;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Employee;
use App\Models\HR ;
use App\Models\Leave;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

// use Termwind\Components\Hr;

class HrController extends Controller
{
    public function index(){

       $deptcount = Department::count();
       $desgcount = Designation::count();
       $employee_count = Employee::count();
       $employees = Employee::all();
       $pendingleavecount = Leave::where('status','pending')->count();
        return view('HR/index',compact('deptcount','desgcount','employees','employee_count','pendingleavecount'));

    }
    public function Recruitment(){

        $departments = Department::all();
        $designations  = Designation::all();

        return view('HR/recruitment',compact('departments','designations'));

    }
    public function department(){

        $departments = Department::all();
        return view('HR.department',compact('departments'));
    }
    public function designation(){
        $designations  = Designation::all();
        return view('HR.designation',compact('designations'));
    }
    public function adddepartment(){

        $dept = Department::where('department',request('department'))->first();



        if($dept){
            return redirect()->route('department')->with('message',"Department Already Exist");
        }
        else{

            Department::create([

                'department' => request('department'),
            ]);

            return redirect()->route('department')->with('message',"Sucessfully Added Department");

    }
}
    public function deletedepartment(){

        $dept = Department::find(request('id'));
        $dept->delete();
        return redirect()->route('department')->with('message',"Sucessfully deleted Department");


    }
    public function adddesignation(){

        $dept = Designation::where('designation',request('designation'))->first();



        if($dept){
            return redirect()->route('designation')->with('message',"Designation Already Exist");
        }
        else{

            Designation::create([

                'designation' => request('designation'),
            ]);

            return redirect()->route('designation')->with('message',"Sucessfully Added Designation");

    }
}
    public function deletedesignation(){

        $dept = Designation::find(request('id'));
        $dept->delete();
        return redirect()->route('designation')->with('message',"Sucessfully deleted Designation");


    }

    public function addrecruitment(){


    $result = Employee::where('email',request('email'))->first();
    if($result){
        return redirect()->route('Recruitment')->with('message' , 'Email Already Taken ');
    }
else{
   $employee = Employee::create([

        'fname' => request('fname'),
        'lname' => request('lname'),
        'department' => request('department'),
        'role' => request('role'),
        'gender' => request('gender'),
        'blood' => request('blood'),
        'phone' => request('phone'),
        'dob' => request('dob'),
        'joindate'=> request('joindate'),
        'email'=> request('email'),
        'uname'=> request('uname'),
        'password'=> bcrypt(request('password')),





    ]);

    Mail::to(request('email'))->send(new recruitmentMail(request('uname'),request('password')));

    return redirect()->route('Recruitment')->with('message' , 'Sucessfully Added Employee ');
}

    }


    public function profile(){


         return view('HR.profile');

    }
    public function profileUpdate(){

        $id = auth()->user()->id;
        $Hr = HR::find($id);
        $input = [
            'fname' => request('fname'),
            'gender' => request('gender'),
            'blood' => request('blood'),
            'email' => request('email'),
            'phone' => request('phone'),
            'dob' => request('dob'),
        ];
        if(request()->hasFile('image')){
            unlink(storage_path('app/images/'.$Hr->image));
            $extenstion = request('image')->extension();
            $filename = 'HRPIC_'.time().'.'.$extenstion;
            request('image')->storeAs('images',$filename);
            $input['image'] = $filename;
        }
        $Hr->update($input);

           return redirect()->route('profile')->with('message',"Profile Updated");





    }
    public function PasswordUpdate(){


   $id = auth()->user()->id;

   $Hr = HR::find($id);

   $Hr->update([

    'password' => bcrypt(request('npassword')),

   ]);

   return redirect()->route('profile')->with('message',"Password Updated");

    }
    public function viewEmployee(){
        return view('HR.EmployeeDetails');
    }
    public function projects(){
        $projects =Project::where('status', '1')->get();
        return view('HR.projects',compact('projects'));
    }
    public function createProject(){
        $employees = Employee::all();
        return view('HR.createProject',compact('employees'));
    }
    public function runningProjects(){
        $projects =Project::where('status', '0')->get();
        return view('HR.runningproject',compact('projects'));
    }
    public function addproject(){


        Project::create([
            'pname'=>request('pname'),
            'Domain'=>request('domain'),
            'start_date'=>request('start_date'),
            'end_date'=>request('end_date'),
            'pleader'=>request('pleader'),
            'pmembers'=>json_encode(request('pmembers')),
            'percentage'=>'0',

        ]);

    return redirect()->route('createProject')->with('message',"Project Created");

    }
    public function HrLeave(){

        $requestLeaves = Leave::where('status','pending')->get();
        return view('HR.Leave',compact('requestLeaves'));
    }
    public function approvedLeaves(){

        $ApprovedLeaves = Leave::where('status','Approved')->orderBy('updated_at','DESC')->get();
        return view('HR.ApprovedLeaves',compact('ApprovedLeaves'));
    }
    public function rejectedLeaves(){

        $rejectedLeaves = Leave::where('status','Rejected')->orderBy('updated_at','DESC')->get();
        return view('HR.rejectedLeaves',compact('rejectedLeaves'));
    }
    public function updateleavestatus(){

        $leave = Leave::find(request('id'));
        $leave->update([
            'status'=>request('status'),
        ]);

        return redirect()->route('HrLeave')->with('message',"Leave ".request('status'));
// qkot tmio ocrj vfcu
    }
    public function attendance(){

        $employees = Employee::all();
        return view('HR.attendance',compact('employees'));
    }
    public function attendancesubmit(){
        Attendance::create([
            'Employee_id' => request('employee_id'),
            'attendance_date' => request('date'),
            'status' => request('status'),
        ]);
        return redirect()->route('attendance')->with('message','Attendance Marked Sucessfully');

    }
    public function FullAttendance(){

        $attendances = Attendance::orderBy('attendance_date','DESC')->get();

        return view('HR.fullattendance',compact('attendances'));
    }
}

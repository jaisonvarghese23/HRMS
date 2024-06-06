
@extends('HR.master')
@section('title') Recruitment
@endsection
@section('content')
<h3 class="i-name">Add new Employee</h3>
@if(session()->has('message'))

<div class="flash">
    <p>{{{session()->get('message')}}}</p>
</div>

@endif
<form action="{{route('addrecruitment')}}" method="POST">
    @csrf
    <table class="recruitment">

        <tr>
            <td>
                  <p>First Name</p>
                  <input type="text" placeholder="First Name" name="fname">

             </td>
             <td>
                <p>First Name</p>
                <input type="text" placeholder="Last Name" name="lname">

           </td>
           <td>
            <p>Department</p>
            <select name="department" id="">
                @foreach ($departments as $department )
                <option value="{{$department->department}}">{{$department->department}}</option>
                @endforeach

            </select>

       </td>



        </tr>
        <tr>
            <td> <div class="formdata">
                  <p>Role</p>
                  <select name="role" id="">
                    @foreach ($designations as $designation )
                    <option value="{{$designation->designation}}">{{$designation->designation}}</option>
                    @endforeach
                  </select>
                 </div>
             </td>
             <td> <div class="formdata">
                <p>Gender</p>
                  <select name="gender" id="">
                    <option value="male">Male</option>
                    <option value="Female">Female</option>
                  </select>
              </div>
           </td>
           <td> <div class="formdata">
            <p>Blood Group</p>
            <input type="text" placeholder="Blood Group" name="blood">
          </div>
       </td>

        </tr>

        <tr>
            <td> <div class="formdata">
                  <p>Contact number</p>
                  <input type="text" placeholder="Phone Number" name="phone">
                </div>
             </td>
             <td> <div class="formdata">
                <p>Date Of Birth</p>
                <input type="date"  name="dob">
              </div>
           </td>
           <td> <div class="formdata">
            <p>Date Of Joining</p>
            <input type="date"  name="joindate">
          </div>
       </td>

        </tr>
        <tr>
            <td> <div class="formdata">
                <p>Email</p>
                <input type="text" placeholder="Email" name="email">
              </div>
           </td>
            <td> <div class="formdata">
                  <p>Username</p>
                  <input type="text" placeholder="User Name" name="uname">
                </div>
             </td>
             <td> <div class="formdata">
                <p>Password</p>
                <input type="text" placeholder="Password" name="password">
              </div>
           </td>


        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" value="Save">
                <input type="reset" value="Reset">
            </td>
        </tr>





    </table>

 </form>
 </section>


@endsection

@extends('HR.master')
@section('content')
<h3 class="i-name">Attendance</h3>


@if(session()->has('message'))

    <div class="flash">
        <p>{{{session()->get('message')}}}</p>
    </div>

    @endif

<form action="{{route('attendancesubmit')}}" method="POST">
    @csrf
    <table class="recruitment">
        <tr>
            <td>
             <p>Employee Name</p>
             <select name="employee_id" id="">
                <option selected>Select Employee</option>
                @foreach ($employees as $employee )
                <option value="{{$employee->id}}">{{$employee->fname}} {{$employee->lname}}</option>
                @endforeach

             </select>

        </td>



         </tr>
        <tr>
            <td>
                  <p>Date</p>
                  <input type="date"  name="date">

             </td>


             </tr>
             <tr>
                <td>
                      <p>Status</p>
                      <select name="status" id="">
                        <option value="absent">Absent</option>
                        <option value="present">present</option>
                      </select>

                 </td>


                 </tr>




        <tr>
            <td colspan="2">
                <input type="submit" value="Mark Attendance">
                <input type="reset" value="Reset">
            </td>
        </tr>





    </table>

 </form>




@endsection

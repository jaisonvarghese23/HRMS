@extends('Employee.master')
@section('content')

<h3 class="i-name">Apply for new Leave</h3>

@if(session()->has('message'))

    <div class="flash">
        <p>{{{session()->get('message')}}}</p>
    </div>

    @endif

<form action="{{route('leavesubmit')}}" method="POST">
    @csrf
    <table class="recruitment">

        <tr>
            <td>
                  <p>From</p>
                  <input type="date"  name="fromdate">

             </td>


             </tr>
             <tr>
             <td>
                <p>To</p>
                <input type="date"  name="todate">

           </td>
           </tr>
           <tr>
           <td>
            <p>Leave Type</p>
            <select name="leave_type" id="">
                <option selected>Select Leave Type</option>
                <option value="Sick">Sick</option>
                <option value="personal">Personal</option>
                <option value="maternity">maternity/Paternity</option>
                <option value="other">Other</option>

            </select>

       </td>



        </tr>



        <tr>
            <td colspan="2">
                <input type="submit" value="Apply">
                <input type="reset" value="Reset">
            </td>
        </tr>





    </table>

 </form>



@endsection

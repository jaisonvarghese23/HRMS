@extends('Employee.master')
@section('content')
<h3 class="i-name">Create Projects</h3>
@if(session()->has('message'))

<div class="flash">
    <p>{{{session()->get('message')}}}</p>
</div>

@endif
<form  action="{{route('updateprojectdetails',$project->id)}}" method="POST" >
    @csrf
    <table class="recruitment">

        <tr>
            <td>
                  <p>Project Name</p>
                  <input type="text" placeholder="First Name" name="pname" readonly value="{{$project->pname}}" >

             </td>
           <td> <div class="formdata">
            <p>Domain</p>
            <input type="text" placeholder="Domain Area" name="domain" readonly value="{{$project->Domain}}">
          </div>
       </td>



        </tr>
        <tr>

             <td> <div class="formdata">
                <p>Start Date</p>
                  <input type="date" name="start_date" readonly value="{{$project->start_date}}">
              </div>
           </td>
           <td> <div class="formdata">
            <p>End Date</p>
            <input type="date" name="end_date" readonly value="{{$project->start_date}}">
                  </div>
       </td>

    </tr>
    <tr>
        <td>
              <p>Status</p>
         <select name="status" id="">
            <option value="0" @if ($project->status == '0') selected

            @endif>Ongoing</option>
            <option  value="1"  @if ($project->status == '1') selected

                @endif>Completed</option>
         </select>
         </td>
       <td> <div class="formdata">
        <p>Percentage</p>
        <input type="text" placeholder="percentage" name="percentage" value="{{$project->percentage}}" >
      </div>
   </td>



    </tr>

        <tr>
            <td colspan="2">
                <input type="submit" value="Save" onclick="hello()" >
                <input type="reset" value="Reset">
            </td>
        </tr>

    </table>

 </form>


<script>
    new MultiSelectTag('countries')
    function hello(){
        var values = $('#countries').val();
        $('#pmembers').val(values);
    }
</script>



@endsection

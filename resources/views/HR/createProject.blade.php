@extends('HR.master')
@section('content')
<h3 class="i-name">Create Projects</h3>
@if(session()->has('message'))

<div class="flash">
    <p>{{{session()->get('message')}}}</p>
</div>

@endif
<form  action="{{route('addproject')}}" method="POST" >
    @csrf
    <table class="recruitment">

        <tr>
            <td>
                  <p>Project Name</p>
                  <input type="text" placeholder="First Name" name="pname" >

             </td>
           <td> <div class="formdata">
            <p>Domain</p>
            <input type="text" placeholder="Domain Area" name="domain" >
          </div>
       </td>



        </tr>
        <tr>

             <td> <div class="formdata">
                <p>Start Date</p>
                  <input type="date" name="start_date">
              </div>
           </td>
           <td> <div class="formdata">
            <p>End Date</p>
            <input type="date" name="end_date">
                  </div>
       </td>

        </tr>

        <tr>
            <td> <div class="formdata">
                  <p>Project Leader</p>
                  <select name="pleader" id="">
                    <option selected>select Project Leader</option>
                    @foreach ($employees as $employee )
                    <option value="{{$employee->id}}">{{$employee->fname}} {{$employee->lname}}</option>
                    @endforeach

                </select>

                </div>
             </td>
             <td >
                <p>Project Members</p>
               <div  style="" class="formdata" >


                  <select    id="countries" multiple>
                    @foreach ($employees as $employee )
                    <option value="{{$employee->id}}">{{$employee->fname}} {{$employee->lname}}</option>
                    @endforeach
                </select>
                <input type="hidden" name="pmembers" id="pmembers" >
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

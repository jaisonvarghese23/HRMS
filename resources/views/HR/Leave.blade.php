@extends('HR.master')
@section('title') Leave
@endsection
@section('content')
<h3 class="i-name">Leave Management</h3>

@if(session()->has('message'))

<div class="flash">
    <p>{{{session()->get('message')}}}</p>
</div>

@endif
<div class="modalleave">


    <form action="{{route('updateleavestatus')}}" method="post">
        @csrf
        <input type="hidden" name="id" id="leaveid">
        <select name="status" id="">
            <option value="Approved">Approve</option>
            <option value="Rejected">Reject</option>
        </select>
        <input type="text" name="reason" placeholder="reason">
        <div class="buttons">
            <input type="submit" > <a href="" onclick="closebox()">Cancel</a>
        </div>

    </form>

</div>




@if (count($requestLeaves)>0)
<table class="leave">
    <thead>
        <tr>
        <th>Name</th>
        <th>No of Days</th>
        <th>Start Date</th>
        <th>End Date</th>
        <th>Leave Type</th>
        <th>Status</th>
        <th>Applied Date</th>
    </tr>
    </thead>
    <tbody>

        @foreach ($requestLeaves as $requestLeave )
         <tr>
            <td>{{$requestLeave->user->fname}} {{$requestLeave->user->lname}}</td>
            <td>{{$requestLeave->days}}</td>
            <td>{{$requestLeave->fromdate}}</td>
            <td>{{$requestLeave->todate}}</td>
            <td>{{$requestLeave->leave_type}}</td>
            <td >{{$requestLeave->created_at}}</td>
            <td><button onclick="actionleave({{$requestLeave->id}})">Action</button></td>
        </tr>
        @endforeach
    </tbody>

 </table>



@else

<h1 class="nopending">No Pending Leave Requests</h1>

@endif
 <script>

    function actionleave(id){

        $(".modalleave").css('visibility','visible');
       $('#leaveid').val(id);



   }
   // $('#close').click(function (e) {
   //     alert('sjxs');


   // });

   function closebox(){
    $(".modalleave").css('transition','0s');
        $(".modalleave").css('visibility','hidden');
   }

</script>



@endsection

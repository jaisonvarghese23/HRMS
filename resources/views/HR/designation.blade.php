@extends('HR.master')
@section('content')

<h3 class="i-name">Add Designations</h3>
@if(session()->has('message'))

<div class="flash">
    <p>{{{session()->get('message')}}}</p>
</div>

@endif
<div class="modal">
    <i class="fa-solid fa-trash"></i>
    <p>Are You sure?</p>

    <form action="{{route('deletedesignation')}}" method="post">
        @csrf
        <input type="hidden" name="id" id="deleteid">

        <div class="buttons">
            <input type="submit" > <a href="" onclick="closebox()">Cancel</a>
        </div>

    </form>

</div>

<section class="display">

    <div class="addform">
       <form action="{{route('adddesignation')}}" method="POST">
            @csrf
            <label for="department">Designation Name</label>
            <input type="text" name="designation" placeholder="designation">
            <input type="submit" value="Add Designation">
       </form>

    </div>

    <div class="getdata">

        <h3>Designations List</h3>
        @foreach ($designations as $designation)
        <li class="list" >{{$designation->designation}}  <i  onclick="deletes({{$designation->id}})" class="fa-solid fa-trash"></i></li>
        @endforeach

    </div>

</section>
<script>

    function deletes(id){

      $(".modal").css('visibility','visible');
      $('#deleteid').val(id);

   }
   // $('#close').click(function (e) {
   //     alert('sjxs');


   // });

   function closebox(){
       $(".modal").css('transition','0s');
       $(".modal").css('visibility','hidden');
   }

</script>

@endsection

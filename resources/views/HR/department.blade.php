@extends('HR.master')
@section('content')

<h3 class="i-name">Add Department</h3>


    @if(session()->has('message'))

    <div class="flash">
        <p>{{{session()->get('message')}}}</p>
    </div>

    @endif
    <div class="modal">
        <i class="fa-solid fa-trash"></i>
        <p>Are You sure?</p>

        <form action="{{route('deletedepartment')}}" method="post">
            @csrf
            <input type="hidden" name="id" id="deleteid">

            <div class="buttons">
                <input type="submit" > <a href="" onclick="closebox()">Cancel</a>
            </div>

        </form>

    </div>
    <section class="display">

    <div class="addform">
       <form action="{{route('adddepartment')}}" method="POST">
        @csrf

            <label for="department">Department Name</label>
            <input type="text" name="department" placeholder="Department">
            <input type="submit" value="Add department">
       </form>

    </div>

    <div class="getdata">

        <h3>Departments List</h3>
        @foreach ($departments as $department)
        <li class="list" >{{$department->department}}  <i  onclick="deletes({{$department->id}})" class="fa-solid fa-trash"></i></li>
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
        $(".modalleave").css('transition','0s');
        $(".modalleave").css('visibility','hidden');
    }

</script>

@endsection

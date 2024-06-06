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

@extends('Employee.master')
@section('content')
<h3 class="i-name">Profile Details</h3>


<div class="container">

    <div class="tab_box">
        <button class="tab_btn ">Profile</button>
        <button class="tab_btn">Edit Profile</button>
        <button class="tab_btn">Change Password</button>
        <div class="line"></div>
    </div>
    @if(session()->has('message'))

<div class="flash">
    <p >{{{session()->get('message')}}}</p>
</div>

@endif
    <div class="content_box">
       <div class="contents active">

         <div class="profdisplay">

            <img src="{{asset('storage/images/'.auth()->guard('Employee')->user()->image)}}" alt="">

             <table>
              <tr>
                <td>Full Name</td>
                <td>{{auth()->guard('Employee')->user()->fname}}</td>
              </tr>
              <tr>
                <td>Full Name</td>
                <td>{{auth()->guard('Employee')->user()->fname}}</td>
              </tr>
              <tr>
                <td>Email</td>
                <td>{{auth()->guard('Employee')->user()->email}}</td>
              </tr>
              <tr>
                <td>Contact Number</td>
                <td>{{auth()->guard('Employee')->user()->phone}}</td>
              </tr>
              <tr>
                <td>Gender</td>
                <td>{{auth()->guard('Employee')->user()->gender}}</td>
              </tr>
              <tr>
                <td>Blood Group</td>
                <td>{{auth()->guard('Employee')->user()->blood}}</td>
              </tr>


             </table>

         </div>


       </div>
       <div class="contents">
        <form action="{{route('EmployeeprofileUpdate')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <table class="recruitment">

                <tr>
                    <td>
                          <p>Full Name</p>
                          <input type="text" placeholder="First Name" name="fname" value="{{auth()->guard('Employee')->user()->fname}}">

                     </td>
                   <td> <div class="formdata">
                    <p>Email</p>
                    <input type="text" placeholder="Email" name="email" value="{{auth()->guard('Employee')->user()->email}}">
                  </div>
               </td>



                </tr>
                <tr>

                     <td> <div class="formdata">
                        <p>Gender</p>
                          <select name="gender" id="">
                            <option value="male"  @if(auth()->guard('Employee')->user()->gender == 'male') selected @endif>Male</option>
                            <option value="Female"  @if(auth()->guard('Employee')->user()->gender == 'Female') selected @endif>Female</option>
                          </select>
                      </div>
                   </td>
                   <td> <div class="formdata">
                    <p>Blood Group</p>
                    <input type="text" placeholder="Blood Group" name="blood" value="{{auth()->guard('Employee')->user()->blood}}">
                  </div>
               </td>

                </tr>

                <tr>
                    <td> <div class="formdata">
                          <p>Contact number</p>
                          <input type="text" placeholder="Phone Number" name="phone" value="{{auth()->guard('Employee')->user()->phone}}">
                        </div>
                     </td>
                     <td> <div class="formdata">
                        <p>Date Of Birth</p>
                        <input type="date"  name="dob" value="{{auth()->guard('Employee')->user()->dob}}">
                      </div>
                   </td>


                </tr>
                <tr>
                    <td colspan="2" >
                        <img src="{{asset('storage/images/'.auth()->guard('Employee')->user()->image)}}" alt="profile Image" id=preview>
                        <input type="file" name="image" id="" onchange="getImagepreview(event)">
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

       </div>
       <div class="contents">

        {{-- Password Change --}}
        <form action="{{route('EmployeePasswordUpdate')}}" method="POST">
            @csrf
            <table class="recruitment">

                <tr>
                    <td>
                          <p>User Name</p>
                          <input type="text" readonly placeholder="User Name" name="Uname" value="{{auth()->guard('Employee')->user()->uname}}">

                     </td>
               </td>
                </tr>
                <tr>

                     <td> <div class="formdata">
                        <p>Password</p>
                        <input type="password" readonly placeholder="User Name" name="Uname" value="{{bcrypt(auth()->guard('Employee')->user()->password)}}">
                      </div>
                   </td>

                </tr>

                <tr>
                    <td> <div class="formdata">
                          <p>New Password</p>
                          <input type="text" placeholder="New Password" class="npassword" name="npassword">
                        </div>
                     </td>


                </tr>
                <tr>
                    <td> <div class="formdata">
                          <p>Confirm New Password</p>
                          <input type="password" placeholder="Confirm New Password" class="cnpassword" name="cnpassword">
                          <p id=flash></p>
                        </div>
                     </td>


                </tr>

                <tr>
                    <td colspan="2">
                        <input type="submit" value="Save" id="myButton">
                        <input type="reset" value="Reset">
                    </td>
                </tr>

            </table>

         </form>


       </div>

    </div>


</div>
<script>
     function getImagepreview(event){
    var image =  URL.createObjectURL(event.target.files[0]);

    var imag = document.getElementById("preview");
    imag.width="100";
    imag.margin="10";
      imag.src=image;

    }
    const tabs = document.querySelectorAll('.tab_btn');
    const contents = document.querySelectorAll('.contents');
    tabs.forEach((tab,index) => {
        tab.addEventListener('click', (e)=>{
            tabs.forEach(tab=>{tab.classList.remove('active')});
           tab.classList.add('active');
           var line = document.querySelector('.line');
           line.style.width = e.target.offsetWidth + "px";
           line.style.left = e.target.offsetLeft + "px";
           contents.forEach(content=>{
           content.classList.remove('active');
           })
           contents[index].classList.add('active');
        })
    });
    $(document).ready(function () {

       $('#myButton').click(function (e) {
     var npass = $('.npassword').val();
     var cnpass = $('.cnpassword').val();

     if(npass!=cnpass){
        e.preventDefault();
        $('#flash').text('New password and confirm password are mismatch');
     }
     });


   });

</script>
@endsection

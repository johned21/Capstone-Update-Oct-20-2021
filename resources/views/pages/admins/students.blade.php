@section('mytitle', '| Student list')

@extends('layouts.app')

@section('content')

<div class="wrapper">
	
    @include('component.sidebar')
    @include('component.info_msg')
    @include('items.create-users')
    <div class="dashboard-content">
        <div class="text">
            <div class="container-fluid">
                <div class="row p-3">
                    <h1 class="fw-light" id="dashusers"><i class="fad fa-user-graduate"></i> Student list</h1>
                    <div class="mb-3">
                        <button class="btn btn-outline-primary float-end px-3" data-backdrop="static" data-toggle="modal" data-target="#createUsersModal">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> New User
                        </button>
                    </div>
                    <div class="col-md-12 offset-md-0 mb-5 p-5 card-table">
                        <table id="example" class="table table-striped table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Profile Pic</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($students as $student)
                                <tr class="data-row">
                                    <td>{{$student->id}}</td>
                                    <td class=""><img  style="width: 100px; border-radius:5px;" src="{{asset("images/". $student->user->profile_pic)}}" id="upload-imgg"></td>
                                    <td>{{$student->lastName}}</td>
                                    <td>{{$student->firstName}} </td>
                                    <td>{{$student->middleName}}</td>
                                    <td class="text-center">
                                        <div class="btn btn-outline-primary tooltip-actbtn"><i class="far fa-eye"></i>
                                            <div class="top">
                                                <p class="tooltiptxt">View</p>
                                            </div>
                                        </div>
                                        
                                        <div class="btn btn-outline-success tooltip-actbtn" id="edit-student" data-student-id="{{$student->id}}"><i class="fas fa-pencil-alt"></i>
                                            <div class="top">
                                                <p class="tooltiptxt">Edit</p>
                                            </div>
                                        </div>

                                        <div class="btn btn-outline-danger tooltip-actbtn"  id="delete-student" data-student-id="{{$student->id}}"><i class="fal fa-user-times"></i>
                                            <div class="top">
                                                <p class="tooltiptxt">Delete</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Last Name</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('items.edit-users')
    @include('items.delete-users')

    <script>
        let btn = document.querySelector("#btn-menu");
        let sidebar = document.querySelector(".sidebar");
        let searchBtn = document.querySelector(".bx-search");

        btn.onclick = function(){
            sidebar.classList.toggle("active");
        }
        searchBtn.onclick = function(){
            sidebar.classList.toggle("active");
        }

        jQuery(document).ready(function($) {
        $('#example').DataTable({
            responsive: true
        });
        $(document).on('click', '#example tbody tr button', function() {       
            $("#modaldata tbody tr").html("");
            $("#modaldata tbody tr").html($(this).closest("tr").html());
            $("#exampleModal").modal("show");
        });
        } );        
    </script>

</div>
@endsection
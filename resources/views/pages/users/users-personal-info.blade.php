@section('mytitle', '| Pesonal Info Form')

@extends('layouts.app')

@section('content')
@if(session('errors'))
        <div class="alert alert-warning mt-5" role="alert">
            <div class="container">
                Please input the following fields:
                <ul>
                    @foreach(session('errors')->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
<div class="container">

    @include('component.user-sidebar')

    <div class="dashboard-content">
        <div class="text">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col">
                        <div class="row">
                            <div class="col-md-10 offset-md-1 mt-4">
                                <h1 class="mb-5">Personal Information</h1>
                                {!! Form::open(["route" => "user.personalinfo", 'method' => 'post', 'id' => 'personalinfo-form', 'enctype'=>"multipart/form-data"]) !!}
                                {!! Form::hidden('id', null, ['class'=>'form-control', 'id'=>'modal-input-id']) !!}
                                <div class="mb-5">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <div class="profile-card">
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="profile">
                                                            <img src="../img/pp.png" id="upload-img">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-5 mt-5">
                                                        <div class="upload-file">
                                                            <label for="fileupload">
                                                                <span class="links-name text-white"><i class="fad fa-camera" style="font-size: 0.95em"></i>Upload Photo</span>
                                                            </label>
                                                            {{-- <input type="file" id="fileupload"> --}}
                                                            {!! Form::file('profile_pic', ['id'=>'fileupload', 'accept' => "image/*"]) !!}
                                                        </div>
                                                    </div>
                                                </div> 
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="col form-group @error('firstName') has-error @enderror">
                                                <label for="firstName" class="form-label">First Name:</label>
                                                {!! Form::text('firstName', null, ['class'=>'form-control', 'required' => '']) !!}
                                                <span class="errspan" id="errspan">{{ $errors->first('firstName') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col form-group @error('lastName') has-error @enderror">
                                                <label for="lastName" class="form-label">Last Name:</label>
                                                {!! Form::text('lastName', null, ['class'=>'form-control', 'required' => '', 'id'=>'modal-input-lname']) !!}
                                                <span class="errspan" id="errspan">{{ $errors->first('lastName') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col form-group @error('middleName') has-error @enderror">
                                                <label for="middleName" class="form-label">Middle Name:</label>
                                                {!! Form::text('middleName', null, ['class'=>'form-control', 'required' => '', 'id'=>'modal-input-mname']) !!}
                                                <span class="errspan" id="errspan">{{ $errors->first('middleName') }}</span>
                                            </div>
                                        </div>
                                        
                                    
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="row">
                                        <div class="col-md-2 @error('gender') has-error @enderror">
                                            {!! Form::label('gender','Gender',[],false) !!}
                                            {{Form::select('gender', [
                                                2 => 'Male',
                                                1 => 'Female',
                                            ], null, ['class'=>'form-control form-select', 'id'=>'gender'])}}
                                        </div>
                                        <div class="col-md-3">
                                            <div class="col form-group @error('birthDate') has-error @enderror">
                                                <label for="birthDate" class="form-label">Birth Date:</label>
                                                {!! Form::date('birthDate', null, ['class'=>'form-control', 'required' => '']) !!}
                                                <span class="errspan" id="errspan">{{ $errors->first('birthDate') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col form-group @error('birthPlace') has-error @enderror">
                                                <label for="birthPlace" class="form-label">Birth Place:</label>
                                                {!! Form::text('birthPlace', null, ['class'=>'form-control', 'required' => '']) !!}
                                                <span class="errspan" id="errspan">{{ $errors->first('birthPlace') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <div class="row">
                                        <label for="address" class="form-label">Address:</label>
                                        <div class="col-md-4">
                                            <div class="col form-group @error('barangay') has-error @enderror">
                                                {!! Form::text('barangay', null, ['class'=>'form-control', 'placeholder'=>'Barangay', 'required' => '']) !!}
                                                <span class="errspan" id="errspan">{{ $errors->first('barangay') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col form-group @error('town') has-error @enderror">
                                                {!! Form::text('town', null, ['class'=>'form-control', 'placeholder'=>'Town', 'required' => '']) !!}
                                                <span class="errspan" id="errspan">{{ $errors->first('town') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col form-group @error('province') has-error @enderror">
                                                {!! Form::text('province', null, ['class'=>'form-control', 'placeholder'=>'Province', 'required' => '']) !!}
                                                <span class="errspan" id="errspan">{{ $errors->first('province') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="col form-group @error('civilStatus') has-error @enderror">
                                                <label for="civilStatus" class="form-label">Civil Status:</label>
                                                {!! Form::text('civilStatus', null, ['class'=>'form-control', 'required' => '']) !!}
                                                <span class="errspan" id="errspan">{{ $errors->first('civilStatus') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col form-group @error('nationality') has-error @enderror">
                                                <label for="nationality" class="form-label">Nationality:</label>
                                                {!! Form::text('nationality', null, ['class'=>'form-control',  'required' => '']) !!}
                                                <span class="errspan" id="errspan">{{ $errors->first('nationality') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="col form-group @error('religion') has-error @enderror">
                                                <label for="religion" class="form-label">Religion:</label>
                                                {!! Form::text('religion', null, ['class'=>'form-control',  'required' => '']) !!}
                                                <span class="errspan" id="errspan">{{ $errors->first('religion') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col form-group @error('fatherName') has-error @enderror">
                                                    <label for="fatherName" class="form-label">Father:</label><br>
                                                    {!! Form::text('fatherName', null, ['class'=>'form-control', 'placeholder'=>'Father Name', 'required' => '']) !!}
                                                    <span class="errspan" id="errspan">{{ $errors->first('fatherName') }}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group @error('fatherOccup') has-error @enderror">
                                                    {!! Form::text('fatherOccup', null, ['class'=>'form-control', 'placeholder'=>'Father Occupation', 'required' => '']) !!}
                                                    <span class="errspan" id="errspan">{{ $errors->first('fatherOccup') }}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group @error('fatherContact') has-error @enderror">
                                                    {!! Form::text('fatherContact', null, ['class'=>'form-control', 'placeholder'=>'Father Contact', 'required' => '']) !!}
                                                    <span class="errspan" id="errspan">{{ $errors->first('fatherContact') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col form-group @error('motherName') has-error @enderror">
                                                    <label for="motherName" class="form-label">Mother:</label><br>
                                                    {!! Form::text('motherName', null, ['class'=>'form-control', 'placeholder'=>'Mother Name', 'required' => '']) !!}
                                                    <span class="errspan" id="errspan">{{ $errors->first('motherName') }}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group @error('motherOccup') has-error @enderror">
                                                    {!! Form::text('motherOccup', null, ['class'=>'form-control', 'placeholder'=>'Mother Occupation', 'required' => '']) !!}
                                                    <span class="errspan" id="errspan">{{ $errors->first('motherOccup') }}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group @error('motherContact') has-error @enderror">
                                                    {!! Form::text('motherContact', null, ['class'=>'form-control', 'placeholder'=>'Mother Contact', 'required' => '']) !!}
                                                    <span class="errspan" id="errspan">{{ $errors->first('motherContact') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-1">
                                    <div class="row">
                                        <label for="guardianName" class="form-label">Guardian:</label>
                                        <div class="col-md-5">
                                            <div class="col form-group @error('guardianName') has-error @enderror">
                                                {!! Form::text('guardianName', null, ['class'=>'form-control', 'placeholder'=>'Guardian Name']) !!}
                                                <span class="errspan" id="errspan">{{ $errors->first('guardianName') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="col form-group @error('guardianContact') has-error @enderror">
                                                {!! Form::text('guardianContact', null, ['class'=>'form-control', 'placeholder'=>'Guardian Contact']) !!}
                                                <span class="errspan" id="errspan">{{ $errors->first('guardianContact') }}</span>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                                

                                <div class="mb-1">
                                    <div class="row">
                                        <div class="col-md-2 @error('grade_LVL') has-error @enderror">
                                            {!! Form::label('grade_LVL','Grade Level',[],false) !!}
                                            {{Form::select('grade_LVL', [
                                                1 => 'Grade 7',
                                                2 => 'Grade 8',
                                                3 => 'Grade 9',
                                                4 => 'Grade 10',
                                                5 => 'Grade 11',
                                                6 => 'Grade 12',
                                            ], null, ['class'=>'form-control form-select', 'id'=>'grade_LVL'])}}
                                        </div>
                                        
                                    </div>
                                </div>

                                <div class="mt-5">
                                    <div class="row">
                                        <label for="elementary" class="form-label">Elementary:</label><br>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col form-group @error('elemSchool') has-error @enderror">
                                                    {!! Form::text('elemSchool', null, ['class'=>'form-control', 'placeholder'=>'Elementary School', 'required' => '']) !!}
                                                    <span class="errspan" id="errspan">{{ $errors->first('elemSchool') }}</span>
                                                </div>  
                                            </div>
                                            <div class="row">
                                                <div class="col form-group @error('elemSchlAddr') has-error @enderror">
                                                    {!! Form::text('elemSchlAddr', null, ['class'=>'form-control', 'placeholder'=>'Elementary School Address', 'required' => '']) !!}
                                                    <span class="errspan" id="errspan">{{ $errors->first('elemSchlAddr') }}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group @error('elemYrAttnd') has-error @enderror">
                                                    {!! Form::text('elemYrAttnd', null, ['class'=>'form-control', 'placeholder'=>'Elementary Year Attend', 'required' => '']) !!}
                                                    <span class="errspan" id="errspan">{{ $errors->first('elemYrAttnd') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-3">
                                    <div class="row">
                                        <label for="secondary" class="form-label">Secondary:</label><br>
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="col form-group @error('secondarySchool') has-error @enderror">
                                                    {!! Form::text('secondarySchool', null, ['class'=>'form-control', 'placeholder'=>'Secondary School']) !!}
                                                    <span class="errspan" id="errspan">{{ $errors->first('secondarySchool') }}</span>
                                                </div>  
                                            </div>
                                            <div class="row">
                                                <div class="col form-group @error('secondarySchlAddr') has-error @enderror">
                                                    {!! Form::text('secondarySchlAddr', null, ['class'=>'form-control', 'placeholder'=>'Secondary School Address']) !!}
                                                    <span class="errspan" id="errspan">{{ $errors->first('secondarySchlAddr') }}</span>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col form-group mb-5 @error('secondaryYrAttnd') has-error @enderror">
                                                    {!! Form::text('secondaryYrAttnd', null, ['class'=>'form-control', 'placeholder'=>'Secondary Year Attend']) !!}
                                                    <span class="errspan" id="errspan">{{ $errors->first('secondaryYrAttnd') }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button class="btn btn-primary mb-5" id="submitBtn">Submit</button>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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
        $('#example').DataTable();
        $(document).on('click', '#example tbody tr button', function() {       
            $("#modaldata tbody tr").html("");
            $("#modaldata tbody tr").html($(this).closest("tr").html());
            $("#exampleModal").modal("show");
        });
        } );       


        $(function(){
            $("#fileupload").change(function(event) {
                var x = URL.createObjectURL(event.target.files[0]);
                $("#upload-img").attr("src",x);
                console.log(event);
            });
        }) 
    </script>
    <script>
        @if(count($errors) > 0) 
            console.log($errors)
        @endif
    </script>
</div>
@endsection
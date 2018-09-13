@extends('layouts.app')

@section('content')
    <div class="wrapper card">
        {!! Form::open(['url'=>route('contactus.store'), 'method'=>'POST', 'enctype'=>'multipart/form-data', 'class'=>'card-body']) !!} 
            <div class="content">
                <h2>Contact Us</h2>
                {!! Form::cInput('name') !!}
                {!! Form::cInput('email') !!}
                {!! Form::cInput('phone') !!}
                <label class="inp">
                    <select name='topic'>
                        <option value='psb'>Student Admission / Pendaftaran Siswa Baru</option>
                        <option value='program'>School Program / Program Sekolah</option>
                        <option value='keluhan'>Handling Complaint / Keluhan</option>
                        <option value='dll'>Others / Lain-Lain</option>
                    </select>
                    <span class="label"></span>
                    <span class="border"></span>
                </label>
                {!! Form::cTextarea('details') !!}
                <input id="submitForm" class="hidden" type="submit" value="Submit">
                {{ csrf_field() }}
            </div>
            <div class="action-bar">
                <label for="submitForm" class="btn">Submit</label>
            </div>
        {!! Form::close() !!}
    </div>
@endsection
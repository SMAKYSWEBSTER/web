@extends('layouts.app')

@section('content')
    <div class="wrapper card">
        <form class="card-body" action="{{ route('contactus.store') }}" method="POST">
            <div class="content">
                <h2>Contact Us</h2>
                <label class="inp">
                    <input type="text" name="name" value="{{ old('name') }}" placeholder="&nbsp;">
                    <span class="label">Your Name</span>
                    <span class="border"></span>
                </label>
                @if($errors->has('name'))
                <span class="alert error">{{ $errors->first('name') }}</span>
                @endif
                <label class="inp">
                    <input type="text" name="email" value="{{ old('email') }}" placeholder="&nbsp;">
                    <span class="label">Your Email</span>
                    <span class="border"></span>
                </label>
                @if($errors->has('email'))
                    <span class="alert error">{{ $errors->first('email') }}</span>
                @endif
                <label class="inp">
                    <input type="text" name="phone" value="{{ old('phone') }}" placeholder="&nbsp;">
                    <span class="label">Your Phone</span>
                    <span class="border"></span>
                </label>
                @if($errors->has('phone'))
                    <span class="alert error">{{ $errors->first('phone') }}</span>
                @endif
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
                <label class="inp">
                    <textarea rows="4" cols="50" name="details" placeholder="&nbsp;">{{ old('details') }}</textarea>
                    <span class="label">Description</span>
                    <span class="border"></span>
                </label>
                @if($errors->has('details'))
                    <span class="alert error"> {{ $errors->first('details') }} </span>
                @endif
                <input id="submitForm" class="hidden" type="submit" value="Submit">
                {{ csrf_field() }}
            </div>
            <div class="action-bar">
                <label for="submitForm" class="btn">Submit</label>
            </div>
        </form>
    </div>
@endsection
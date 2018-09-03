@extends('layouts.app')

@section('content')
    @if(Auth::check() == true && Auth::user()->username == 'osis')
        <div class="wrapper card">
            <div class="card-body">
            <form class="content" action="{{ route('facility.update', $fasilitas->id) }}" method="POST" enctype="multipart/form-data">
                    <h1>Edit Facility</h1>
                    <div class="inp">
                        <input type="text" name="desc" placeholder="&nbsp;" value="{{ $fasilitas->desc }}" id="input">
                        <span class="label">Edit Description</span>
                        <span class="border"></span>
                    </div>
                    <input class="get-preview" type="file" name="photo" accept="image/*">
                    <div class="inp">
                        <input type="text" placeholder="&nbsp;" class="image-upload-input">
                        <span class="label">Edit Photo</span>
                        <span class="border"></span>
                    </div>
                    <input type="hidden" name="_method" value="patch">
                    <input id="submitForm" class="hidden" type="submit" value="Edit">
                {{ csrf_field() }}
            </form>
            <form class="content" action="{{ route('facility.index') }}" method="GET">
                    <input class="hidden" type="submit" value="BACK" id="back">
                    {{ csrf_field() }}
                </form>
                <div class="action-bar">
                    <label class="btn" for="back">Back</label>
                    <label class="btn" for="submitForm">Edit</label>
                    <button type="button" class="btn img" tabindex="-1">select an image</button>
                </div>
            </div>
        </div>
    @else
    <div class="wrapper banner">
        <h1>Oops, you accessed this page directly, and there's no content for you to see here!</h1>
    </div>
    @endif
@endsection
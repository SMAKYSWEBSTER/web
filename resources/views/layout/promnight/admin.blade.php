@extends("layouts.app")

@section("content")

    @if(Auth::check() == true)
        @if(Auth::user()->username == 'osis')
            <div class="wrapper card">
                {!! Form::open(['url'=>route('promnight.store'), 'class'=>'card-body wrapped-height', 'method'=>'POST', 'enctype'=>'multipart/form-data']) !!}
                    <div class="content">
                        {!! Form::cInput('name') !!}
                        <label class="inp">
                            <select name="sex">
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                            <span class="label"></span>
                            <span class="border"></span>
                        </label>
                    </div>
                    <div class="action-bar">
                        <input class="btn" type="submit" value="Upload">
                    </div>
                    {{ csrf_field() }}
                {!! Form::close() !!}
            </div>

            <div class="wrapper column">
                <div class="col-3">
                    @foreach($promkings as $promking)
                        <p>PROM KING NOMINATION : {{ $promking->name }}, votes: {{ count($promking->votes) }}</p>
                    @endforeach
                </div>
                <div class="col-3">
                    @foreach($promqueens as $promqueen)
                        <p>PROM QUEEN NOMINATION : {{ $promqueen->name }}, votes: {{ count($promqueen->votes) }}</p>
                    @endforeach
                </div>
            </div>
        @endif
    @endif
@endsection
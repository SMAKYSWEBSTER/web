@extends("layouts.app")

@section("content")

    @if(Auth::check() == true)
        @if(Auth::user()->username == 'osis')

            {{-- <form class="action-bar" action="{{ route('promnight.admin') }}" method="GET" id="viewdeleted">
                <input class="btn" type="submit" value="Admin">
                {{ csrf_field() }}
            </form> --}}

            <div class="wrapper column">
                <div class="col-3" style="justify-content:center;">
                    @foreach($males as $male)
                        <form action="{{ route('promnight.votemale') }}" method="post">
                            {{-- <div class="btn fixed inverted rounded --color-primary">
                                {{ $male->name }}
                            </div> --}}
                            <input type="hidden" name="id" value="{{ $male->id }}">
                            <input type="submit" class="btn fixed inverted rounded --color-primary" value="{{ $male->name }}">
                            {{ csrf_field() }}
                        </form>
                    @endforeach
                </div>
                <div class="col-3">
                    @foreach($females as $female)
                        <form action="{{ route('promnight.votefemale') }}" method="post">
                            {{-- <div class="btn fixed inverted rounded --color-primary">
                                {{ $male->name }}
                            </div> --}}
                            <input type="hidden" name="id" value="{{ $female->id }}">
                            <input type="submit" class="btn fixed inverted rounded --color-primary" value="{{ $female->name }}">
                            {{ csrf_field() }}
                        </form>
                    @endforeach
                </div>
            </div>
        @endif
    @endif
@endsection
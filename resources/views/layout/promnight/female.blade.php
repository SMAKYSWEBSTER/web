@extends("layouts.app")

@section("content")

    {{-- @if(Auth::check() == true)
        @if(Auth::user()->username == 'osis') --}}

            {{-- <form class="action-bar" action="{{ route('promnight.admin') }}" method="GET" id="viewdeleted">
                <input class="btn" type="submit" value="Admin">
                {{ csrf_field() }}
            </form> --}}

            <div class="wrapper column">
                <h1>PROM QUEEN NOMINATION</h1>
                <div class="col-3">
                    @foreach($females as $female)
                        <form action="{{ route('promnight.votefemale') }}" class="flex-centered" method="post">
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
        {{-- @endif
    @endif --}}
@endsection
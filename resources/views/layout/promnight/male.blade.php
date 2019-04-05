@extends("layouts.app")

@section("content")

    {{-- @if(Auth::check() == true)
        @if(Auth::user()->username == 'osis') --}}

            {{-- <form class="action-bar" action="{{ route('promnight.admin') }}" method="GET" id="viewdeleted">
                <input class="btn" type="submit" value="Admin">
                {{ csrf_field() }}
            </form> --}}

            <div class="wrapper banner">
                <h1>PROM KING NOMINATION</h1>
                @foreach($males as $male)
                    <form action="{{ route('promnight.votemale') }}" class="flex-centered" method="post">
                        {{-- <div class="btn fixed inverted rounded --color-primary">
                            {{ $male->name }}
                        </div> --}}
                        <input type="hidden" name="id" value="{{ $male->id }}">
                        <input type="submit" class="btn fixed inverted rounded --color-primary" value="{{ $male->name }}">
                        {{ csrf_field() }}
                    </form>
                @endforeach
            </div>
        {{-- @endif
    @endif --}}
@endsection
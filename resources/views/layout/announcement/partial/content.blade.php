<div class="profile-info">
    <img src="{{ asset('/propic/'.$type->propic) }}" width="100px" height="100px" id="announcement_img">
    <p class="publisher"> Publisher: {{ $type->username }} </p>
    <p class="date_created"> {{ $type->created_at }} </p>
</div>
<div class="desc full">
    <p> {{ $type->description }} </p>
    <a href="{{ asset("/file/".$type->files) }}" download >{{ $type->files }}</a>
    <a href="https://{{ $type->link }}">{{ $type->link }}</a>
</div>
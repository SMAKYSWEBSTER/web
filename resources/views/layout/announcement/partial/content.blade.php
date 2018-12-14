<div class="profile-info">
    <img src="{{ asset('/propic/'.$type->propic) }}" width="100px" height="100px" id="announcement_img">
    <p class="publisher"> Publisher: {{ $type->username }} </p>
    <p class="date_created"> {{ $type->created_at }} </p>
</div>
<div class="desc">
    <p> {{ $type->description }} </p>
    <a href="{{ asset("/file/".$type->files) }}" download >{{ $type->files }}</a>
    <a href="{{ $type->link }}">{{ $type->link }}</a>
</div>
@if($type->video_id)
<div class="video-player">
    <iframe src="https://www.youtube.com/embed/{{ $type->video_id }}"></iframe>
</div>
@endif
@if(str_contains($type->files, '.mp4') || str_contains($type->files, '.ogg'))
<div class="video-player">
    <video width="400" controls>
        <source src="{{ asset('video/'.$type->files) }}" type="video/mp4">
        <source src="{{ asset('video/'.$type->files) }}" type="video/ogg">
    </video>
</div>
@endif
@if(str_contains($type->files, '.jpg') || str_contains($type->files, '.jpeg') || str_contains($type->files, '.gif')  || str_contains($type->files, '.png'))
<div class="announcement-img">
    <img src="file/{{ $type->files }}" alt="No Photo">
</div>
@endif
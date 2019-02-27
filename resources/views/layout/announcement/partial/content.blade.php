<div class="profile-info">
    <img src="{{ asset('/propic/'.$type->propic) }}" width="100px" height="100px" id="announcement_img">
    <p class="publisher"> Publisher: {{ $type->username }} </p>
    <p class="date_created"> {{ $type->created_at }} </p>
</div>
    <div class="desc">
        <p> {{ $type->description }} </p>
        @if(isset($type->files))
            @foreach($type->files as $file)
                <a href="{{ asset("/file/".$file->file) }}" download >{{ $file->file }}</a>
            @endforeach
        @endif
        <a href="{{ $type->link }}">{{ $type->link }}</a>
    </div>
@if($type->video_id)
<div class="video-player">
    <iframe src="https://www.youtube.com/embed/{{ $type->video_id }}"></iframe>
</div>
@endif
@if(isset($type->files))
    @if(str_contains($type->files, '.mp4') || str_contains($type->files, '.ogg'))
        @foreach($type->files as $file)
            <div class="video-player">
                <video width="400" controls>
                    <source src="{{ asset('video/'.$file->file) }}" type="video/mp4">
                    <source src="{{ asset('video/'.$file->file) }}" type="video/ogg">
                </video>
            </div>
        @endforeach
    @endif
    @if(str_contains($type->files, '.jpg') || str_contains($type->files, '.jpeg') || str_contains($type->files, '.gif')  || str_contains($type->files, '.png'))
        <div class="announcement-gallery">
            <div class="announcement-img">
                @foreach($type->files as $file)
                    <img src="file/{{ $file->file }}" alt="No Photo">
                @endforeach
            </div>
        </div>
    @endif
@endif

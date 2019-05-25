<label class="inp">
    <textarea rows="4" cols="50" name="{{ $name }}[]" placeholder="&nbsp;">{{ $value ?? old($name) }}</textarea>
    <span class="label">Paragraph 1</span>
    <span class="border"></span>
</label>
@if($errors->has($name))
    <p> {{ $errors->first($name) }} </p>
@endif
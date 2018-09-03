<label class="inp">
    <input type="text" name="{{ $name }}" value="{{ $value ?? old($name) }}" placeholder="&nbsp;">
    <span class="label">Your {{ title_case($name) }}</span>
    <span class="border"></span>
</label>
@if($errors->has($name))
    <span class="alert error"> {{ $errors->first($name) }} </span>
@endif
<div class="form-group {{$classes ?? ''}}">
    @if(isset($label))
        <label for="{{$id ?? $name}}">{{$label}}</label>
    @endif

    <textarea name="{{$name}}" class="form-input" id="{{$id ?? $name}}" {{$attributes}}>{{$value ?? old($name)}}</textarea>

    @error($name)
    <p class="error" style="margin-top: 4px;">{{$message}}</p>
    @enderror
</div>

<div class="form-group {{$classes ?? ''}}">
    @if(isset($label))
        <label for="{{$id ?? $name}}">{{$label}}</label>
    @endif
    <div class="control-wrapper {{isset($icon) ? 'has-icon' : ''}}">
        <input name="{{$name}}" class="form-input" type="{{$type ?? 'text'}}" id="{{$id ?? $name}}"
               value="{{$value ?? old($name)}}"
            {{$attributes}}/>
        <span class="icon">{!! $icon ?? '' !!}</span>
    </div>

    @error($name)
    <p class="error" style="margin-top: 4px;">{{$message}}</p>
    @enderror
</div>

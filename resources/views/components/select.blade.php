<div class="form-group {{$classes ?? ''}}">
    @if(isset($label))
        <label for="{{$id ?? $name}}">{{$label}}</label>
    @endif

    <select name="{{$name}}" class="form-input" id="{{$id ?? $name}}" {{$attributes}}>
        <option disabled>{{$placeholder ?? 'Choisir une option'}}</option>

        @foreach($options as $key => $text)
            <option @if((old($name, $value ?? null)) == $key) selected @endif value="{{$key}}">{{$text}}</option>
        @endforeach
    </select>

    @error($name)
    <p class="error" style="margin-top: 4px;">{{$message}}</p>
    @enderror
</div>

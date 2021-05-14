<?php $position = \Stevebauman\Location\Facades\Location::get() ?>
@if($position)
    @if(\Illuminate\Support\Str::upper($position->countryCode) === 'MA') <strong>1600dhs/jour</strong> @else <strong>250€/jour</strong>@endif
@else<strong>1600dhs/jour</strong>@endif

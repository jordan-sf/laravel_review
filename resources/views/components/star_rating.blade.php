@php
    $clip_inset_right = 1 - ($rating - floor($rating));
    $clip_inset_right = sprintf('%d%%', $clip_inset_right * 100);
@endphp
<span class="star_rating" style="position:relative; white-space: nowrap;" data-rating="{{ $rating }}">
    <span class="stars_bottom" style="position: absolute; left: 0;">
    @for($i = 0; $i < 5; $i++)
            <i>&#x2606;</i>
        @endfor
    </span>
    <span class="stars_top">
    @for($i = 1; $i <= 5; $i++)
        @if($i > $rating + 1)
            <i style="visibility: hidden;">&#x2605;</i>
        @elseif($i > $rating)
            <i style="clip-path: inset(0 {{ $clip_inset_right }} 0 0)">&#x2605;</i>
        @else
            <i>&#x2605;</i>
        @endif
    @endfor
    </span>
</span>

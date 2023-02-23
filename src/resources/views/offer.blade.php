

@foreach ($offers as $offer)

    @if($offer->season =='none')
        $offer
    @else
        $offer->season
    @endif
@endforeach


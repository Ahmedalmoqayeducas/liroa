@foreach ($activities as $activity)
    @include('partials.activity_item', ['activity' => $activity])
@endforeach

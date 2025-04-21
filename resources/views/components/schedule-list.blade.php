@if ($schedules->count())
    <ul class="list-unstyled list-unstyled-border">
        @foreach ($schedules as $schedule)
            <li class="media">
                <div class="media-body">
                    <div class="media-title">{{ $schedule->title }}</div>
                    <div class="text-small">{{ $schedule->event_location }}</div>
                    <div class="d-flex mt-1" style="gap: .25rem">
                        {{ \Carbon\Carbon::parse($schedule->event_date)->locale('id')->isoFormat('D MMMM YYYY') }}
                        |
                        {{ \Carbon\Carbon::parse($schedule->start_time)->format('H:i') }}
                        -
                        {{ \Carbon\Carbon::parse($schedule->end_time)->format('H:i') }}
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
@else
    <ul class="list-unstyled list-unstyled-border">
        <li class="media">
            <div class="media-body text-center">
                Tidak ada kegiatan
            </div>
        </li>
    </ul>
@endif

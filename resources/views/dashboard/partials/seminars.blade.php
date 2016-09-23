<div class="ui three stackable link cards">

    @foreach ( $seminars as $seminar)

    <a class="card" href="{{ route('seminar', ['name' => $seminar->name ]) }}">

        <div class="image">

            {{-- @TODO IMAGE PATH VERARBEITUNG CHECKEN!!! --}}
            <img src="{{ asset( $seminar->image_path ) }}">

        </div>

        <div class="content">

            <div class="header">
                {{ $seminar->name }}
            </div>

            <div class="meta">
                {{ $seminar->subject }} ({{ $seminar->module }})
            </div>

            <div class="description">
                {{ $seminar->description }}
            </div>

        </div>

        <div class="extra content">

            <span class="right floated">
                {{ $seminar->author }}
            </span>

            <span>
                <i class="user icon"></i>
                {{ $seminar->users_count }}
            </span>
    </div>

</a>

    @endforeach

</div>

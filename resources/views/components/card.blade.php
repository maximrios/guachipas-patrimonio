
    <div class="x_panel {{ $class }}">
        @if ($title)
            <div class="x_title">
                <h2>{{ $title }}</h2>
                <div class="clearfix"></div>
            </div>
        @endif
        <div class="x_content">
            {{ $slot }}
        </div>
    </div>

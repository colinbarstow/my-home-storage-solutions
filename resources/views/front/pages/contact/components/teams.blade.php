<section class="team-section pt-10 pb-9">
    <div class="container">
        <h2 class="title mt-2">Meet our team</h2>
        <div class="row cols-sm-2 cols-md-4">
            @foreach($teams as $team)
                <div class="member appear-animate" data-animation-options="{'name': 'fadeInLeftShorter'}">
                    <figure>
                        <img src="{{ \Illuminate\Support\Facades\Storage::url($team->image) }}" alt="{{ $team->name }}" width="280" height="280">
                    </figure>
                    <h4 class="member-name">{{ $team->name }}</h4>
                    <h5 class="member-job">{{ $team->job }}</h5>
                </div>
            @endforeach
        </div>
    </div>
</section>

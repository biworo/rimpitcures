<div class="section-wrapper bg-light team text-center" id="tim-kami">
    <div class="section-title">
        <h2>Our Team</h2>
    </div>
    <div class="section-content">
        <div class="container">
            <div class="row">
                @foreach(config('rims.teams') as $team)
                <div class="col-md-3">
                    <div class="card c-team mb-5">
                        <div class="card-header">
                            {{-- <img src="{{ $team['img'] }}" class="avatar" alt=""> --}}
                            <div class="img-avatar" style="background: url('{{$team['img']}}')"></div>
                            <h3>{{ $team['name'] }}</h3>
                            <p class="small">{{ $team['position'] }}</p>
                        </div>
                        {{-- <div class="card-body">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, sed reiciendis
                                officiis molestiae nihil numquam minima adipisci quaerat, quod exercitationem
                                deleniti magni rem veniam maiores impedit sit nemo aliquam! Adipisci.
                            </p>
                        </div> --}}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

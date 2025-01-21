<div class="tab-pane fz-14 fw-400 inter pra fade active show" id="projects" role="tabpanel"
     aria-labelledby="projects-tab">
    @if($projects->count() > 0)
        <div class="row"> <!-- Add a row container -->
            @foreach($projects as $project)
                <div class="col-12 col-md-6 mt-4"> <!-- Each project is in col-6 for medium screens and above -->
                    <div class="chatbot__items mb-24 shadow-sm bg-light round16 p-3">
                        <div class="d-flex mb-24 flex-wrap align-items-center justify-content-between">
                            <a href="{{ route('projects.index', $project->slug) }}">
                                <h6 class="title fz-14">
                                    {{ $project->title }}
                                </h6>
                            </a>
                            <span class="fz-12 d-flex align-items-center gap-1 fw-400 inter title">
                                Budget: <span class="base inter fw-500">${{ $project->budget }}</span>
                            </span>

                            <span class="fz-12 d-flex align-items-center gap-1 fw-400 inter title">
                                    <span class="round16 badge bg-{{ status($project->status) }}">
                                        {{ statusName($project->status) }}
                                    </span>
                                </span>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    @else

        <div class="chatbot__items mt-24 shadow-sm bg-light round16 m-4 p-3">
            <h5 class="title text-center justify-content-center fz-18 fw-500 inter">
                No Projects
            </h5>
        </div>

    @endif
</div>

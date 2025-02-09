@push('css')
    <style>
        .error {
            border-color: #dc3545;
        }

        .error {
            font-size: 0.875rem;
            color: #dc3545;
        }

    </style>
@endpush

{{-- If the logged‐in user is a Company and owns the project --}}
@if(auth()->guard('company')->check() && auth()->guard('company')->id() == $project->company_id)
    @if($project->offers->count() > 0)
        <h4 class="title mb-24">Offers</h4>
        @foreach($project->offers as $offer)
            <div class="review__commentbox mb-30">
                <div class="row bborderdash">
                    <div class="col">
                        <span class="fz-18 pb-24 d-flex gap-3 align-items-center fw-400 ptext2 inter">
                            {{ $offer->created_at->format('M d,Y') }}
                            <span class="dotactive ralt fz-16 ptext2 inter d-block">
                                {{ $offer->created_at->format('h:i a') }}
                            </span>
                        </span>
                    </div>
                    <div class="col m-2">
                        <div class="frm__grp d-flex justify-content-end align-items-end">
                            <button type="button" class="cmn--btn outline__btn" style="border: none">
                                <span id="spinner-accept" class="spinner-border spinner-border-sm text-primary" style="display: none"></span>
                                <span><i class="bi bi-check"></i></span>
                                <span>Accept</span>
                            </button>
                            <button type="button" class="cmn--btn outline__btn" style="border: none">
                                <span><i class="bi bi-chat"></i></span>
                                <span>Chat</span>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="pt-24 bborderdash pb-24">
                    <div class="ratting mb-8 d-flex align-items-center gap-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star{{ $i <= $offer->user->rate ? '-fill' : '' }}"></i>
                        @endfor
                    </div>
                    <p class="fz-16 fw-400 inter title">
                        {{ $offer->description }}
                    </p>
                    <div class="d-flex pt-24 gap-3 align-items-center">
                        <img style="object-fit: cover; width: 80px; height: 80px" src="{{ $offer->user->photo }}" class="round50" alt="re-img">
                        <div class="name__content">
                            <a href="{{route('talents.index', $offer->user->slug)}}" class="title">

                            <h5 class="title">
                                {{ $offer->user->name }}
                                <span class="d-block mt-1 ptext2 inter fz-16 fw-400">
                                    {{ $offer->user->specialization?->title_en }}
                                </span>
                            </h5>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="cmn__replaybox pt-24 pb-24">
                    <div class="replays d-flex align-items-center">
                        <a href="javascript:void(0)" class="align-items-center d-flex gap-2">
                            <i class="bi bi-cash base fz-20"></i>
                            <span class="fz-18 fw-400 inter base">
                                ${{ $offer->cost }}
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="align-items-center d-flex gap-2">
                            <i class="bi bi-clock-history base fz-20"></i>
                            <span class="fz-18 fw-400 inter base">
                                {{ $offer->duration }} Days
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    @endif

    {{-- Elseif the logged‐in user is a Talent --}}
@elseif(auth('talent')->check())
    @if($project->status == 1)
        @if($myOffer->count() <= 0)
            <h4 class="title mb-24">Add Proposal</h4>
            <div class="attachment__footertag mt-30 gap-3 flex-wrap d-flex align-items-center justify-content-between">
                <form id="sendProposal" class="row g-4" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="project_id" value="{{ $project->id }}">

                    <div class="col-lg-6 basig__grpinput">
                        <label for="duration" class="fz-20 fw-500 inter mb-16 title">Duration</label>
                        <input class="addquestion" type="number" name="duration" id="duration" placeholder="Days">
                    </div>

                    <div class="col-lg-6 basig__grpinput">
                        <label for="cost" class="fz-20 fw-500 inter mb-16 title">Cost</label>
                        <input class="addquestion" type="number" name="cost" id="cost" placeholder="$Cost">
                    </div>

                    <div class="col-lg-12">
                        <span class="fz-20 fw-500 inter title mb-16 d-block">Details</span>
                        <div>
                            <textarea id="bio" name="description" class="form-control round16" placeholder="Proposal Details" rows="10"></textarea>
                        </div>
                        <div class="d-flex align-items-center gap-4 flex-wrap mt-5 justify-content-end">
                            <button id="profile-update" type="submit" class="cmn--btn">
                                <span id="spinner" class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                                <span id="save-change">Send Proposal</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @else
            {{-- Display the existing offer details --}}
            <div class="review__commentbox mb-30">
                <span class="fz-18 bborderdash pb-24 d-flex gap-3 align-items-center fw-400 ptext2 inter">
                    {{ $myOffer[0]->created_at->format('M d,Y') }}
                    <span class="dotactive ralt fz-16 ptext2 inter d-block">
                        {{ $myOffer[0]->created_at->format('h:i a') }}
                    </span>
                </span>

                <div class="pt-24 bborderdash pb-24">
                    <div class="ratting mb-8 d-flex align-items-center gap-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star{{ $i <= $myOffer[0]->user->rate ? '-fill' : '' }}"></i>
                        @endfor
                    </div>

                    <p class="fz-16 fw-400 inter title">
                        {{ $myOffer[0]->description }}
                    </p>
                    <div class="d-flex pt-24 gap-3 align-items-center">
                        <img style="object-fit: cover; width: 80px; height: 80px" src="{{ $myOffer[0]->user->photo }}" class="round50" alt="re-img">
                        <div class="name__content">
                            <h5 class="title">
                                {{ $myOffer[0]->user->name }}
                                <span class="d-block mt-1 ptext2 inter fz-16 fw-400">
                                    {{ $myOffer[0]->user->specialization?->title_en }}
                                </span>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="cmn__replaybox pt-24 pb-24">
                    <div class="replays d-flex align-items-center">
                        <a href="javascript:void(0)" class="align-items-center d-flex gap-2">
                            <i class="bi bi-cash base fz-20"></i>
                            <span class="fz-18 fw-400 inter base">
                                ${{ $myOffer[0]->cost }}
                            </span>
                        </a>
                        <a href="javascript:void(0)" class="align-items-center d-flex gap-2">
                            <i class="bi bi-clock-history base fz-20"></i>
                            <span class="fz-18 fw-400 inter base">
                                {{ $myOffer[0]->duration }} Days
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    @else
        {{-- The project is not active --}}
        <div class="col-12 text-center justify-content-center">
            <a target="_blank" class="attachment__filitem round16 d-flex justify-content-center align-items-center text-center">
                The Project Status is {{ statusName($project->status) }}
            </a>
        </div>
    @endif

    {{-- Else, the user is not logged in as a Company or Talent --}}
@else
    <div class="col-12 text-center justify-content-center">
        <a href="{{ route('talent.login') }}" class="attachment__filitem round16 d-flex justify-content-center align-items-center text-center">
            Login to send Proposal
        </a>
    </div>
@endif


@push('js')

    <script>
        $(document).ready(function () {
            $('#sendProposal').validate({
                rules: {
                    duration: {required: true, number: true, min: 1},
                    cost: {required: true, number: true, min: 0},
                    description: {required: true},
                },
                messages: {
                    duration: {
                        required: "Please enter the duration.",
                        number: "Duration must be a number.",
                        min: "Duration must be at least 1 day.",
                    },
                    cost: {
                        required: "Please enter the cost.",
                        number: "Cost must be a valid number.",
                        min: "Cost must be a positive value.",
                    },
                    description: "Please enter proposal details.",
                },

                submitHandler: function (form) {
                    submitForm();
                }
            });

            // AJAX Form Submission
            function submitForm() {
                const formData = new FormData($('#sendProposal')[0]);

                $.ajax({
                    url: '{{route("proposals.store")}}', // Replace with your actual backend URL
                    type: 'POST',
                    data: formData,
                    contentType: false,
                    processData: false,
                    beforeSend: function () {
                        $('#spinner').removeClass('d-none');
                        $('#save-change').text('Sending...');
                        clearErrors(); // Clear previous error messages
                    },
                    success: function (response) {
                        $('#spinner').addClass('d-none');
                        $('#save-change').text('Send Proposal');
                        toastr.success(response.message);
                        $('#sendProposal')[0].reset(); // Reset the form
                        location.reload(); // Reload the page
                    },
                    error: function (xhr) {
                        $('#spinner').addClass('d-none');
                        $('#save-change').text('Send Proposal');

                        if (xhr.status === 422) {
                            // Validation errors
                            displayErrors(xhr.responseJSON.errors);
                        } else {
                            toastr.error(xhr.responseJSON.message || 'An error occurred.');
                        }
                    }
                });
            }

            // Clear previous error messages
            function clearErrors() {
                $('.error-message').remove(); // Remove error spans
                $('.is-invalid').removeClass('is-invalid'); // Remove error styling
            }

            // Display validation errors
            function displayErrors(errors) {
                $.each(errors, function (field, messages) {
                    const inputField = $(`[name="${field}"]`);
                    inputField.addClass('is-invalid'); // Add error styling
                    inputField.after(`<span class="error-message text-danger">${messages[0]}</span>`); // Display error message
                });
            }
        });
    </script>

@endpush


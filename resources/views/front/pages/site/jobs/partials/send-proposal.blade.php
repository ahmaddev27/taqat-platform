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


@if(auth()->guard('company')->check() && auth()->guard('company')->id() == $job->company_id)
    {{-- COMPANY VIEW: Show job applications if any --}}
    @if($job->applies->count() > 0)
        <h4 class="title mb-24">Offers</h4>
        @foreach($job->applies as $apply)
            <div class="review__commentbox mb-30">
                <div class="row bborderdash">
                    <div class="col">
                        <span class="fz-18 pb-24 d-flex gap-3 align-items-center fw-400 ptext2 inter">
                            {{ $apply->created_at->format('M d,Y') }}
                            <span class="dotactive ralt fz-16 ptext2 inter d-block">
                                {{ $apply->created_at->format('h:i a') }}
                            </span>
                        </span>
                    </div>
                    <div class="col m-2">
                        <div class="frm__grp d-flex justify-content-end align-items-end">
                            <button type="button" class="cmn--btn outline__btn" style="border: none">
                                <span id="spinner-accept" class="spinner-border spinner-border-sm text-primary"
                                      style="display: none"></span>
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
                            <i class="bi bi-star{{ $i <= $apply->user->rate ? '-fill' : '' }}"></i>
                        @endfor
                    </div>
                    <p class="fz-16 fw-400 inter title">
                        {{ $apply->description }}
                    </p>
                    <div class="d-flex pt-24 gap-3 align-items-center">
                        <img style="object-fit: cover; width: 60px; height: 60px" src="{{ $apply->user->photo }}"
                             class="round50" alt="re-img">
                        <div class="name__content">
                            <a href="{{route('talents.index', $apply->user->slug)}}" class="title">
                            <h5 class="title">
                                {{ $apply->user->name }}
                                <span class="d-block mt-1 ptext2 inter fz-16 fw-400">
                                    {{ $apply->user->specialization?->title_en }}
                                </span>
                            </h5>
                            </a>
                        </div>
                    </div>
                </div>
{{--                <div class="cmn__replaybox pt-24 pb-24">--}}
{{--                    <div class="replays d-flex align-items-center">--}}
{{--                        <a href="javascript:void(0)" class="align-items-center d-flex gap-2">--}}
{{--                            <i class="bi bi-cash base fz-20"></i>--}}
{{--                            <span class="fz-18 fw-400 inter base">--}}
{{--                                ${{ $apply->cost }}--}}
{{--                            </span>--}}
{{--                        </a>--}}
{{--                        <a href="javascript:void(0)" class="align-items-center d-flex gap-2">--}}
{{--                            <i class="bi bi-clock-history base fz-20"></i>--}}
{{--                            <span class="fz-18 fw-400 inter base">--}}
{{--                                {{ $apply->duration }} Days--}}
{{--                            </span>--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        @endforeach
    @endif

@elseif(auth('talent')->check())
    {{-- TALENT VIEW: If job is active, show form or applied details --}}
    @if($job->status == 1)
        @if($MyApply->count() <= 0)
            <h4 class="title mb-24">Send Apply</h4>
            <div
                class="attachment__footertag mt-30 gap-3 flex-wrap d-flex align-items-center justify-content-between row">
                <form id="sendProposal" class="row g-4" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="job_id" value="{{ $job->id }}">

                    <div class="col-lg-12 row">
                        <span class="fz-20 fw-500 inter title mb-16 d-block">Details</span>
                        <div>
                            <textarea id="bio" name="description" class="form-control round16"
                                      placeholder="Applies Details" rows="10"></textarea>
                        </div>
                        <div class="d-flex align-items-center gap-4 flex-wrap mt-5 justify-content-end">
                            <button id="profile-update" type="submit" class="cmn--btn">
                                <span id="spinner" class="spinner-grow spinner-grow-sm d-none" role="status"
                                      aria-hidden="true"></span>
                                <span id="save-change">Apply</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        @else
            {{-- Display the existing application details --}}
            <div class="review__commentbox mb-30">
                <span class="fz-18 bborderdash pb-24 d-flex gap-3 align-items-center fw-400 ptext2 inter">
                    {{ $MyApply[0]->created_at->format('M d,Y') }}
                    <span class="dotactive ralt fz-16 ptext2 inter d-block">
                        {{ $MyApply[0]->created_at->format('h:i a') }}
                    </span>
                </span>
                <div class="pt-24 bborderdash pb-24">
                    <div class="ratting mb-8 d-flex align-items-center gap-2">
                        @for ($i = 1; $i <= 5; $i++)
                            <i class="bi bi-star{{ $i <= $MyApply[0]->user->rate ? '-fill' : '' }}"></i>
                        @endfor
                    </div>
                    <p class="fz-16 fw-400 inter title">
                        {{ $MyApply[0]->description }}
                    </p>
                    <div class="d-flex pt-24 gap-3 align-items-center">
                        <img  style="object-fit: cover; width: 60px; height: 60px" src="{{ $MyApply[0]->user->photo }}" class="round50" alt="re-img">
                        <div class="name__content">
                            <h5 class="title">
                                {{ $MyApply[0]->user->name }}
                                <span class="d-block mt-1 ptext2 inter fz-16 fw-400">
                                    {{ $MyApply[0]->user->specialization?->title_en }}
                                </span>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="cmn__replaybox pt-24 pb-24">
                    <div class="replays d-flex align-items-center">
                        <a href="javascript:void(0)" class="align-items-center d-flex gap-2">
                            <i class="bi bi-cash base fz-20"></i>
                            <span class="fz-18 fw-400 inter base">$452</span>
                        </a>
                        <a href="javascript:void(0)" class="align-items-center d-flex gap-2">
                            <i class="bi bi-clock-history base fz-20"></i>
                            <span class="fz-18 fw-400 inter base">5 Days</span>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    @else
        {{-- Job is not active --}}
        <div class="col-12 text-center justify-content-center">
            <a target="_blank"
               class="attachment__filitem round16 d-flex justify-content-center align-items-center text-center">
                The Project Status is {{ statusName($job->status) }}
            </a>
        </div>
    @endif

@else

    {{-- GUEST VIEW: Prompt login --}}
    <div class="col-12 text-center justify-content-center">
        <a href="{{ route('talent.login') }}"
           class="attachment__filitem round16 d-flex justify-content-center align-items-center text-center">
            Login to send Apply
        </a>
    </div>
@endif



@push('js')

    <script>
        $(document).ready(function () {
            $('#sendProposal').validate({
                rules: {
                    description: {required: true},
                },
                messages: {
                    description: "Please enter apply Job details.",
                },

                submitHandler: function (form) {
                    submitForm();
                }
            });

            // AJAX Form Submission
            function submitForm() {
                const formData = new FormData($('#sendProposal')[0]);
                $.ajax({
                    url: '{{route("applyJobs.apply")}}', // Replace with your actual backend URL
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
                        $('#save-change').text('Apply');
                        toastr.success(response.message);
                        $('#sendProposal')[0].reset(); // Reset the form
                        location.reload(); // Reload the page
                    },
                    error: function (xhr) {
                        $('#spinner').addClass('d-none');
                        $('#save-change').text('Apply');

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


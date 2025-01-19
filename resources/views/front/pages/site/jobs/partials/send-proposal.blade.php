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

@if($MyApply->count()<=0 && $job->status==1 && auth('talent')->user())

    <h4 class="title mb-24">
       Send Apply
    </h4>

    <div
        class="attachment__footertag mt-30 gap-3 flex-wrap d-flex align-items-center justify-content-between row">
        <form id="sendProposal" class="row g-4"
              enctype="multipart/form-data">
            @csrf
            <input type="hidden" value="{{$job->id}}" name="job_id">


            <div class="col-lg-12 row ">
                <span class="fz-20 fw-500 inter title mb-16 d-block">
                    Details
                </span>

                <div>
                    <textarea id="bio" name="description" class="form-control round16" placeholder="Applies Details"
                              rows="10"></textarea>
                </div>


                <div class="d-flex align-items-center gap-4 flex-wrap mt-5 justify-content-end">
                    <button id="profile-update" type="submit"
                            class="cmn--btn">
                        <span id="spinner"
                              class="spinner-grow spinner-grow-sm d-none"
                              role="status"
                              aria-hidden="true"></span>
                        <span id="save-change">Apply </span>
                    </button>
                </div>
            </div>
        </form>


    </div>

@elseif($job->status!=1  && auth('talent')->user())
    <div class="col-12 text-center justify-content-center">
        <a target="_blank"
           class="attachment__filitem round16 d-flex  justify-content-center align-items-center text-center">
            The Project Status is {{ statusName($job->status) }}
        </a>
    </div>

@elseif(!auth('talent')->user())

    <div class="col-12 text-center justify-content-center">
        <a href="{{route('talent.login')}}"
           class="attachment__filitem round16 d-flex  justify-content-center align-items-center text-center">
            Login to send Proposal
        </a>
    </div>

@elseif($MyApply->count()>0)

    <div class="review__commentbox mb-30">
                     <span class="fz-18 bborderdash pb-24 d-flex gap-3 align-items-cener fw-400 ptext2 inter">
                        {{$MyApply[0]->created_at->format('M d,Y')}}
                        <span class="dotactive ralt fz-16 ptext2 inter d-block">
                             {{$MyApply[0]->created_at->format('h:i a')}}
                        </span>
                     </span>

        <div class="pt-24 bborderdash pb-24">
            <div class="ratting mb-8 d-flex align-items-center gap-2">
                @for ($i = 1; $i <= 5; $i++)
                    <i class="bi bi-star{{ $i <= $MyApply[0]->user->rate ? '-fill' : '' }}"></i>
                @endfor
            </div>

            <p class="fz-16 fw-400 inter title">
                {{$MyApply[0]->description}}
            </p>
            <div class="d-flex pt-24 gap-3 align-items-center">
                <img width="80px" src="{{$MyApply[0]->user->photo}}" class="round50" alt="re-img">
                <div class="name__content">
                    <h5 class="title">
                        {{$MyApply[0]->user->name}}
                        <span class="d-block mt-1 ptext2 inter fz-16 fw-400">
                                  {{$MyApply[0]->user->specialization->title_en}}
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
                               $452
                              </span>
                </a>
                <a href="javascript:void(0)" class="align-items-center d-flex gap-2">
                    <i class="bi bi-clock-history  base fz-20"></i>
                    <span class="fz-18 fw-400 inter base">
                                5 Days
                              </span>
                </a>
            </div>
        </div>

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


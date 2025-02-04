<div class="tab-pane base fade bg-light round16 p-5" id="nav-password" role="tabpanel"
     aria-labelledby="nav-profile-tab">

    <form id="updatePasswordForm" class="row g-4 " enctype="multipart/form-data">
        @csrf
        <div class="basic__infos mb-24">

            <div class="col-lg-12 basig__grpinput  mb-24">
                <label for="old_password" class="fz-20 fw-500 inter mb-8 title">Old Password</label>
                <input class="addquestion" name="old_password" type="password" id="old_password" placeholder="Enter old password">
            </div>

            <div class="col-lg-12 basig__grpinput  mb-24">
                <label for="new_password" class="fz-20 fw-500 inter mb-8 title">New Password</label>
                <input class="addquestion" name="password" type="password" id="new_password" placeholder="Enter new password">
            </div>

            <div class="col-lg-12 basig__grpinput mb-24">
                <label for="confirm_password" class="fz-20 fw-500 inter mb-8 title">Confirm Password</label>
                <input class="addquestion" name="password_confirmation" type="password" id="confirm_password" placeholder="Confirm new password">
            </div>

            <div class="d-flex align-items-center gap-4 flex-wrap mt-5 justify-content-end">
                <button id="password-update" type="submit" class="cmn--btn">
                    <span id="spinner-password" class="spinner-grow spinner-grow-sm d-none" role="status" aria-hidden="true"></span>
                    <span id="save-change-password">Update Password</span>
                </button>
            </div>

        </div>
    </form>
</div>

@push('js')

    <script>
        $(document).ready(function () {
            $('#updatePasswordForm').validate({
                rules: {
                    old_password: { required: true },
                    password: { required: true, minlength: 8 },
                    password_confirmation: { required: true, equalTo: "#new_password" }
                },
                messages: {
                    old_password: "Please enter your old password.",
                    password: {
                        required: "Please enter a new password.",
                        minlength: "Password must be at least 8 characters long."
                    },
                    password_confirmation: {
                        required: "Please confirm your new password.",
                        equalTo: "Passwords do not match."
                    }
                },
                submitHandler: function (form) {
                    let formData = $(form).serialize();

                    $('#spinner-password').removeClass('d-none');
                    $('#save-change-password').text('Updating...');

                    $.ajax({
                        url: "{{ route('password.update') }}", // Update this route as needed
                        type: "POST",
                        data: formData,
                        success: function (response) {
                            toastr.success(response.message, 'Success', { timeOut: 3000 });
                            $('#updatePasswordForm')[0].reset(); // Clear form after success
                        },
                        error: function (xhr) {
                            let errorMessage = "Error updating password. Please try again.";
                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                errorMessage = Object.values(xhr.responseJSON.errors).flat().join('<br>'); // Get validation errors
                            }
                            toastr.error(errorMessage, 'Error', { timeOut: 5000 });
                        },
                        complete: function () {
                            $('#spinner-password').addClass('d-none');
                            $('#save-change-password').text('Save Change');
                        }
                    });
                }
            });
        });
    </script>
@endpush

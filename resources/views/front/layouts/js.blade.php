<!--Jquery 3 6 0 Min Js-->
<script src="{{asset('front/assets/js/jquery-3.7.0.min.js')}}"></script>
<!--Bootstrap bundle Js-->
<script src="{{asset('front/assets/js/plugin.js')}}"></script>
<!--main Js-->
<script src="{{asset('front/assets/js/main.js')}}"></script>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- jQuery CDN -->

<!-- jQuery Validate CDN -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const images = document.querySelectorAll("img");

        images.forEach((img) => {
            if (!img.hasAttribute("loading")) {
                img.setAttribute("loading", "lazy");
            }
        });
    });

</script>



<script>
    $(document).ready(function () {
        @if (session('message'))
        var type = "{{ session('alert-type', 'info') }}";

        switch (type) {
            case 'info':
                toastr.info("{{ session('message') }}");
                break;
            case 'success':
                toastr.success("{{ session('message') }}");
                break;
            case 'warning':
                toastr.warning("{{ session('message') }}");
                break;
            case 'error':
                toastr.error("{{ session('message') }}");
                break;
        }
        @endif
    });
</script>

<script>
    $('.date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        todayHighlight: true
    });
</script>



{{-- delete--}}
<script>
    $(document).on("click", '#delete', function (e) {
        e.preventDefault();

        var $this = $(this);
        var model_id = $this.attr('data-id');
        var route = $this.attr('data-route');
        var reload = $this.attr('data-reload');

        // Disable button and show spinner
        $this.prop('disabled', true);
        $this.find("#spinner-delete").removeClass('d-none');

        Swal.fire({
            title: 'Are you sure?',
            text: 'You won\'t be able to revert this!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'rgba(232, 37, 37, 0.66)',
            cancelButtonColor: 'rgb(43, 93, 140)',
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    url: route,
                    type: "POST",
                    dataType: "json",
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id": model_id
                    },
                    success: function (response) {
                        toastr.warning('Deleted successfully!');
                        if (reload) {
                            setTimeout(function () {
                                location.reload();
                            }, 300);
                        }
                    },
                    error: function (xhr) {
                        toastr.error('Not Deleted successfully!');
                        $this.prop('disabled', false);
                        $this.find("#spinner-delete").addClass('d-none');
                    },
                    complete: function () {
                        $this.find("#spinner-delete").addClass('d-none');
                    }
                });
            } else {
                // Re-enable button and hide spinner
                $this.prop('disabled', false);
                $this.find("#spinner-delete").addClass('d-none');
            }
        });
    });
</script>

@stack('js')


{{--project-detials--}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="btn btn-light-dark" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <span class="badge badge-secondary bg-dark">{{trans('main.project_description')}}</span>
                <div class="p-3 text-dark bborderdash" id="project-description"></div>


                <div id="project-images" class="d-flex flex-wrap"></div>

                <div id="project-attachments" class=" bborderdash">
                    <div id="project-attachments" class="p-2">
                        <span class="badge badge-secondary bg-dark my-3">{{ trans('main.attachments') }}</span>


                        <div class="row g-4 justify-content-center" id="attachments-list">

                            <div class="col-xl-12 col-lg-12">
                                <div class="service__detailswrapper">
                                    <div class="trending__based mb-40 bg-light round16 shadow-sm"
                                         style="margin: auto;width: 80%">
                                        <div class="swiper mySwiper2">

                                            <div class="swiper-wrapper">

                                                <div class="swiper-slide">
                                                    <img src="{{asset('front/assets/img/details/aida1.jpg')}}"
                                                         alt="img">
                                                </div>


                                            </div>
                                        </div>

                                        <div class="small__mainwrappper ralt">
                                            <div class="swiper mySwiper small__thumbwrapper">
                                                <div class="swiper-wrapper small__thumbslider">
                                                    <div class="swiper-slide">
                                                        <img src="{{asset('front/assets/img/details/aidas1.jpg')}}"
                                                             alt="img">
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="swiper-button-next">
                                                <i class="bi bi-chevron-right"></i>
                                            </div>
                                            <div class="swiper-button-prev">
                                                <i class="bi bi-chevron-left"></i>
                                            </div>
                                        </div>

                                    </div>


                                </div>
                            </div>


                            <!-- Gallery Two Block -->

                        </div>

                        <div class="row g-4 justify-content-center text-dark" id="no-images-message">

                            No images available for this project.

                            <!-- Gallery Two Block -->

                        </div>


                    </div>

                    <hr class="dashed">


                </div>

                <div class="d-flex justify-content-center align-items-center p-3" style="font-size: 20px">
                    <div class="" id="project-url">

                    </div>
                </div>

                {{--                <div class="modal-footer">--}}
                {{--                    <button type="button" class="btn btn-secondary" data-dismiss="modal">{{trans('main.Close')}}</button>--}}
                {{--                </div>--}}
            </div>
        </div>
    </div>

</div>




@push('js')

    {{--project-detials--}}
    <script>
        $(document).ready(function () {
            $('#exampleModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var title = button.data('title');
                var description = button.data('description');
                var url = button.data('url');
                var attachments = button.data('images'); // This should be a JSON array of attachments

                var modal = $(this);
                modal.find('.modal-title').text(title);
                modal.find('#project-description').html(description);

                // Clear previous Swiper content
                var mainSwiperWrapper = modal.find('.mySwiper2 .swiper-wrapper');
                var thumbSwiperWrapper = modal.find('.mySwiper .swiper-wrapper');
                mainSwiperWrapper.empty();
                thumbSwiperWrapper.empty();

                // Set project URL if available
                if (url && /^(https?|ftp):\/\/[^\s/$.?#].[^\s]*$/.test(url)) {
                    modal.find('#project-url').html('<span class="badge bg-dark"> ' +
                        '<i class="bi bi-link-45deg"></i><a  href="' + url + '" target="_blank" class="text-white">{{ trans('main.url') }}</a></span>');
                } else {
                    modal.find('#project-url').html('');
                }

                if (attachments && Array.isArray(attachments) && attachments.length > 0) {
                    // Show Swiper and append images
                    modal.find('#attachments-list').show(); // Show Swiper container
                    modal.find('#no-images-message').hide(); // Hide the no images message

                    attachments.forEach(function (attachment) {
                        var attachmentUrl = attachment
                            ? `${attachment}`
                            : null;

                        if (attachmentUrl) {
                            // Add to main Swiper
                            var mainSlide = `
                        <div class="swiper-slide">
                            <a href="${attachmentUrl}" target="_blank">
                                <img style="height: 500px; object-fit: cover" src="${attachmentUrl}" alt="Attachment Image" loading="lazy">
                            </a>
                        </div>`;
                            mainSwiperWrapper.append(mainSlide);

                            // Add to thumbnail Swiper
                            var thumbSlide = `
                        <div class="swiper-slide">
                            <img style="height: 100px; object-fit: cover" src="${attachmentUrl}" alt="Thumbnail Image" loading="lazy">
                        </div>`;
                            thumbSwiperWrapper.append(thumbSlide);
                        }
                    });

                    // Reinitialize Swipers after dynamically adding slides
                    initializeSwipers();
                } else {
                    // Hide Swiper and show no images message
                    modal.find('#attachments-list').hide(); // Hide Swiper container
                    modal.find('#no-images-message').show(); // Show the no images message
                }
            });

            function initializeSwipers() {
                // Thumbnail Swiper
                var mySwiperThumb = new Swiper('.mySwiper', {
                    spaceBetween: 10,
                    slidesPerView: 4,
                    freeMode: true,
                    watchSlidesProgress: true,
                    loop: true, // Ensures smooth cycling of thumbnails
                });


                // Main Swiper
                var mySwiper2 = new Swiper('.mySwiper2', {
                    spaceBetween: 10,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    loop: true,
                    thumbs: {
                        swiper: mySwiperThumb, // Link the thumbnail Swiper to the main Swiper
                    },
                });
            }
        });
    </script>

@endpush

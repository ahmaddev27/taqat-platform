<div class="tab-pane base fade  show active" id="nav-contact" role="tabpanel"
     aria-labelledby="nav-contact-tab">
    <div class="accordion profile__gigedit" id="accordionExample">
        <div class="accordion-item mb-40">


            <div id="collapseOne" class="accordion-collapse collapse show"
                 aria-labelledby="headingOne">
                <div class="accordion-body">

                    <form id="updateProfileForm" class="row g-4"
                          enctype="multipart/form-data">
                        @csrf
                        <div class="basic__infos mb-24">
                            <div
                                class="d-flex flex-wrap basic__proadded align-items-center justify-content-center">
                                <div
                                    class="pro__andthumb d-flex align-items-center">

                                    <div class="pro__photo">
                                        <img id="profileImage"
                                             style="height: 160px;width: 150px"
                                             class="img-fluid shadow-sm profile__check ralt "
                                             src="{{$company->getPhoto()}}"
                                             alt="freelance"/>
                                    </div>
                                </div>

                                <div
                                    class="update__btn d-flex align-items-center m-2">
                                    <a href="javascript:void(0)"
                                       class="cmn--btn"
                                       onclick="document.getElementById('imageInput').click()">
                                                                            <span>
                                                                                  Edit Photo
                                                                            </span>
                                    </a>
                                </div>
                            </div>

                            <!-- Hidden file input -->
                            <input type="file" id="imageInput" name="photo"
                                   style="display: none;"
                                   accept="image/*"
                                   onchange="previewImage(event)"/>
                        </div>
                        <div class="col-lg-6 basig__grpinput">
                            <label for="name"
                                   class="fz-20 fw-500 inter mb-16 title">Full
                                name</label>
                            <input class="addquestion" type="text"
                                   value="{{$company->name}}" name="name"
                                   id="name"
                                   placeholder="Enter name">
                        </div>

                        <div class="col-lg-6 basig__grpinput">
                            <label for="email1s"
                                   class="fz-20 fw-500 inter mb-16 title">Email</label>
                            <input class="addquestion" name="email" type="text"
                                   value="{{$company->email}}"
                                   id="email1s"
                                   placeholder="Enter email">
                        </div>

                        <div class="col-lg-6 basig__grpinput">
                            <label for="numbr"
                                   class="fz-20 fw-500 inter mb-16 title">Phone</label>
                            <input class="addquestion" name="mobile"
                                   value="{{$company->mobile}}"
                                   type="text" id="mobile"
                                   placeholder="Enter Mobile">
                        </div>

                        <div class="col-lg-6 basig__grpinput">
                            <label for="location"
                                   class="fz-20 fw-500 inter mb-16 title">location
                            </label>
                            <input class="addquestion" name="location"
                                   value="{{$company->location}}"
                                   type="text" id="location"
                                   placeholder="Enter location">
                        </div>


                        {{--                                                            <div class="col-lg-12 basig__grpinput">--}}
                        {{--                                                                <label for="numbr"--}}
                        {{--                                                                       class="fz-20 fw-500 inter mb-16 title">Salary--}}
                        {{--                                                                    <span class="pra">($)</span></label>--}}
                        {{--                                                                <input value="{{$company->sallary}}"--}}
                        {{--                                                                       class="addquestion"--}}
                        {{--                                                                       name="sallary"--}}
                        {{--                                                                       type="number" id="sallary"--}}
                        {{--                                                                       placeholder="Enter number">--}}
                        {{--                                                            </div>--}}

                        <div class="col-lg-12  ">

                                                            <span class="fz-20 fw-500 inter title mb-16 d-block">
                                                                  BIO:
                                                               </span>

                            <div>

                                                                <textarea id="bio" name="bio"
                                                                          class="form-control round16"
                                                                          rows="10">{!! $company->description !!}</textarea>
                                {{--                                                                <button id="ai-generate" type="button" class="btn btn-secondary">Write with AI</button>--}}
                                {{--                                                                <p id="error-message" style="color: red; display: none;">Generated text must be at least 30 characters.</p>--}}
                            </div>


                            <div
                                class="d-flex align-items-center gap-4 flex-wrap mt-5 justify-content-end">
                                <button id="profile-update" type="submit"
                                        class="cmn--btn">
                                                                    <span id="spinner"
                                                                          class="spinner-grow spinner-grow-sm d-none"
                                                                          role="status" aria-hidden="true"></span>
                                    <span id="save-change">Save Change</span>
                                </button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>

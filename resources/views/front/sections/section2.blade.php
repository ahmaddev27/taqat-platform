<!-- Company Logo Here -->
<section class="company__section bgwhite pb-60 pt-60">
    <div class="container">
        <div class="company__wrap owl-thmee owl-carousel">
            @foreach(partners() as $p)
            <div class="company__logo">
                <img src="{{url($p->logo)}}" style="width:130px" alt="company">
            </div>

            @endforeach
        </div>
    </div>
</section>
<!-- Company Logo End -->

<!--Jquery 3 6 0 Min Js-->
<script src="{{asset('front/assets/js/jquery-3.7.0.min.js')}}"></script>
<!--Bootstrap bundle Js-->
<script src="{{asset('front/assets/js/plugin.js')}}"></script>
<!--main Js-->
<script src="{{asset('front/assets/js/main.js')}}"></script>

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

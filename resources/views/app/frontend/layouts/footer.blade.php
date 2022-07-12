<footer>
    <div class="container">
        <p>Copyright © KKN Tematik</p>
    </div>
</footer>

<script>
    window.onscroll = function () {
        scrollFunction()
    };

    function scrollFunction() {
        if (document.body.scrollTop > 30 || document.documentElement.scrollTop > 30) {

            document.getElementById("navbar").style.background = "#fff";
            document.getElementById("navbar").classList.remove('navbar-dark');
            document.getElementById("navbar").classList.add('navbar-light');
            document.getElementById("brand").src = 'asset/images/logo.png';
        } else if (document.body.scrollTop < 20 || document.documentElement.scrollTop < 20) {
            document.getElementById("navbar").classList.remove('navbar-light');
            document.getElementById("navbar").classList.add('navbar-dark');
            document.getElementById("navbar").style.background = "none";
            document.getElementById("brand").src = 'asset/images/logo-light.png';
        }
    }
</script>

<script src="https://cdn.jsdelivr.net/npm/notyf@3/notyf.min.js"></script>

<script>
    function lazyLoadImages() {
        var lazyloadImages;

        if ("IntersectionObserver" in window) {
            lazyloadImages = document.querySelectorAll(".lazy");
            var imageObserver = new IntersectionObserver(function (entries, observer) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        var image = entry.target;
                        if (image.dataset.hasOwnProperty('src')) {
                            image.src = image.dataset.src;
                        } else if (image.dataset.hasOwnProperty('bg')) {
                            image.style.backgroundImage = 'url(' + image.dataset.bg + ')';
                        }
                        image.classList.remove("lazy");
                        imageObserver.unobserve(image);
                    }
                });
            });

            lazyloadImages.forEach(function (image) {
                imageObserver.observe(image);
            });
        } else {
            var lazyloadThrottleTimeout;
            lazyloadImages = document.querySelectorAll(".lazy");

            function lazyload() {
                if (lazyloadThrottleTimeout) {
                    clearTimeout(lazyloadThrottleTimeout);
                }

                lazyloadThrottleTimeout = setTimeout(function () {
                    var scrollTop = window.pageYOffset;
                    lazyloadImages.forEach(function (img) {
                        if (img.offsetTop < (window.innerHeight + scrollTop)) {
                            img.src = img.dataset.src;
                            if (img.dataset.hasOwnProperty('src')) {
                                img.src = img.dataset.src;
                            } else if (img.dataset.hasOwnProperty('bg')) {
                                img.style.backgroundImage = 'url(' + img.dataset.bg + ')';
                            }
                            img.classList.remove('lazy');
                        }
                    });
                    if (lazyloadImages.length == 0) {
                        document.removeEventListener("scroll", lazyload);
                        window.removeEventListener("resize", lazyload);
                        window.removeEventListener("orientationChange", lazyload);
                    }
                }, 20);
            }

            document.addEventListener("scroll", lazyload);
            window.addEventListener("resize", lazyload);
            window.addEventListener("orientationChange", lazyload);
        }
    }
    document.addEventListener("turbo:load", lazyLoadImages);
</script>

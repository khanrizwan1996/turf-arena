<footer>
    <div class="wrapper__footer bg__footer" style="padding: 0px 0;">
        <div class=" container">
            <div class="row">
                <div class="col-md-12">

                    <p>
                    <h4 class="footer-title text-white">follow us </h4>
                    <button class="btn btn-social btn-social-o facebook mr-1">
                        <i class="fa fa-facebook-f"></i>
                    </button>
                    <button class="btn btn-social btn-social-o twitter mr-1">
                        <i class="fa fa-twitter"></i>
                    </button>

                    <button class="btn btn-social btn-social-o linkedin mr-1">
                        <i class="fa fa-linkedin"></i>
                    </button>
                    <button class="btn btn-social btn-social-o instagram mr-1">
                        <i class="fa fa-instagram"></i>
                    </button>

                    <button class="btn btn-social btn-social-o youtube mr-1">
                        <i class="fa fa-youtube"></i>
                    </button>
                    </p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Footer Bottom -->
    <div class="bg__footer-bottom ">
        <div class="container">
            <div class="row flex-column-reverse flex-md-row">
                <div class="col-md-6">
                    <span>
                        © 2020 Rethouse Real Estate - Premium real estate & theme &amp; theme by
                        <a href="#">retenvi.com</a>
                    </span>
                </div>
                <div class="col-md-6">
                    <ul class="list-inline ">
                        <li class="list-inline-item">
                            <a href="#">
                                privacy
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                contact
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                about
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                faq
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
<script src="<?= HOST_URL ?>js/index.bundlebd04.js?8918068d71def746395d"></script>
<script src="<?= HOST_URL ?>js/app.js?v=<?= time() ?>"></script>
<script src="<?= HOST_URL ?>js/jquery.dataTables.min.js"></script>
<script src="<?= HOST_URL ?>js/dataTables.bootstrap5.min.js"></script>

<script>
    new DataTable('#resultsTable', {
        responsive: true
    });
</script>

<script>
    function toggleDropdown() {
      document.getElementById("profileDropdown").classList.toggle("show");
    }
    window.onclick = function(e) {
      if (!e.target.closest('.profile')) {
        document.getElementById("profileDropdown").classList.remove("show");
      }
    }
  </script>
</body>
</html>

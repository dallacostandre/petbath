<footer class="footer">
    <div class="container-fluid">
        <nav>
            <ul class="footer-menu">
                <li>
                    <a href="#">
                        Home
                    </a>
                </li>
                <li>
                    <a href="#">
                        Company
                    </a>
                </li>
                <li>
                    <a href="#">
                        Portfolio
                    </a>
                </li>
                <li>
                    <a href="#">
                        Blog
                    </a>
                </li>
            </ul>
            <p class="copyright text-center">
                ©
                <script>
                    document.write(new Date().getFullYear())
                </script>
                Desenvolvido por <a href="https://www.creatifdigital.com.br">Creatif Digital</a>
            </p>
        </nav>
    </div>
</footer>
</div>
</div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/jquery.mask.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/core/sweet.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-switch.js') }}"></script>
<script src="{{ asset('assets/js/plugins/chartist.min.js') }}"></script>
<script src="{{ asset('assets/js/plugins/bootstrap-notify.js') }}"></script>
<script src="{{ asset('assets/js/light-bootstrap-dashboard.js?v=2.0.0') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/demo.js') }}"></script>
<script src="{{ asset('../assets/font-awesome-pro/js/fontawesome.js') }}" rel="stylesheet"></script>
<script src="{{ asset('../assets/font-awesome-pro/js/regular.js') }}" rel="stylesheet"></script>
<script src="{{ asset('../assets/font-awesome-pro/js/all.js') }}" rel="stylesheet"></script>
{{-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> --}}

<script>
    $(document).ready(function() { 
        $("#list_financeiro").hide();
    });

    function() {
        $("#financeiro").click(function() {
            $("#list_financeiro").show();
        })

    }
</script>

</html>

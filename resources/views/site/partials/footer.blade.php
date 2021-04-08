<footer id="footer" class="footer wow fadeIn">
    <div class="top-arrow">
        <a href="#header" class="btn"><i class="fa fa-angle-up"></i></a>
    </div>
    @if($option->logo)
    <div class="footer-top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-10 col-lg-10 col-md-10 col-sm-10 col-xs-10 mx-auto footer-logo">
                    <img src="{{ asset('storage/options/'.$option->logo) }}" alt="{{ $option->name }}" />
                </div>
            </div>
        </div>
    </div>
    @endif
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bottom-top">
                        <div class="copyright">
                            <p>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All Right Reserved. Solution By <a target="_blank" href="{!! url($option->company_web_url) !!}">{!! $option->company_name !!}</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

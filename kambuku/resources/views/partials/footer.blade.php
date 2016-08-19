
<footer id="footer"><!--Footer-->
    <div class="footer-widget">
        <div class="container">
            <div class="row">

                @foreach($pages as $key => $value)
                <div class="col-sm-2">
                    <div class="single-widget">
                        <h2>{{ $key }}</h2>
                        <ul class="nav nav-pills nav-stacked">
                            @foreach($value as $v)
                            <li><a href="{{ route('content.show', $v['title']) }}">{{ $v['title'] }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach

                <div class="col-sm-3 col-sm-offset-1">
                    <div class="single-widget">
                        <h2>About Kambuku</h2>
                        <form action="#" class="searchform">
                            <input type="text" placeholder="Your email address" />
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                            <p>Subscribe and receive recent updates about Kambuku...</p>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Copyright © 2015 Kambuku Inc. All rights reserved.</p>
                <p class="pull-right">Designed by <span><a target="_blank" href="http://www.elev8mw.com">elev8mw</a></span></p>
                <p class="pull-right">Developed by <span><a target="_blank" href="http://www.apptitudetech.net">Apptitude Tech Systems</a></span></p>
            </div>
        </div>
    </div>

</footer><!--/Footer-->

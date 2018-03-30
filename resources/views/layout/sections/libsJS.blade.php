<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!--JQUERY 3.3.1-->
<script src="{!! url('//code.jquery.com/jquery-3.3.1.min.js') !!}"
        integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
        crossorigin="anonymous"></script>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
@if(Internet::is_connected())
    <!-- Latest compiled and minified JavaScript -->
    <script src="{!! secure_url('//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') !!}"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>
@else
    <script src="{!! asset('bootstrap/js/bootstrap.js/bootstrap.min.js') !!}"></script>
@endif



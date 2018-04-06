<div class="sidebar-nav-fixed pull-right affix">
    <div class="well well-lg">
        <ul class="nav list-group">
            <li class="nav-header text-center">
                <h1>Numero - Box</h1>
            </li>
            @foreach($calls as $call)
                <li class="list-group-item list-group-item-success well-lg">
                    <h2>{!! $call->number->code !!} - {!! $call->box->name !!}</h2>
                </li>
            @endforeach
        </ul>
    </div>
    <!--/.well -->
</div>
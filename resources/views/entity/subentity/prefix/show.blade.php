<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">Prefijos</h3>
    </div>
    <div class="panel-body">
        <div class="row">                
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="prefix">Prefijo</label>
                    <input type="text" class="form-control" id="prefix" name="prefix"
                           value="{!! $subEntity->prefix->prefix !!}" readonly>
                </div>
            </div>
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="priority">Prioridad</label>
                    <input type="text" class="form-control" id="priority" name="priority"
                           value="{!! $subEntity->prefix->priority !!}" readonly>
                </div>
            </div>
        </div>
        <div class="row">                
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="from">Desde</label>
                    <input type="number" class="form-control" id="from" name="from"
                           value="{!! $subEntity->prefix->from !!}" readonly>
                </div>
            </div>                                        
            <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                <div class="form-group">
                    <label for="to">Hasta</label>
                    <input type="number" class="form-control" id="to" name="to"
                           value="{!! $subEntity->prefix->to !!}" readonly>
                </div>
            </div>
        </div>
    </div>
</div>
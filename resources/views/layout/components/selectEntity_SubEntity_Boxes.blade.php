<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <div class="form-group">
        <label for="entitys">Seleccione la entidad</label>
        <select name="entity" id="entitys" class="form-control" {{$entityAttr}}>
            <option value="">-- Seleccione --</option>
            @foreach($entitys as $entity)
                <option value="{!! $entity->id !!}">{!! $entity->name !!}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <div class="form-group">
        <label for="subEntitys">Seleccione la sub entidad</label>
        <select name="subEntity" id="subEntitys" class="form-control" disabled {{$subEntityAttr}}>
            <option value="">-- Seleccione --</option>
        </select>
    </div>
</div>
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <div class="form-group">
        <label for="boxes">Seleccione el box correspondiente</label>
        <select name="box" id="boxes" class="form-control" disabled {{$boxAttr}}>
            <option value="">-- Seleccione --</option>
        </select>
    </div>
</div>
@push('scriptsJS')
    <script type="text/javascript">
        $('#entitys').on('change', function (e) {
            idEntity = $(this).find(':selected').val();
            $.getJSON('{!! url()->to('/') !!}' + '/components/' + idEntity + '/subentitys', function (data) {
                $('#subEntitys').removeAttr('disabled');
                subEntitys = data;
                $.each(subEntitys, function (i, v) {
                    option = $('<option/>');
                    option.val(v.id);
                    option.text(v.name);
                    $('#subEntitys').append(option);
                });
            });
        });
        $('#subEntitys').on('change', function (e) {
            idSubEntity = $(this).find(':selected').val();
            $.getJSON('{!! url()->to('/') !!}' + '/components/' + idSubEntity + '/boxes', function (data) {
                $('#boxes').removeAttr('disabled');
                boxes = data;
                $.each(boxes, function (i, v) {
                    option = $('<option/>');
                    option.val(v.id);
                    option.text(v.name);
                    $('#boxes').append(option);
                });
            });
        });
    </script>
@endpush


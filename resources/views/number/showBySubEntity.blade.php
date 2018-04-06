@extends('layout.app')
@section('content')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
            <div class="btn-group btn-group-lg">
                <button id="play" type="button" class="btn btn-default" onclick="getNumber()" title="Comenzar">
                    <span class="glyphicon glyphicon-play"></span>
                </button>
                <button id="next" type="button" class="btn btn-default" onclick="getNumber()" title="Siguiente numero"
                        disabled>
                    <span class="glyphicon glyphicon-forward"></span>
                </button>
                <button id="repeat" type="button" class="btn btn-default" onclick="recall()" title="Rellamar" disabled>
                    <span class="glyphicon glyphicon-repeat"></span>
                </button>
                <button id="stop" type="button" class="btn btn-default" onclick="endCall()" title="Finalizar llamada"
                        disabled>
                    <span class="glyphicon glyphicon-stop"></span>
                </button>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 5%">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="code" class="jumbotron text-center">
                <h1>Hola</h1>
                <p>Presione play para comenzar.....</p>
            </div>
        </div>
    </div>

@endsection
@push('scriptsJS')
    <script type="text/javascript">
        var idNumber;
        var idCall;

        function getNumber() {
            $.getJSON('{!! route('number.get', ['idBox' => Auth::user()->idBox]) !!}', function (data) {
                $('#code').empty();
                if (typeof data === "string") {
                    $('#code').html('<h1>' + data + '</h1>');
                    return data;
                } else {
                    $('#play').attr('disabled', true);
                    $('#repeat').attr('disabled', false);
                    $('#next').attr('disabled', false);
                    $('#stop').attr('disabled', false);
                    $('#code').html('<h1>' + data.number.code + '</h1>');
                    idNumber = data.number.id;
                    idCall = data.id;
                    $('#numbersList').empty().html(getNumbersList());
                }
            });
        }

        /* function createCall(idNum) {
             $.post('{!! route('call.store') !!}', {
                "_token": "{{ csrf_token() }}",
                'idBox': '{!! Auth::user()->idBox !!}',
                'idNumber': idNum
            }, function (data) {
                var call = data;
                idCall = call.id;
            }, 'json');
        }*/

        function recall() {
            var url = '{!! url()->to('/') !!}' + '/llamadas/rellamar/' + idCall;
            $.ajax({
                type: 'PUT',
                url: url,
                data: {"_token": "{{ csrf_token() }}", 'recall': true, 'end': false},
                success: function (response) {
                    if (response) {
                        $('#numbersList').empty().html(getNumbersList());
                    }
                }
            });
        }

        function getNumbersList() {
            return $.getJSON('{!! route('components.numbers.list') !!}', function (data) {
                return data;
            });
        }

        function endCall() {
            var url = '{!! url()->to('/') !!}' + '/llamadas/atendido/' + idCall;
            $.ajax({
                type: 'PUT',
                url: url,
                data: {"_token": "{{ csrf_token() }}", 'recall': false, 'end': true},
                success: function (response) {
                    if (response) {
                        $('#numbersColumn').empty().html(getNumbersList());
                    }
                }
            });
        }
    </script>
@endpush
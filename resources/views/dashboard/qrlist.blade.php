@foreach($list as $key => $lists)
    <div class="col-md-3">
        <div class="qr-block">
            <p>{{ $lists->name }}</p>
            <div id="svg-qrcode" class="svg-qrcodes">
                <img src="{{ asset('codes-qr/'.Auth::user()->id.'/'.$lists->id.'.svg') }}">
            </div>
            <div class="btn-qr-block">
                <a  href="{{ asset('codes-qr/'.Auth::user()->id.'/'.$lists->id.'.svg') }}"  download>
                    <div id="save-qr" class="btn btn-primary">Скачати</div>
                </a>
                <div id="delete-qr" data-index-id="{{ $lists->id }}" class="btn btn-danger">Видалити</div>
            </div>
        </div>
    </div>
@endforeach

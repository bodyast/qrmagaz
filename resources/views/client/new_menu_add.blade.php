@foreach($order as $orders)
    <div class="row">
        <div class="colsm3">
            <img class="order-menu-img" src="/files/menu/{{$orders->user_id}}/{{$orders->img}}">
        </div>
        <div class="colsm3">
            {{$orders->name}}
        </div>
        <div class="colsm3 cols-number-order">
            <div>-</div>
            <div>{{$orders->quantity}}</div>
            <div>+</div>
        </div>
        <div class="colsm3">
            {{$orders->price}}грн
        </div>
    </div>
    <div class="product-status">Статус: <span class="status-add">вибрано</span></div>
@endforeach

<div id="modal-manu-order">
    <div class="modal-body-bg">
        <div id ="body-modal-order" class="body-modal-order" style="height: 70px">
            <div id="togle-menu-product" class="togle-menu-product">
                <div class="togler-line"></div>
            </div>
            <div id="scrol-menu">
                <h3>Моє замовлення</h3>
                <div class="row">
                    <div class="colsm3">
                        <img class="order-menu-img" src="/files/menu/{{$product->user_id}}/{{$product->img}}">
                    </div>
                    <div class="colsm3">
                        Піцца
                    </div>
                    <div class="colsm3 cols-number-order">
                        <div>3</div>
                    </div>
                    <div class="colsm3">
                        200грн
                    </div>
                </div>
                <div class="product-status">Статус: <span class="status">готується</span></div>
                <div class="row">
                    <div class="colsm3">
                        <img class="order-menu-img" src="/files/menu/{{$product->user_id}}/{{$product->img}}">
                    </div>
                    <div class="colsm3">
                        Піцца
                    </div>
                    <div class="colsm3 cols-number-order">
                        <div>3</div>
                    </div>
                    <div class="colsm3">
                        200грн
                    </div>
                </div>
                <div class="product-status">Статус: <span class="status">готується</span></div>
                <h3>Нове</h3>
                <div id="new_menu_add">
                    @include('client.new_menu_add')
                </div>
            </div>

            <div class="order-menu-modal">
                <div class="row display-order" style="display: none">
                    <div class="cols-min">
                        <div id="add_kitchen" class="btn btn-product-bottom menu_btn">
                            Замовити
                        </div>
                    </div>
                    <div class="cols-min">
                        <div class="btn btn-product-bottom order_btn">
                            Оплатити
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

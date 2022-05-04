@foreach($list as $lists)
        <div data-index-id="{{$lists->id}}" class="cat-block-option">
            <div>.</div>
            <div>.</div>
            <div>.</div>
        </div>
        <div id="option-id-{{$lists->id}}" class="option-iner hidden">
            <div data-index-id="{{$lists->id}}" class="red-cat">Редагувати</div>
            <div data-index-id="{{$lists->id}}" class="delete-cat">Видалити</div>
        </div>

        <div class="head-cat">
            <div class="cat_name">{{$lists->name}}</div>
            <div data-index-id="{{$lists->id}}" class="add_prod">Додати страву</div>
        </div>
        <div class="product-cat">
            @if($lists->menu)
                @foreach($lists->menu as $menu)
                    <div class="row">
                        <div class="col-md-1 ">
                            <img class="prod-menus" src="/files/menu/{{Auth::user()->id}}/{{$menu->img}}">
                        </div>
                        <div class="col-md-8">
                            <p>{{$menu->name}}</p>
                            @if($menu->description)
                                <p class="menu-desc">{{$menu->description}}</p>
                            @endif
                        </div>
                        <div class="col-md-1"><p>{{$menu->mass}} грам</p></div>
                        <div class="col-md-1"><p>{{$menu->price}} грн.</p></div>
                        <div class="col-md-1 edit-prod">
                            <div class="edit-prod-div">
                                <div data-index-id="{{$menu->id}}"  class="pero edit-prods">&#9999;</div>
                                <div data-index-id="{{$menu->id}}"  class="del del-prods">&#10007;</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
@endforeach

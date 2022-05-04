@foreach($lists as $list)
    <div class="col-md-6 list-cat">
        <a data-index-id="{{$list->id}}" class="category-mobile-id" href="#">
            <img class="prod-menus" src="/files/menu/{{$list->user_id}}/{{$list->img}}">
            <p>{{$list->name}}</p>
        </a>
    </div>
@endforeach


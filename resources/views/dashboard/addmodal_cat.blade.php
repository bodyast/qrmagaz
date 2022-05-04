<div class="modal_product">
    <div class="modal-body">
        <form id="modal-form-prod" action="{{url("/dashboard/{ Auth::user()->id }/mymenu/redycatmodal")}}" method="POST" enctype="multipart/form-data">
            <div class="mod-prod-add">
                <span class="close">&times;</span>
                <input type="hidden" name="cat_id" value="{{$category_id}}">
                <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                <div class="form-group">
                    <label for="nameproduct">Назва</label>
                    <input  name="name_product" type="name" value="{{ $category->name }}" class="form-control" id="nameproduct" aria-describedby="name" placeholder="Введіть назву">
                </div>
                <div class="form-group">
                    <label for="descriptionproduct">Опис</label>
                    <textarea  name="desc_product" class="form-control" id="descriptionproduct" rows="3">{{ $category->description }}</textarea>
                </div>
                <div class="form-group form-img-prod">
                    <label for="productimg1">Фото</label>
                    <input  id="file" name="file" type="file" class="form-control-file" multiple>
                    <div class="img-rez">
                        @if($category->img)
                            <img src="/files/menu/{{Auth::user()->id}}/{{$category->img}}" id="result">
                        @else
                            <img src="/images/noimg.png" id="result">
                        @endif
                    </div>
                </div>
                <button id="add_modal_cat" type="submit" class="btn btn-primary add_modal_prod">Редагувати</button>
            </div>
        </form>

    </div>
</div>

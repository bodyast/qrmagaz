<div class="modal_product">
    <div class="modal-body">
        <form id="modal-form-prod" action="{{url("/dashboard/{ Auth::user()->id }/mymenu/addproductmodal")}}" method="POST" enctype="multipart/form-data">
            <div class="mod-prod-add">
                <span class="close">&times;</span>
                <input type="hidden" name="cat_id" value="{{$category_id}}">
                <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                @if($product)
                    <input type="hidden" name="prod_id" value="{{$product->id}}">
                @endif
                <div class="form-group">
                    <label for="nameproduct">Назва</label>
                    @if($product)
                        <input name="name_product" type="name" value="{{ $product->name }}" class="form-control" id="nameproduct" aria-describedby="name" placeholder="Введіть назву">
                    @else
                        <input required name="name_product" type="name" value="{{ old('id') }}" class="form-control" id="nameproduct" aria-describedby="name" placeholder="Введіть назву">
                    @endif
                </div>
                <div class="form-group">
                    <label for="descriptionproduct">Опис</label>
                    @if($product)
                        <textarea  name="desc_product" class="form-control" id="descriptionproduct" rows="3">{{$product->description}}</textarea>
                    @else
                        <textarea  name="desc_product" class="form-control" id="descriptionproduct" rows="3"></textarea>
                    @endif

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="massproduct">Вага</label>
                            @if($product)
                                <input  name="mass_product" value="{{$product->mass}}" class="form-control" id="massproduct" aria-describedby="mass" placeholder="Вага">
                            @else
                                <input required name="mass_product" class="form-control" id="massproduct" aria-describedby="mass" placeholder="Вага">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="priceproduct">Ціна</label>
                            @if($product)
                                <input name="price_product" value="{{$product->price}}" type="price" class="form-control" id="priceproduct" aria-describedby="price" placeholder="Ціна">
                            @else
                                <input required name="price_product" type="price" class="form-control" id="priceproduct" aria-describedby="price" placeholder="Ціна">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group form-img-prod">
                    <label for="productimg1">Фото</label>
                    @if($product)
                        <input id="file" name="file" type="file" class="form-control-file" multiple>
                    @else
                        <input required id="file" name="file" type="file" class="form-control-file" multiple>
                    @endif
                    <div class="img-rez">
                        @if($product)
                            <img src="/files/menu/{{Auth::user()->id}}/{{$product->img}}" id="result">
                        @else
                            <img src="/images/noimg.png" id="result">
                        @endif
                    </div>
                </div>
                @if($product)
                    <button id="add_modal_prod" type="submit" class="btn btn-primary add_modal_prod">Редагувати</button>
                @else
                    <button id="add_modal_prod" type="submit" class="btn btn-primary add_modal_prod">Додати</button>
                @endif
            </div>
        </form>

    </div>
</div>

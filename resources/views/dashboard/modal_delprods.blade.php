<div class="modal_product">
    <div class="modal-body">
        <form id="modal-form-prod" action="{{url("/dashboard/{ Auth::user()->id }/mymenu/addproductmodal")}}" method="POST" enctype="multipart/form-data">
            <div class="mod-prod-add">
                <span class="close">&times;</span>
                <input type="hidden" name="prod_id" value="{{$product}}">
                <input type="hidden" name="_token" value="{!!csrf_token()!!}">
                <div class="deb-block-prod">
                    <div>
                        <img src="/files/menu/{{Auth::user()->id}}/{{$products->img}}">
                    </div>
                    <div>
                        <p>{{$products->name}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 modal-del">
                        <div data-index-id="{{$products->id}}" class="btn btn-danger del-product">Видалити</div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>

<div class="modal fade" id="addedItemsModal" role="dialog" >
    <div class="modal-dialog" role="document" >
    <div class="modal-content" >
        <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="exampleModalLabel" style="color:white">
            Added Items
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            @foreach ($Apparatus->whereIn('id',Session::get('addeditems')) as $apparatus)
                @php
                    $apparatusindex = array_search($apparatus->id,Session::get('addeditems'));
                    // if($apparatusindex != null)
                    // {
                    //     $itemqty = Session::get('qty');
                    //     $tosubtract = $itemqty[$apparatusindex];
                    // }
                    // else
                    // {
                    //     $tosubtract =0;
                    // }
                @endphp
                <p>{{ $apparatus->name }} -- {{ Session::get('qty')[$apparatusindex] }}</p>
            @endforeach
        </div>
    </div>
    </div>
</div>

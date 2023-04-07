<div class="modal fade" id="returnItemModal" tabindex="-1" aria-labelledby="returnItemModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-gradient-success " >
          <h5 class="modal-title text-white" id="exampleModalLabel">Return Item</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="{{ route('borrowing.returnApparatus') }}">
            @csrf
            <span class="fw-bold">Apparatus: <span id="itemname"></span></span>
            <input type="hidden" name="itemID" id="itemID">
            <input type="number" min="1" class="form-control mt-2" placeholder="Return Qty" id="returnqty" name="returnqty" required>
            <button class="w-100  btn btn-success mt-3">SUBMIT</button>
          </form>
        </div>
      </div>
    </div>
 </div>


 <script type="text/javascript">
    $(document).ready(function() {

        var returnModal = document.getElementById('returnItemModal')
        returnModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget
            var itename = button.getAttribute('data-bs-itemname')
            var apparatusid = button.getAttribute('data-bs-apparatusid')
            var maxqty = button.getAttribute('data-bs-maxqty')

            var modalBodyInput = returnModal.querySelector('.modal-body #itemname')
            var itemInput = returnModal.querySelector('.modal-body #itemID')

            modalBodyInput.innerText = itename
            itemInput.value = apparatusid
            $("#returnqty").attr({"max": maxqty })
        })

    });
</script>

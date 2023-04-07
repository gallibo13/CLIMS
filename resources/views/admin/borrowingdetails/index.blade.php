@extends('layouts.app')

@section('content')

<div class="container-fluid py-4">


    <div class="row pt-4">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Borrowing Details</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2 mx-2">
                <div class="row mx-4">
                    <div class="col-6">
                        <h4>Borrowed Apparatus</h4>

                        @if($borrowing->status =='Active')
                            <span class="badge bg-danger text-white">{{ $borrowing->status }}</span>
                        @elseif($borrowing->status =='Returned')
                            <span class="badge bg-success text-white">{{ $borrowing->status }}</span>
                        @else
                          <span>{{ $borrowing->status }}</span>
                        @endif

                        <p>Total Quantity: {{ $borrowing->totalqty }}</p>
                        <p>Returned Quantity: {{ $borrowing->returnedqty }}</p>

                        <table class="table">
                            <tr>
                                <thead>
                                    <td>#</td>
                                    <td>Apparatus</td>
                                    <td>Status</td>
                                    <td>Qty</td>
                                    <td>Returned</td>
                                    <td>Action</td>
                                </thead>
                            </tr>
                            @foreach ($borrowing->borrowingdetails as $details )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $details->apparatus->name }}</td>
                                    <td>{{ $details->statusperitem }}</td>
                                    <td>{{ $details->itemqty }}</td>
                                    <td>{{ $details->returnedqty }}</td>
                                    <td>
                                        <button {{  $details->returnedqty >= $details->itemqty ? ' disabled ': '' }} class="btn btn-success btn-sm text-white mx-1"
                                        data-bs-toggle="modal" data-bs-target="#returnItemModal"
                                        data-bs-itemname="{{  $details->apparatus->name }}"
                                        data-bs-apparatusid="{{  $details->apparatus_id }}"
                                        data-bs-maxqty="{{  $details->itemqty - $details->returnedqty }}">
                                             <i class="fa-solid fa-check"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    <div class="col-6">
                        <h4>Borrower Details</h4>
                        <p> Date Borrowed: {{ $borrowing->dateborrowed }} </p>
                        <p> Description : {{ $borrowing->description }} </p>
                        <p> Typ: {{  $borrowing->borrowingtype }} </p>
                        <p> Semester: {{ $borrowing->semester }} </p>
                        @foreach ($borrowing->borrowers as $borrower)
                            <p>  {{ $borrower->student->firstname . " " . $borrower->student->lastname  }}</p>
                        @endforeach
                    </div>
                </div>



          </div>
        </div>
      </div>
    </div>

</div>



@include('admin.modals.borrowingdetails.returnItem')
@include('components.notification');

@endsection

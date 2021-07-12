@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{!! asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') !!}">
<link rel="stylesheet" href="{!! asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') !!}">
<link rel="stylesheet" href="{!! asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') !!}">
<link rel="stylesheet" href="{!! asset('assets/plugins/toastr/toastr.min.css') !!}">
<div class="container">
    @if(session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <div class="row">
        <div class="card col-12" style="padding:0px;">
          <div class="card-header">
            <h3 class="card-title">Expense List</h3>
            <div>
                <a href="{!! route('expense.create') !!}" class="btn btn-large btn-primary" style="float:right;">Add Expense/Income <i class="fa fa-arrow-circle-right" aria-hidden="true"></i></a>

            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body col-12">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
              <tr>
                <th>Sr. no</th>
                <th>User</th>
                <th>Expense Type</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{!! asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/jszip/jszip.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/pdfmake/pdfmake.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/pdfmake/vfs_fonts.js') !!}"></script>
<script src="{!! asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') !!}"></script>
<script src="{!! asset('assets/plugins/toastr/toastr.min.js') !!}"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $("#example1").DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('datatable') }}",
        columns: [
            { data: 'DT_RowIndex', name: 'DT_RowIndex' , orderable: false, searchable: false},
            {data: 'user_id', name: 'user_id'},
            {data: 'type', name: 'type', searchable: true, orderable: true},
            {data: 'amount', name: 'amount'},
            {data: 'date', name: 'date'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ],
        dom: 'Bfrtip',
        lengthMenu: [
           [ 10, 25, 50, -1 ],
           [ '10 rows', '25 rows', '50 rows', 'Show all' ]
        ],
        buttons: [
            'pageLength',
            {
                extend: 'excel',
                text: '<span class="fa fa-file-excel-o"></span> Excel Export',
                exportOptions: {
                    modifier: {
                        search: 'applied',
                        order: 'applied'
                    }
                }
            }
        ]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');;

  } );
  function deleteExpense(id) {
      var msg = 'Are you sure?';
      var url = "{{ route('delete.expense', ":id") }}";
      url = url.replace(':id', id);
      if (confirm(msg)) {
          $.ajax({
            type: "DELETE",
            url: url,
            data: {
                _token: "{{ csrf_token() }}",
                id: id
            },
            cache: false,
            success: function (res) {
                if(res == true) {
                    var table = $('#example1').DataTable();
                    table.row('example1DtRow' + id).remove().draw(false);
                    toastr.success('Expense/Income deleted successfully.');
                } else {
                      toastr.error('Something went wrong.')
                }
            }
        });
      }
  }
</script>
@endsection

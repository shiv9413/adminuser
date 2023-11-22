
@extends('backend.layouts.master')

@section('title')
Admins - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection

@php
     $usr = Auth::guard('admin')->user();
 @endphp
@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">User Transaction</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>All Transactions</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">Transaction List</h4>
                    @if ($usr->can('transaction.manage'))
                    <p class="float-right mb-2">
                        <a class="btn btn-warning text-white" data-toggle="modal" data-target="#addTransactionModal">Add Transaction</a>
                    </p>
                    @endif
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                       <div class="table-responsive"> 
                        <table id="dataTable" class="text-center">
                            <thead class="bg-light text-capitalize">
                                <tr>
                                    <th width="10%">Sl</th>
                                    <th width="10%">Posting Date</th>
                                    <th width="10%">Type</th>
                                    <th width="10%">Description</th>
                                    <th width="10%">Amount</th>
                                    <th width="10%">Available Balance</th>
                                    @if ($usr->can('transaction.edit'))
                                    <th width="10%">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($history as $admin)
                               <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{ $admin->date }}</td>
                                    <td>{{ $admin->transaction_type }}</td>
                                    <td>
                                       {{ $admin->description }}
                                    </td>
                                    <td>
                                       {{ $admin->amount }}
                                    </td>
                                    <td>
                                       {{ $admin->available_balance }}
                                    </td>
                                    @if ($usr->can('transaction.edit'))
                                    <td>
                                    <a class="btn btn-success text-white" data-toggle="modal" data-target="#editTransactionModal{{ $admin->id }}">Edit</a>
                                    </td>
                                    @endif
                                </tr>
                                 <!-- Modal -->
                                <div class="modal fade" id="editTransactionModal{{ $admin->id }}" tabindex="-1" role="dialog" aria-labelledby="editTransactionModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editTransactionModalLabel">Edit Transaction</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                                <form action="{{ route('admin.admins.update_transaction') }}" method="post">
                                                    @csrf
                                                    <input type="hidden" name="txn_id" value="{{ $admin->id }}">
                                                    <div class="form-group">
                                                        <label for="transaction_amount">Transaction Amount</label>
                                                        <input type="text" class="form-control" id="transaction_amount" value="{{ $admin->amount }}" name="amount" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="transaction_date">Transaction Date</label>
                                                        <input type="date" class="form-control" id="transaction_date" value="{{ $admin->date }}" name="date" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="transaction_type">Transaction Type</label>
                                                        <select class="form-control" id="transaction_type" name="transaction_type" required>
                                                            <option value="credit" {{ $admin->transaction_type === 'credit' ? 'selected' : '' }}>Credit</option>
                                                            <option value="debit" {{ $admin->transaction_type === 'debit' ? 'selected' : '' }}>Debit</option>
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="transaction_description">Description</label>
                                                        <textarea class="form-control" id="transaction_description" name="description" rows="3" required>{{ $admin->description }}</textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
        
    </div>
</div>
 <!-- Modal -->
 <div class="modal fade" id="addTransactionModal" tabindex="-1" role="dialog" aria-labelledby="addTransactionModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="addTransactionModalLabel">Add Transaction</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
                <form action="{{ route('admin.admins.create_transaction') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ $id }}">
                    <div class="form-group">
                        <label for="transaction_amount">Transaction Amount</label>
                        <input type="text" class="form-control" id="transaction_amount" name="amount" required>
                    </div>
                    <div class="form-group">
                        <label for="transaction_date">Transaction Date</label>
                        <input type="date" class="form-control" id="transaction_date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="transaction_type">Transaction Type</label>
                        <select class="form-control" id="transaction_type" name="transaction_type" required>
                            <option value="credit">Credit</option>
                            <option value="debit">Debit</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transaction_description">Description</label>
                        <textarea class="form-control" id="transaction_description" name="description" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection


@section('scripts')
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
     
     <script>
         /*================================
        datatable active
        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
                responsive: true
            });
        }

     </script>
@endsection
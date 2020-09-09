@extends('layouts.master')
@section('content')
<div class="content">

             <div class="col-lg-8 ml-5 col-sm-5">
                <div class="card">
                        <div class="card-header">
                            <strong>Create Course</strong>
                        </div>
                        <div class="card-body card-block">
                            
                            <div class="has-success form-group">
                                <label for="expense_detail" class=" form-control-label">Expense Detail</label>
                                <textarea id="expense_detail" name="expense_detail" class="is-valid form-control" placeholder="Enter expense detail"></textarea>
                            </div>
                            
                            <div class="has-success form-group">
                                <label for="expense_amount" class=" form-control-label">Expense Amount</label>
                                <input type="number" id="expense_amount" name="expense_amount" class="is-valid form-control" placeholder="Enter expense amount">
                            </div>
                            <button type="button" class="btn btn-outline-primary">Add</button>&nbsp;&nbsp;
                             <button type="button" class="btn btn-outline-danger">Cancel</button>
                        </div>
        </div>
    </div><!-- .animated -->
</div><!-- .content -->

@endsection
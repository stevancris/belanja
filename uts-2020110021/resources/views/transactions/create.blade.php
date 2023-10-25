@extends('layouts.template')

@section('title', 'Add New Transaction')

@section('content')
    <div class="mt-4 p-5 bg-black text-white rounded">
        <h1>Add New Transaction</h1>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger mt-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="row my-5">
        <div class="col-12 px-5">
            <form action="{{ route('transactions.store') }}" method="POST">
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount') }}">
                </div>
                <div class="mb-3 col-md-8 col-sm-12">
                    <label for="type" class="form-label">Type</label>
                    <select type="text" class="form-control" name="type" value="{{ old('type') }}">
                        <option value="income">Income</option>
                        <option value="expense">Expense</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" rows="10" name="notes">{{ old('notes') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>
        </div>
    </div>
@endsection
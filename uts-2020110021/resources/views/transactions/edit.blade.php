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
            <form action="{{ route('transactions.update', $transaction) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="amount" class="form-label">Amount</label>
                    <input type="text" class="form-control" id="amount" name="amount" value="{{ old('amount'), $transaction->amount }}">
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="type">Type</label>
                    <select class="form-control" name="type" id="type" value="{{ old('type'), $transaction->type }}">
                        <option value="">Choose</option>
                        <option value="Income">Income</option>
                        <option value="Expense">Expense</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12" id="inputCategory">
                    <label for="category">Category</label>
                    <select class="form-control" name="category" id="category" value="{{ old('category'), $transaction->category }}">
                        <option value="">Choose</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" rows="10" name="notes">{{ old('notes'), $transaction->notes }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>

            <script>
                document.getElementById('type').addEventListener('change', function() {
                    var typeValue = this.value;
                    var categorySelect = document.getElementById('category');

                    categorySelect.innerHTML = '<option value="">Choose</option>';

                    if (typeValue === 'Income') {
                        var option1 = document.createElement('option');
                        option1.value = 'Wage';
                        option1.text = 'Wage';
                        categorySelect.appendChild(option1);

                        var option2 = document.createElement('option');
                        option2.value = 'Bonus';
                        option2.text = 'Bonus';
                        categorySelect.appendChild(option2);

                        var option3 = document.createElement('option');
                        option3.value = 'Gift';
                        option3.text = 'Gift';
                        categorySelect.appendChild(option3);
                    }
                    else if (typeValue === 'Expense') {
                        var option4 = document.createElement('option');
                        option4.value = 'Food & Drinks';
                        option4.text = 'Food & Drinks';
                        categorySelect.appendChild(option4);

                        var option5 = document.createElement('option');
                        option5.value = 'Shopping';
                        option5.text = 'Shopping';
                        categorySelect.appendChild(option5);

                        var option6 = document.createElement('option');
                        option6.value = 'Charity';
                        option6.text = 'Charity';
                        categorySelect.appendChild(option6);

                        var option7 = document.createElement('option');
                        option7.value = 'Housing';
                        option7.text = 'Housing';
                        categorySelect.appendChild(option7);

                        var option8 = document.createElement('option');
                        option8.value = 'Insurance';
                        option8.text = 'Insurance';
                        categorySelect.appendChild(option8);

                        var option9 = document.createElement('option');
                        option9.value = 'Taxes';
                        option9.text = 'Taxes';
                        categorySelect.appendChild(option9);

                        var option10 = document.createElement('option');
                        option10.value = 'Transportation';
                        option10.text = 'Transportation';
                        categorySelect.appendChild(option10);
                    }
                });
            </script>
        </div>
    </div>
@endsection
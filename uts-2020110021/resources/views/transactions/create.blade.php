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
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="tipe">Type</label>
                    <select class="form-control" name="tipe" id="tipe" value="{{ old('tipe') }}">
                        <option value="">Choose</option>
                        <option value="income">Income</option>
                        <option value="expense">Expense</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12" id="inputCategory">
                    <label for="category">Category</label>
                    <select class="form-control" name="category" id="category" value="{{ old('category') }}">
                        <option value="">Choose</option>
                    </select>
                </div>
                <div class="mb-3 col-md-12 col-sm-12">
                    <label for="notes" class="form-label">Notes</label>
                    <textarea class="form-control" rows="10" name="notes">{{ old('notes') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Save</button>
            </form>

            <script>
                document.getElementById('tipe').addEventListener('change', function() {
                    var tipeValue = this.value;
                    var categorySelect = document.getElementById('category');

                    categorySelect.innerHTML = '<option value="">Choose</option>';

                    if (tipeValue === 'income') {
                        var option1 = document.createElement('option');
                        option1.value = 'wage';
                        option1.text = 'Wage';
                        categorySelect.appendChild(option1);

                        var option2 = document.createElement('option');
                        option2.value = 'bonus';
                        option2.text = 'Bonus';
                        categorySelect.appendChild(option2);

                        var option3 = document.createElement('option');
                        option3.value = 'gift';
                        option3.text = 'Gift';
                        categorySelect.appendChild(option3);
                    }
                    else if (tipeValue === 'expense') {
                        var option4 = document.createElement('option');
                        option4.value = 'food_and_drinks';
                        option4.text = 'Food & Drinks';
                        categorySelect.appendChild(option4);

                        var option5 = document.createElement('option');
                        option5.value = 'shopping';
                        option5.text = 'Shopping';
                        categorySelect.appendChild(option5);

                        var option6 = document.createElement('option');
                        option6.value = 'charity';
                        option6.text = 'Charity';
                        categorySelect.appendChild(option6);

                        var option7 = document.createElement('option');
                        option7.value = 'housing';
                        option7.text = 'Housing';
                        categorySelect.appendChild(option7);

                        var option8 = document.createElement('option');
                        option8.value = 'insurance';
                        option8.text = 'Insurance';
                        categorySelect.appendChild(option8);

                        var option9 = document.createElement('option');
                        option9.value = 'taxes';
                        option9.text = 'Taxes';
                        categorySelect.appendChild(option9);

                        var option10 = document.createElement('option');
                        option10.value = 'transportation';
                        option10.text = 'Transportation';
                        categorySelect.appendChild(option10);
                    }
                });
            </script>
        </div>
    </div>
@endsection
@extends('layouts.template')

@section('title', $transaction->Type)

@section('content')
    <article class="blog-post my-4">
        <h1 class="display-5 fw-bold">{{ $transaction->category }}</h1>
        <p class="blog-post-meta">{{ $transaction->updated_at }}</p>
        <p class="blog-post-meta">{{ $transaction->created_at }}</p>
        <p>Type     : {{ $transaction->type }}</p>
        <p>Amount   : {{ $transaction->amount }}</p>
        <p>Notes    : {{ $transaction->notes }}</p>
    </article>
@endsection
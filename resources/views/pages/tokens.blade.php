@extends('layout')

@section('title', 'Tokens')

@section('content')
    <form action="{{ route('tokens.store')}}" method="post">
        @csrf
        @method('POST')
        <label for="token_name">Token Name</label>
        <input type="text" name="token_name" id="token_name">
        <button type="submit">Create Token</button>
    </form>
    @foreach ( auth()->user()->tokens as $token)
        <div>
            <p>{{ $token->name }}</p>
            <p>{{ $token->created_at }}</p>
            <p>{{ $token->expires_at }}</p>
            <form action="{{ route('tokens.destroy', $token->id) }}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
            <form action="{{ route('tokens.update', $token->id) }}" method="post">
                @csrf
                @method('PUT')
                <button type="submit">Renew</button>
            </form>
        </div>
    @endforeach
@endsection
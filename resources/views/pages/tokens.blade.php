@extends('layout')

@section('title', 'Tokens')

@section('content')
    <div class="container mt-4">
        <h1>Tokens</h1>
        <p>The tokens have a duration of 7 days, applies from its creation or from its renewal.</p>
        <form action="{{ route('tokens.store')}}" method="post">
            @csrf
            @method('POST')
            <div class="row" style="max-width:600px;">
                <div class="col-sm-9">
                    <label class="visually-hidden" for="token_name">new token</label>
                    <div class="input-group">
                        <div class="input-group-text">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="#0AEC7B" d="M16.75 8.5a1.25 1.25 0 1 0 0-2.5 1.25 1.25 0 0 0 0 2.5Z"></path><path fill="#0AEC7B" d="M15.75 0a8.25 8.25 0 1 1-2.541 16.101l-1.636 1.636a1.744 1.744 0 0 1-1.237.513H9.25a.25.25 0 0 0-.25.25v1.448a.876.876 0 0 1-.256.619l-.214.213a.75.75 0 0 1-.545.22H5.25a.25.25 0 0 0-.25.25v1A1.75 1.75 0 0 1 3.25 24h-1.5A1.75 1.75 0 0 1 0 22.25v-2.836c0-.464.185-.908.513-1.236l7.386-7.388A8.249 8.249 0 0 1 15.75 0ZM9 8.25a6.733 6.733 0 0 0 .463 2.462.75.75 0 0 1-.168.804l-7.722 7.721a.25.25 0 0 0-.073.177v2.836c0 .138.112.25.25.25h1.5a.25.25 0 0 0 .25-.25v-1c0-.966.784-1.75 1.75-1.75H7.5v-1c0-.966.784-1.75 1.75-1.75h1.086a.25.25 0 0 0 .177-.073l1.971-1.972a.75.75 0 0 1 .804-.168A6.75 6.75 0 1 0 9 8.25Z"></path></svg>
                        </div>
                        <input type="text" name="token_name" id="token_name"class="form-control" placeholder="Name" aria-label="Name">
                    </div>
                </div>
                <button type="submit" class="col-sm-3 btn btn-light border border-secondary ">Create</button>
            </div>
        </form>
        
        <table class="table mt-4 text-center shadow">
            <thead>
                <tr class="table-light">
                <th scope="col">Name</th>
                <th scope="col">Created at</th>
                <th scope="col">Expires at</th>
                <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( auth()->user()->tokens as $token)
                    <tr>
                        <td>{{ $token->name }}</td>
                        <td>{{ $token->created_at }}</td>
                        <td>{{ $token->expires_at }}</td>
                        <td class="d-flex justify-content-evenly align-items-center flex-wrap">
                            <form action="{{ route('tokens.update', $token->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-light border-secondary" type="submit">Renew</button>
                            </form>
                            <form action="{{ route('tokens.destroy', $token->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;


class TokenController extends Controller
{
    private function setNewExpirationDate($token_id)
    {
        $userToken = auth()->user()->tokens->find($token_id);
        $userToken->expires_at = now()->addWeek();
        $userToken->save();
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('pages.tokens');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $token = $request->user()->createToken($request->token_name);

        // assign a new expiration date to the token
        $token_id = $token->accessToken->id;
        self::setNewExpirationDate($token_id);

        return view('pages.token', ['token' => $token->plainTextToken]);
    }


    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $token_id)
    {
        // renew the expiration date of the token
        self::setNewExpirationDate($token_id);

        return redirect(route('tokens.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $token_id)
    {
        auth()->user()->tokens()->where('id', $token_id)->delete();
     
        return redirect(route('tokens.index'));
    }
}

<?php

namespace App\Http\Controllers\Administration;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Scopes\StoreScope;
use Illuminate\Http\Request;

class LeaveImpersonation extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        if(!session()->has('impersonate')){
            abort(403);
        }
        auth()->login(User::withoutGlobalScope(StoreScope::class)->find(session('impersonate')));
        session()->forget('impersonate');

        return redirect('/');

    }
}

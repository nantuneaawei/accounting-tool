<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\mydb\member;

class CheckUID
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $oRequest
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $oNext
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $oRequest, Closure $oNext)
    {
        $sUID = $oRequest->cookie('UID');

        $sUID_2 = $oRequest->cookie('UID_2');

        $oMember = member::where('UID', $sUID)->first();

        if (empty($sUID) || empty($sUID_2) || !$oMember) {
            return redirect('/login');
        }

        return $oNext($oRequest);
    }

}

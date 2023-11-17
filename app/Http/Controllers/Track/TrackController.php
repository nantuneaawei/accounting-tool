<?php

namespace App\Http\Controllers\Track;

use App\Http\Controllers\Controller;
use App\Repositories\mydb\Auth as AuthRepositories;
use App\Services\Tools\Out as OutServices;
use App\Services\Tools\In as InServices;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TrackController extends Controller
{
    protected $oAuthRepositories;
    protected $oOutServices;
    protected $oInServices;

    public function __construct(OutServices $_oOutServices, AuthRepositories $_oAuthRepositories, InServices $_oInServices)
    {
        $this->oOutServices = $_oOutServices;
        $this->oAuthRepositories = $_oAuthRepositories;
        $this->oInServices = $_oInServices;
    }

    public function index(Request $oRequest)
    {
        $sUID = $oRequest->cookie('UID');

        $sNickname = $this->oAuthRepositories->findNickname($sUID);

        $aOut = $this->oOutServices->findOutOneday($sUID);

        return view('track.index', ['nickname' => $sNickname, 'out' => $aOut]);
    }

    public function in(Request $oRequest)
    {
        $sUID = $oRequest->cookie('UID');

        $sNickname = $this->oAuthRepositories->findNickname($sUID);

        $aIn = $this->oInServices->findInOneday($sUID);

        return view('track.in', ['nickname' => $sNickname, 'in' => $aIn]);
    }

    public function record(Request $oRequest)
    {
        $sUID = $oRequest->cookie('UID');

        $sNickname = $this->oAuthRepositories->findNickname($sUID);

        $aOut = $this->oOutServices->findOutData($sUID);

        $aIn = $this->oInServices->findInData($sUID);

        $iAllOut = $this->oOutServices->sumOut($sUID);

        $iAllin = $this->oInServices->sumIn($sUID);

        $iTotal = $iAllin - $iAllOut;

        return view('track.record', ['nickname' => $sNickname,'in' => $aIn, 'out' => $aOut, 'allout' => $iAllOut, 'allin' => $iAllin, 'total' => $iTotal]);
    }

    public function createOut(Request $oRequest)
    {
        $aData = json_decode($oRequest->getContent(), true);

        $aData['UID'] = $oRequest->cookie('UID');

        $aResponse = $this->oOutServices->createOut($aData);

        if ($aResponse['state']) {
            return response()->json($aResponse);
        } else {
            return response()->json($aResponse, 400);
        }
    }

    public function createIn(Request $oRequest)
    {
        $aData = json_decode($oRequest->getContent(), true);

        $aData['UID'] = $oRequest->cookie('UID');

        $aResponse = $this->oInServices->createIn($aData);

        if ($aResponse['state']) {
            return response()->json($aResponse);
        } else {
            return response()->json($aResponse, 400);
        }
    }

    public function logout()
    {
        $oResponse = new Response('Logout Successful');
        $oResponse->withCookie(cookie()->forget('UID'));
        $oResponse->withCookie(cookie()->forget('UID_2'));

        return $oResponse;
    }

    public function deleteIn(Request $oRequest)
    {
        $aData = json_decode($oRequest->getContent(), true);

        return $aData;
    }
}

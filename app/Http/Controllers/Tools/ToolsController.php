<?php

namespace App\Http\Controllers\Tools;

use App\Http\Controllers\Controller;
use App\Services\Tools\Tool as ToolServices;
use App\Repositories\mydb\Auth as AuthRepositories;
use Illuminate\Http\Request;

class ToolsController extends Controller
{
    private $oToolServices;
    private $oAuthRepositories;

    public function __construct(ToolServices $_oToolServices, AuthRepositories $_oAuthRepositories)
    {
        $this->oToolServices = $_oToolServices;
        $this->oAuthRepositories = $_oAuthRepositories;
    }

    public function index(Request $oRequest)
    {
        $sUID = $oRequest->cookie('UID');

        $sNickname = $this->oAuthRepositories->findNickname($sUID);

        return view('tools.tool', ['nickname' => $sNickname]);
    }

    public function rate(Request $oRequest)
    {
        $validatedData = $oRequest->validate([
            'price' => 'required|numeric|min:0',
            'dividend' => 'required|numeric|min:0',
        ]);
    
        $iPrice = $oRequest->input('price');
        $iDividend = $oRequest->input('dividend');
        $iRate = $this->oToolServices->countRate($iPrice, $iDividend);
        return response()->json(['data' => $iRate]);
    }    
}
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthRequest;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Services\tools\Auth as AuthServices;
use App\Repositories\mydb\Auth as AuthRepositories;

class AuthController extends Controller
{
    protected $oAuthService;
    protected $oAuthRepository;

    public function __construct(AuthServices $_oAuthServices, AuthRepositories $_oAuthRepositories)
    {
        $this->oAuthServices = $_oAuthServices;
        $this->oAuthRepositories = $_oAuthRepositories;
    }

    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function create(AuthRequest $_oRequest)
    {
        $aData = $_oRequest->validated();

        $bCreate = $this->oAuthRepositories->createMember($aData);

        $aCreateArray = $this->oAuthServices->registerResult($bCreate);
        
        return $aCreateArray;
    }

    public function loginAuth(LoginRequest $_oRequest)
    {
        $aData = $_oRequest->validated();

        $aResponse = $this->oAuthServices->loginMember($aData);

        if ($aResponse['state']) {
            $iMinutes = 3600;
            Cookie::queue('UID', $aResponse['UID'], $iMinutes);
            Cookie::queue('UID_2', $aResponse['UID_2'], $iMinutes);
        }

        return response()->json($aResponse);
    }
}

<?php

namespace App\Services\Tools;

use App\Repositories\mydb\Auth as AuthRepositories;
use Illuminate\Support\Facades\Hash;

class Auth
{
    private $oAuthRepositories;

    public function __construct(AuthRepositories $_oAuthRepositories)
    {
        $this->oAuthRepositories = $_oAuthRepositories;
    }

    public function registerResult($_bCreate)
    {
        if ($_bCreate) {
            return [
                'state' => true,
                'message' => '註冊成功'
            ];
        } else {
            return [
                'state' => false,
                'message' => '註冊失敗'
            ];
        }
    }

    public function loginMember($_aData)
    {
        $oMember = $this->oAuthRepositories->findMemberByEmail($_aData['Email']);

        if ($oMember) {
            if (Hash::check($_aData['Password'], $oMember->Password)) {
                $sUID   = substr(sha1(uniqid('', true)), 0, 10);
                $sUID_2 = substr(md5(uniqid('', true)), 0, 12);

                $this->oAuthRepositories->updateMemberUid($oMember, $sUID, $sUID_2);

                return [
                    'state' => true,
                    'message' => '登入成功!',
                    'UID' => $sUID,
                    'UID_2' => $sUID_2,
                ];
            } else {
                return [
                    'state' => false,
                    'message' => '密碼錯誤!',
                ];
            }
        } else {
            return [
                'state' => false,
                'message' => '帳號不存在!',
            ];
        }
    }

}

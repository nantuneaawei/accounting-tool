<?php

namespace App\Repositories\mydb;

use App\Models\mydb\member as memberModel;

class Auth
{
    private $oMemberModel;

    public function __construct(memberModel $_oMemberModel)
    {
        $this->oMemberModel = $_oMemberModel;
    }

    public function createMember($_aData)
    {
        return $this->oMemberModel->create([
            'Nickname' => $_aData['Nickname'],
            'Email' => $_aData['Email'],
            'Password' => password_hash($_aData['Password'], PASSWORD_DEFAULT),
        ]);
    }

    public function findMemberByEmail($_sEmail)
    {
        return $this->oMemberModel->where('Email', $_sEmail)->first();
    }

    public function updateMemberUid($_oMember, $_sUID, $_sUID_2)
    {
        $_oMember->update([
            'UID' => $_sUID,
            'UID_2' => $_sUID_2,
        ]);
    }

    public function findNickName($_sUID)
    {
        return $this->oMemberModel
            ->where('UID', $_sUID)
            ->value('Nickname');
    }

    public function findMember($_sUID)
    {
        return $this->oMemberModel->where('UID', $_sUID)->first();
    }
}

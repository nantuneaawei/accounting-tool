<?php

namespace App\Services\Tools;

use App\Repositories\mydb\Auth as AuthRepositories;
use App\Repositories\mydb\MemberOut as OutRepositories;

class Out
{
    private $oAuthRepositories;
    private $oOutRepositories;

    public function __construct(AuthRepositories $_oAuthRepositories, OutRepositories $_oRecoedRepositories)
    {
        $this->oAuthRepositories = $_oAuthRepositories;
        $this->oOutRepositories = $_oRecoedRepositories;
    }

    public function createOut($_aData)
    {
        $sUID = $_aData['UID'];

        $iId = $this->oAuthRepositories->findMember($sUID)->id;

        $_aData['M_ID'] = $iId;
    
        $oInsertedOut = $this->oOutRepositories->insertOut($_aData);

        if ($oInsertedOut) {
            return [
                'state' => true,
                'message' => '支出新增成功!',
            ];
        } else {
            return [
                'state' => false,
                'message' => '支出新增失败!',
            ];
        }
    }
    
    public function findOutData($_sUID)
    {
        $iId = $this->oAuthRepositories->findMember($_sUID)->id;

        return $this->oOutRepositories->allOut($iId);
    }

    public function sumOut($_sUID)
    {
        $iId = $this->oAuthRepositories->findMember($_sUID)->id;

        return $this->oOutRepositories->sumAllOut($iId);
    }

    public function findOutOneday($_sUID)
    {
        $iId = $this->oAuthRepositories->findMember($_sUID)->id;
        
        return $this->oOutRepositories->getOnedayData($iId);
    }
}

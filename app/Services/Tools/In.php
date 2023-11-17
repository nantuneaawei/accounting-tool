<?php

namespace App\Services\Tools;

use App\Repositories\mydb\Auth as AuthRepositories;
use App\Repositories\mydb\MemberIn as InRepositories;

class In
{
    private $oAuthRepositories;
    private $oInRepositories;

    public function __construct(AuthRepositories $_oAuthRepositories, InRepositories $_oInRepositories)
    {
        $this->oAuthRepositories = $_oAuthRepositories;
        $this->oInRepositories = $_oInRepositories;
    }

    public function createIn($_aData)
    {
        $sUID = $_aData['UID'];

        $iId = $this->oAuthRepositories->findMember($sUID)->id;

        $_aData['M_ID'] = $iId;
    
        $oInsertedRecord = $this->oInRepositories->insertIn($_aData);

        if ($oInsertedRecord) {
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
    
    public function findInData($_sUID)
    {
        $iId = $this->oAuthRepositories->findMember($_sUID)->id;

        return $this->oInRepositories->allIn($iId);
    }

    public function sumIn($_sUID)
    {
        $iId = $this->oAuthRepositories->findMember($_sUID)->id;

        return $this->oInRepositories->sumAllIn($iId);
    }

    public function findInOneday($_sUID)
    {
        $iId = $this->oAuthRepositories->findMember($_sUID)->id;
        
        return $this->oInRepositories->getOnedayData($iId);
    }
}

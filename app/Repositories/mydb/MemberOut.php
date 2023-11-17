<?php

namespace App\Repositories\mydb;

use App\Models\mydb\member_Out as memberModel;
use Carbon\Carbon;

class MemberOut
{
    private $oMemberOut;

    public function __construct(memberModel $_oMemberModel)
    {
        $this->oMemberOut = $_oMemberModel;
    }

    public function findMemberwithId($_iId)
    {
        return $this->oMemberOut->where('M_ID', $_iId)->first();
    }

    public function insertOut($_aData)
    {
        return $this->oMemberOut->create([
            'M_ID' => $_aData['M_ID'],
            'Money' => $_aData['Money'],
            'Time' => $_aData['Time'],
            'Items' => $_aData['Items'],
        ]);
    }

    public function allOut($_iId)
    {
        return $this->oMemberOut->where('M_ID', $_iId)->get();
    }

    public function sumAllOut($_iId)
    {
        return $this->oMemberOut->where('M_ID', $_iId)->sum('Money');
    }

    public function getOnedayData($_iId)
    {
        $oNow = Carbon::now();

        $oOneDayAgo = $oNow->copy()->subDay();

        return $this->oMemberOut->where('M_ID', $_iId)
            ->whereBetween('createdAt', [$oOneDayAgo, $oNow])
            ->get();
    }
    
}

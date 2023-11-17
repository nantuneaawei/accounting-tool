<?php

namespace App\Repositories\mydb;

use App\Models\mydb\member_in as memberModel;
use Carbon\Carbon;

class MemberIn
{
    private $oMemberIn;

    public function __construct(memberModel $_oMemberModel)
    {
        $this->oMemberIn = $_oMemberModel;
    }

    public function findMemberwithId($_iId)
    {
        return $this->oMemberIn->where('M_ID', $_iId)->first();
    }

    public function insertIn($_aData)
    {
        return $this->oMemberIn->create([
            'M_ID' => $_aData['M_ID'],
            'Money_In' => $_aData['Money'],
            'Time' => $_aData['Time'],
        ]);
    }

    public function allIn($_iId)
    {
        return $this->oMemberIn->where('M_ID', $_iId)->get();
    }

    public function sumAllIn($_iId)
    {
        return $this->oMemberIn->where('M_ID', $_iId)->sum('Money_In');
    }

    public function getOnedayData($_iId)
    {
        $oNow = Carbon::now();

        $oOneDayAgo = $oNow->copy()->subDay();

        return $this->oMemberIn->where('M_ID', $_iId)
            ->whereBetween('createdAt', [$oOneDayAgo, $oNow])
            ->get();
    }
}
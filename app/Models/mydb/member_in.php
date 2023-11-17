<?php

namespace App\Models\mydb;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member_in extends Model
{
    use HasFactory;

    // 指定連接的DB名稱
    protected $connection = 'mydb';
    // 指定Table名稱
    protected $table = 'member_in';
    // 主鍵名稱
    protected $primaryKey = 'id';

    public $timestamps = false;

    // 可批量賦值的欄位
    protected $fillable = [
        'M_ID',
        'Money_In',
        'Time',
    ];
}

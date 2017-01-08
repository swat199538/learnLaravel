<?php
/**
 * Created by PhpStorm.
 * User: wangl
 * Date: 2017/1/8
 * Time: 17:52
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    public static function getMember()
    {
        return 'member is aaabbcc';
    }
}
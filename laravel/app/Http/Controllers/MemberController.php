<?php
/**
 * Created by PhpStorm.
 * User: wangl
 * Date: 2017/1/8
 * Time: 17:31
 */
namespace App\Http\Controllers;

use App\Member;

class MemberController extends Controller
{
    public function info()
    {
        return Member::getMember();

        /*return view('member.info', [
            'name'=>'zhu',
            'age'=>18
        ]);*/
    }
}
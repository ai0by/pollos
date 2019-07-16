<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/15
 * Time: 17:07
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class IndexoneController extends Controller{

    public function index(){
        $this->verLogin();
        $siteName = $this->objectToArray(DB::table('setting')->where(['key' => 'siteName'])->select('value')->first());
        $userData = $this->objectToArray(DB::table('user')->where(['username' => Session::get('username')])->first());
        $messageNum = $this->objectToArray(DB::table('message')->where(['userid' => $userData['id']])->count());
        $messageList = $this->objectToArray(DB::table('message')->where(['userid' => $userData['id']])->get()->toArray());
        $tending = $this->objectToArray(DB::table('links')->where(['userid' => $userData['id']])->count());
        $links = $this->objectToArray(DB::table('links')->where(['userid' => $userData['id']])->get()->toArray());
        $pvCount = 0;
        $maxVisit = 0;
        $maxName = '';
        foreach ($links as $i){
            $pvCount = $pvCount + $i['visit'];
            if($i['visit']>=$maxVisit){
                $maxName = $i['name'];
            }
        }
        $userList = $this->objectToArray(DB::table('links')->leftJoin('user','user.id','=','links.userid')
            ->select('user.avatar', 'user.username','links.url','user.status','links.visit','links.name')->orderBy('visit','DESC')->get(5)->toArray());
        $userDefault = $this->objectToArray(DB::table('user')->where(['usergroup' => '1'])->count());
        $userFlow = $this->objectToArray(DB::table('user')->where(['usergroup' => '2'])->count());
        $userAd = $this->objectToArray(DB::table('user')->where(['usergroup' => '3'])->count());
        return view('admin.index',[
            'siteName' => $siteName['value'],
            'username' => $userData['username'],
            'messageNum' => $messageNum[0],
            'messageList' => $messageList,
            'userId' => $userData['id'],
            'avatar' => $userData['avatar'],
            'is_tending' => $tending[0],
            'pvCount' => $pvCount,
            'linksCount' => count($links),
            'maxVisit' => $maxName,
            'userList' => $userList,
            'userDefault'=>$userDefault[0],
            'userFlow'=>$userFlow[0],
            'userAd'=>$userAd[0],
        ]);
    }
}
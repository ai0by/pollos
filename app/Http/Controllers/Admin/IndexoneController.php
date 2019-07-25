<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/7/15
 * Time: 17:07
 */

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class IndexoneController extends AdminController {

    public function index(){
        $userData = $this->getUserData();
        $siteName = $this->objectToArray(DB::table('setting')->where(['key' => 'siteName'])->select('value')->first());
        $messageData = $this->getMessageData($userData['id']);
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
        $userDefault = $this->objectToArray(DB::table('user_role')->where(['roleid' => '2'])->count());
        $userFlow = $this->objectToArray(DB::table('user_role')->where(['roleid' => '3'])->count());
        $userAd = $this->objectToArray(DB::table('user_role')->where(['roleid' => '4'])->count());
        return view('admin.Index',[
            'navList' => $this->getMenu($userData),
            'siteName' => $siteName['value'],
            'username' => $userData['username'],
            'messageNum' => $messageData['messageNum'][0],
            'messageList' => $messageData['messageList'],
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
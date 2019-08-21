<?php
namespace Home\Controller;
use Home\Controller\BaseController;
class LoginController extends BaseController {
    public function index(){
        $this->display();
    }
    public function login(){
		//退出登录
        $out=$_POST['out'];
        if($out!=null){
            cookie('phone',null);
            cookie('userID',null);
            cookie('nickname',null);
            exit("ok");
        }

        // //title
        // $title = get_title();
        // $this->assign("title",$title);

        // $this->display("Login/index");
    }
    //登陆
    public function dispose(){
        $name=I('name');
        $password=I('password');
        $password=md5($password);
        if($name!=null and $password!=null){
            $result=M('user')->where("name='$name' and password='$password'")->find();
           	
		    $userID=$result['id'];
            $nickname=$result['nickname'];
            $phone=$result['phone'];
            if($result>0){
                cookie('phone',"$phone");
                cookie('userID',"$userID");
                cookie("special",$result['specialty']);
                cookie('nickname',"$nickname");
                exit("ok");
            }else{
                exit('error');
            }
        }else{
            exit('kong');
        }
    }

    public function register(){
        //title
        $title = get_title();
        $this->assign("title",$title);
    	$this->display();
    }

    public function adduser(){
        ob_end_clean();
        $data['phone']=I('mobile');
        $pwd1=I('pwd1');
        $pwd2=I('pwd2');
        $inviterID=I('inviterID');

        // print_r($_SESSION);
        //短信验证
        $vcode=I('vcode');
        $inviterID=I('inviterID');
        $getvcode = $_SESSION["{$data['phone']}"];
        if($vcode!=$getvcode){
            exit('no');
        }

        if($inviterID!=null){
            $findinviter=M('user')->where("phone={$inviterID}")->find();
            if($findinviter==null){
                exit('bucunzai');
            }else{
                $data['inviterID']=$inviterID;
            }

        }

        $find=M('user')->where("phone={$data['phone']}")->find();
        if($find!=null){
            exit('cunzai');
        }
        if($pwd1==$pwd2){
            $data['password']=$pwd1;
        }else{
            exit('pwderror');
        }

        // $vcode=I('vcode');
        if($data['phone']!=null and $data['password']!=null){
            $result=M('user')->add($data);

            if($result>0){
                //添加新人奖励
                $addshouyi['userID']=$result;
                $addshouyi['producttitle']='新人注册奖励';
                $addshouyi['type']='新人奖励';
                $findmoney=M('money')->find(1);
                $addshouyi['money']=$findmoney['money'];
                // $addshouyi['status']='未审核';
                $tuijianshouyi['huizhiID']=0;
                $addshouyi['time']=date('Y-m-d');
                $shouyi=M('shouyi')->add($addshouyi);


                exit('ok');
            }else{
                exit('error');
            }
        }else{
            exit('kong');
        }
    }

    /*public function test(){
        $data['phone']=I('mobile');
        $pwd1=I('pwd1');
        $pwd2=I('pwd2');

        $data['password']=I('pwd1');

        $result=M('user')->add($data);

        if($result>0){
            exit('ok');
        }
    }*/

    public function zhaohuimima(){
	   //title
        $title = get_title();
        $this->assign("title",$title);

    	$this->display();
    }

    public function findpwd(){
        $phone=I('phone');
        $pwd1=I('pwd1');
        $pwd2=I('pwd2');

        //短信验证
        $vcode=I('vcode');
        $find=M('user')->where("phone=$phone")->find();
        $getvcode = $_SESSION["{$phone}"];
        if($vcode!==$getvcode){
            exit('vcodeerror');
        }

        $find=M('user')->where("phone=$phone")->find();
        if($find==null){
            exit('bucunzai');
        }
        if($pwd1==$pwd2){
            $data['password']=$pwd1;
        }else{
            exit('pwderror');
        }
        // $data['inviterID']=I('inviteCode');
        // $vcode=I('vcode');
        if($phone!=null and $data['password']!=null){
            $result=M('user')->where("phone=$phone")->save($data);
            if($result>0){
                exit('ok');
            }else{
                exit('error');
            }
        }else{
            exit('kong');
        }
    }

    public function weibo(){
        vendor('Weibo.api');
        $client_id = "1012133641";
        $client_secret = "862b85e4f436b78df8c5ae657cb5eb85";
        $callback_url = "http://www.csgysx.com/index.php/Login/weibo_callback";//回调地址,必须是提交网站域名下的某一个url
        $obj = new \SaeTOAuthV2($client_id, $client_secret);//$client_id就是App Key  $client_secret就是App Secret
        $weibo_login_url = $obj->getAuthorizeURL($callback_url);
        header("Location:".$weibo_login_url);
    }

    public function weibo_callback(){
        $code = $_GET['code'];
        if (isset($code)) {
            vendor('Weibo.api');
            $client_id = "1012133641";
            $client_secret = "862b85e4f436b78df8c5ae657cb5eb85";
            $obj = new \SaeTOAuthV2($client_id, $client_secret);
            $callback_url = "http://www.csgysx.com/index.php/Login/weibo_callback";

            $keys = array();

            $keys['code'] = $code;
            // print_r($code);
            $keys['redirect_uri'] = $callback_url;
            try {
                $token = $obj->getAccessToken('code',$keys) ;
            // print_r($token);
            }
            catch (OAuthException $e) {

            }
        }
        //获取用户数据 $user_message
        if ($token) {
            $_SESSION['token'] = $token;
            setcookie( 'weibojs_'.$obj->client_id, http_build_query($token));

            $c = new \SaeTClientV2( $client_id , $client_secret , $token['access_token'] );
            $ms  = $c->home_timeline(); // done
            $uid_get = $c->get_uid();
            $uid = $uid_get['uid'];
            $user_message = $c->show_user_by_id($uid);//根据ID获取用户等基本信息
            // print_r($_SESSION);
            // exit();

                //判断此微博是否注册 唯一标识符 uid
                $iswb=M('user')->where("openid='$uid'")->find();

                if($iswb!=null){
                    //写入登陆状态
                    $username=$iswb['username'];
                    $userID=$iswb['id'];
                    cookie('username',"{$username}");
                    cookie('userID',"{$userID}");
                    $login_time=date("d"); //登录时间
                    $result_login=M('user')->where("openid='$uid'")->save(array('login_time'=>$login_time));
                    jump('登陆成功！',"http://www.csgysx.com/phone_index.php");
                }else{
                    $data['openid']=$uid; //微博登陆唯一uid
                    $data['username']=$user_message['name']; //用户名

                    //如果用户名存在
                    $name=$user_message['name'];
                    $isname=M('user')->where("username='$name'")->find();
                    if($isname){
                        //用户名存在添加随机数
                        $data['username']=$user_message['name']."_".rand(1000,9999);
                    }
                    $data['header']=$user_message['profile_image_url']; //头像
                    $data['gender']=$user_message['gender']; //性别

                    //判断是否写入成功
                    $result=M('user')->add($data);
                    if($result>0){
                        //写入登陆状态
                        cookie('username',"{$user_message['name']}");
                        cookie('userID',"{$result}");
                        jump('登陆成功！',"http://www.csgysx.com/phone_index.php");
                    }else{
                        jump('登陆失败！',"http://www.csgysx.com/phone_index.php");
                    }
                }

            //p($user_message);die;//到这一步可以获取用户的一些信息，以下逻辑自行扩展
        }
        else
        {
            print_r("授权失败！");
        }
    }

         //账号退出
    public function logout(){


        cookie('userID',null);
        cookie('username',null);

        jump('成功退出！',__APP__);

    }

    public function weixin(){
        //授权。获取code
        $url = "https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx2b01b5c6a0dd68eb&redirect_uri=http%3a%2f%2fwww.csgysx.com%2fphone_index.php%2fLogin%2fweixin_callback&response_type=code&scope=snsapi_login&state=STATE#wechat_redirect";
        redirect($url);
    }

    public function weixin_callback(){
        $code = $_GET['code'];
        $url = "https://api.weixin.qq.com/sns/oauth2/access_token?appid=wx2b01b5c6a0dd68eb&secret=3726087b734f9e10ef5cd4651dd3675f&code=$code&grant_type=authorization_code";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_URL, $url);
        $get_access_token = curl_exec($ch);
        curl_close($ch);
        $array_token = json_decode($get_access_token,true);
        if(array_key_exists("access_token",$array_token))
        {
            // https://api.weixin.qq.com/cgi-bin/user/info?access_token=ACCESS_TOKEN&openid=OPENID&lang=zh_CN
            $access_token = $array_token['access_token'];
            $openid = $array_token['openid'];
            $url = "https://api.weixin.qq.com/sns/userinfo?access_token=$access_token&openid=$openid&lang=zh_CN";
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            curl_setopt($ch, CURLOPT_URL, $url);
            $get_user_weixin = curl_exec($ch);
            curl_close($ch);
            $array_user = json_decode($get_user_weixin,true);

            if(!array_key_exists("errcode",$array_user))
            {
                $nickname = $array_user['nickname'];
                $headimgurl = $array_user['headimgurl'];
                if($headimgurl==null)
                {
                    $headimgurl = "public/images/getAvatar.do.jpg";
                }
                $unionid = $array_user['unionid'];

                //判断此微信是否注册 唯一标识符openid
                $user=M('user')->where("openid='$openid'")->find();
                if($user!=null)
                {

                    cookie('username',$user['username']);
                    cookie('userID', $user['id']);
                    $login_time=date("d"); //登录时间
                    $result_login=M('user')->where("id={$user['id']}")->save(array('login_time'=>$login_time));
                    $this->redirect("Index/index");
                }
                else
                {
                    //注册
                    $register=M("user")->data(array('username'=>$nickname,'openid'=>$openid,'header'=>$headimgurl))->add();
                    $login_time=date("d"); //登录时间
                    $result_login=M('user')->where("openid='$openid'")->save(array('login_time'=>$login_time));
                    cookie('username',$nickname);
                    cookie('userID', $register);
                    $this->display("Index/index");
                }
            }
            else
            {
                $this->display("Index/index");
                echo "<script>layer.msg('登陆出错，请重新登陆');</script>";
            }
        }
        else
        {
            $this->display("Index/index");
            echo "<script>layer.msg('登陆出错，请重新登陆');</script>";
        }
    }


}

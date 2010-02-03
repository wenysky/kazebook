<?php
	include 'include/db_class.php';
        include 'include/pagebase.php';
        $pagename = "会员登录";
        $templatefile = "login.tpl";
        if(isset ($_COOKIE['auth'])){
            $uid = 1;//test
            echo 'COOKIE SET ed';
            exit;
        }
        if($uid>0){
            echo '你已经登录了';
            echo "<meta http-equiv=refresh content='2; url=index.php'>";
            //exit;
        }
        else {
            if(isset($_POST["username"]) && isset ($_POST["password"])){

                list($uid, $username, $password, $email) = uc_user_login($_POST['username'], $_POST['password']);
                //setcookie('auth', '', -86400);
                
                if($uid > 0) {
                        //用户登陆成功，设置 Cookie，加密直接用 uc_authcode 函数，用户使用自己的函数
                        $auth = uc_authcode($uid.$username, 'ENCODE');
                        setcookie('auth', $auth);
                        //生成同步登录的代码
                        //$ucsynlogin = uc_user_synlogin($uid);
                        echo '登录成功';
                        //echo $ucsynlogin;
                        echo '<br><a href="'.$_SERVER['PHP_SELF'].'">继续</a>';
                        exit;
                } elseif($uid == -1) {
                        echo '用户不存在,或者被删除';
                } elseif($uid == -2) {
                        echo '密码错';
                } else {
                        echo '未定义';
                }
            }
        }

        include 'include/pagefooter.php';
?>

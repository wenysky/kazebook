        <div id="sidebar">
            <ul>
                <li>欢迎光临小站!</li>
                <li>站点测试中...</li>
            {if $uid>0}
                <li>设置</li>
                <li>注销</li>
            {else}
                <li><a href="login.php">登录</a></li>
                <li><a href="reg.php">注册</a></li>
            {/if}
            </ul>
        </div>
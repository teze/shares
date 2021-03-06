<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title><?php echo ($meta_title); ?>|股票管理平台</title>
    <link href="/Public/favicon.ico" type="image/x-icon" rel="shortcut icon">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/base.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/common.css" media="all">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/module.css">
    <link rel="stylesheet" type="text/css" href="/Public/Admin/css/style.css" media="all">
	<link rel="stylesheet" type="text/css" href="/Public/Admin/css/<?php echo (C("COLOR_STYLE")); ?>.css" media="all">
     <!--[if lt IE 9]>
    <script type="text/javascript" src="/Public/static/jquery-1.10.2.min.js"></script>
    <![endif]--><!--[if gte IE 9]><!-->
    <script type="text/javascript" src="/Public/static/jquery-2.0.3.min.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/jquery.mousewheel.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/PCASClass.js"></script>
    <!--<![endif]-->
    
</head>
<body>
    <!-- 头部 -->
    <div class="header">
        
        <!-- Logo -->
        <span class="logo yhy_logo">股票管理平台</span>
        <!-- /Logo -->

        <!-- 主导航 -->
        <ul class="main-nav">
            <?php if(is_array($__MENU__["main"])): $i = 0; $__LIST__ = $__MENU__["main"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li class="<?php echo ((isset($menu["class"]) && ($menu["class"] !== ""))?($menu["class"]):''); ?>"><a href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a></li><?php endforeach; endif; else: echo "" ;endif; ?>
        </ul>
        <!-- /主导航 -->
        

        
        <!-- 用户栏 -->
        <div class="user-bar">
            <a href="javascript:;" class="user-entrance"><i class="icon-user"></i></a>
            <ul class="nav-list user-menu hidden">
                <li class="manager">你好，<em title="<?php echo session('user_auth.username');?>"><?php echo session('user_auth.username');?></em></li>
                <li><a href="<?php echo U('User/updatePassword');?>">修改密码</a></li>
                <li><a href="<?php echo U('User/updateNickname');?>">修改昵称</a></li>
                <li><a href="<?php echo U('Public/logout');?>">退出</a></li>
            </ul>
        </div>
        
    </div>
    <!-- /头部 -->

    <!-- 边栏 -->
    <div class="sidebar">
        <!-- 子导航 -->
        
            <div id="subnav" class="subnav">
                <?php if(isset($_menu_list)): if(is_array($_menu_list)): $i = 0; $__LIST__ = $_menu_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i; if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                            <ul class="side-sub-menu">
                                <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                        <a class="item" href="<?php echo (U($menu["url"])); ?>">
                                            <?php echo ($menu["title"]); ?>
                                            <?php if($menu['have_summary'] == 1): ?><span style="display:inline-block;width:10px;height:10px;background-color:red;border-radius: 10px;"></span><?php endif; ?>
                                        </a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                    <?php if(!empty($_extra_menu)): ?>
                        <?php echo extra_menu($_extra_menu,$__MENU__); endif; ?>
                    <?php if(is_array($__MENU__["child"])): $i = 0; $__LIST__ = $__MENU__["child"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub_menu): $mod = ($i % 2 );++$i;?><!-- 子导航 -->
                        <?php if(!empty($sub_menu)): if(!empty($key)): ?><h3><i class="icon icon-unfold"></i><?php echo ($key); ?></h3><?php endif; ?>
                            <ul class="side-sub-menu">
                                <?php if(is_array($sub_menu)): $i = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$menu): $mod = ($i % 2 );++$i;?><li>
                                        <a class="item" href="<?php echo (U($menu["url"])); ?>"><?php echo ($menu["title"]); ?></a>
                                    </li><?php endforeach; endif; else: echo "" ;endif; ?>
                            </ul><?php endif; ?>
                        <!-- /子导航 --><?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>
        
        <!-- /子导航 -->
    </div>
    <!-- /边栏 -->

    <!-- 内容区 -->
    <div id="main-content">
        <div id="top-alert" class="fixed alert alert-error" style="display: none;">
            <button class="close fixed" style="margin-top: 4px;">&times;</button>
            <div class="alert-content">这是内容</div>
        </div>
        <div id="main" class="main">
            
            <!-- nav -->
            <?php if(!empty($_show_nav)): ?><div class="breadcrumb">
                <span>您的位置:</span>
                <?php $i = '1'; ?>
                <?php if(is_array($_nav)): foreach($_nav as $k=>$v): if($i == count($_nav)): ?><span><?php echo ($v); ?></span>
                    <?php else: ?>
                    <span><a href="<?php echo ($k); ?>"><?php echo ($v); ?></a>&gt;</span><?php endif; ?>
                    <?php $i = $i+1; endforeach; endif; ?>
            </div><?php endif; ?>
            <!-- nav -->
            

            
    <div class="main-title">
        <h2>账户添加</h2>
    </div>
    <form action="<?php echo U();?>" method="post" class="form-horizontal">
        <div class="form-item">
            <label class="item-label">姓名<span class="check-tips"></span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="name" value="">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">密码</label>
            <div class="controls">
                <input type="password" class="text input-large" name="password" value="">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">重复密码</label>
            <div class="controls">
                <input type="password" class="text input-large" name="repassword" value="">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">质押比例<span class="check-tips">（单位：倍）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="pledge" value="">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">利率<span class="check-tips">（单位：毫/天）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="rate" value="">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">佣金费率 <span class="check-tips">（单位：‰）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="yongjin_rate" value="">
            </div>
        </div>
        <!--div class="form-item">
            <label class="item-label">资金预警<span class="check-tips">（单位：％）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="capital_waring" value="">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">账户平仓<span class="check-tips">（单位：％）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="flat" value="">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">收过户费<span class="check-tips">（单位：元/千股）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="transfer" value="">
            </div>
        </div>
        <div class="form-item">
            <span class="item-label" style="display: inline;">月底返息:</span>
            <span class="controls">
                是<input type="radio" name="return_rate" value="1" checked="true">&nbsp;
                否 <input type="radio" name="return_rate" value="2">
            </span>
        </div>
        <div class="form-item">
            <span class="item-label" style="display: inline;">收手续费:</span>
            <span class="controls">
                是<input type="radio" name="hand_cost" value="1" checked="true">&nbsp;
                否 <input type="radio" name="hand_cost" value="2">
            </span>
        </div-->
        <div class="form-item">
            <label class="item-label">营业部</label>
            <div class="controls">
                <select name="sales_id" id="">
                    <?php if(is_array($_sales_list)): $i = 0; $__LIST__ = $_sales_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sa): $mod = ($i % 2 );++$i;?><option value="<?php echo ($sa["id"]); ?>"><?php echo ($sa["title"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">业务员</label>
            <div class="controls">
                <select name="member_id" id="">
                    <?php if(is_array($_member_list)): $i = 0; $__LIST__ = $_member_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$me): $mod = ($i % 2 );++$i;?><option value="<?php echo ($me["uid"]); ?>"><?php echo ($me["nickname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <!--div style="margin: 13px 0px;">
            <label class="item-label line">个人信息</label>
        </div-->
        <div class="form-item">
            <label class="item-label">身份证号码</label>
            <div class="controls">
                <input type="text" class="text input-large" name="body_card" value="">
            </div>
        </div>
        <!--div class="form-item">
            <label class="item-label">会员邮件</label>
            <div class="controls">
                <input type="text" class="text input-large" name="email" value="">
            </div>
        </div-->
        <div class="form-item">
            <label class="item-label">手机号</label>
            <div class="controls">
                <input type="text" class="text input-large" name="telephone" value="">
            </div>
        </div>
        <div class="form-item">
            <label class="item-label">另一个手机号</label>
            <div class="controls">
                <input type="text" class="text input-large" name="telephone2" value="">
            </div>
        </div>
        <!--div class="form-item">
            <label class="item-label" style="display:inline">出生日期：</label>
            <span class="controls">
                <input type="text" class="text2" name="year" value="">年
                <input type="text" class="text2" name="month" value="">月
                <input type="text" class="text2" name="day" value="">日
            </span>
        </div-->
        <div class="form-item">
            <span class="item-label" style="display: inline;">性别:</span>
            <span class="controls">
                男<input type="radio" name="sex" value="1">&nbsp;
                女<input type="radio" name="sex" value="2">
            </span>
        </div>

        <!--div style="margin: 13px 0px;">
            <label class="item-label line">其他</label>
        </div>
        <div class="form-item">
            <span class="item-label" style="display: inline;">有无子女:</span>
            <span class="controls">
                有<input type="radio" name="child" value="1">&nbsp;
                无<input type="radio" name="child" value="2">
            </span>
        </div>
        <div class="form-item">
            <label class="item-label" style="display:inline">籍贯:</label>
            <span class="controls">
                <select name="province1" id=""></select>
                <select name="city1" id=""></select>
                <select name="area1" id=""></select>
            </span>
        </div>
        <div class="form-item">
            <label class="item-label" style="display:inline">户口所在地:</label>
            <span class="controls">
                <select name="province2" id=""></select>
                <select name="city2" id=""></select>
                <select name="area2" id=""></select>
            </span>
        </div>
        <script type="text/javascript">
            new PCAS("province1","city1","area1","SPT","SCT","SAT") ;
            new PCAS("province2","city2","area2","SPT","SCT","SAT") ;
        </script>
        <div class="form-item">
            <label class="item-label">居住地址</label>
            <div class="controls">
                <input type="text" class="text input-large" name="address" value="">
            </div>
        </div-->
        <!--div class="form-item">
            <label class="item-label">电话</label>
            <div class="controls">
                <input type="text" class="text input-large" name="phone" value="">
            </div>
        </div-->
        <div class="form-item">
            <span class="item-label" style="display: inline;">状态:</span>
            <span class="controls">
                有效<input type="radio" name="status" checked="true" value="1">&nbsp;
                无效<input type="radio" name="status" value="2">
            </span>
        </div>
        <!--div class="form-item">
            <label class="item-label">排序<span class="check-tips">（值越大排越前面）</span></label>
            <div class="controls">
                <input type="text" class="text input-large" name="sort" value="1">
            </div>
        </div-->
        <div class="form-item">
            <button class="btn submit-btn ajax-post" id="submit" type="submit" target-form="form-horizontal">确 定</button>
            <button class="btn btn-return" onclick="javascript:history.back(-1);return false;">返 回</button>
        </div>
    </form>

        </div>
        <div class="cont-ft">
            <div class="copyright">
                <div class="fl">股票管理平台</div>
                <div class="fr">V<?php echo (股票管理平台_VERSION); ?></div>
            </div>
        </div>
    </div>
    <!-- /内容区 -->
    <script type="text/javascript">
    (function(){
        var ThinkPHP = window.Think = {
            "ROOT"   : "", //当前网站地址
            "APP"    : "/admin.php?s=", //当前项目地址
            "PUBLIC" : "/Public", //项目公共目录地址
            "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>", //PATHINFO分割符
            "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
            "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"]
        }
    })();
    </script>
    <script type="text/javascript" src="/Public/static/think.js"></script>
    <script type="text/javascript" src="/Public/Admin/js/common.js"></script>
    <script type="text/javascript">
        +function(){
            var $window = $(window), $subnav = $("#subnav"), url;
            $window.resize(function(){
                $("#main").css("min-height", $window.height() - 130);
            }).resize();

            /* 左边菜单高亮 */
            url = window.location.pathname + window.location.search;
            url = url.replace(/(\/(p)\/\d+)|(&p=\d+)|(\/(id)\/\d+)|(&id=\d+)|(\/(group)\/\d+)|(&group=\d+)/, "");
            $subnav.find("a[href='" + url + "']").parent().addClass("current");

            /* 左边菜单显示收起 */
            $("#subnav").on("click", "h3", function(){
                var $this = $(this);
                $this.find(".icon").toggleClass("icon-fold");
                $this.next().slideToggle("fast").siblings(".side-sub-menu:visible").
                      prev("h3").find("i").addClass("icon-fold").end().end().hide();
            });

            $("#subnav h3 a").click(function(e){e.stopPropagation()});

            /* 头部管理员菜单 */
            $(".user-bar").mouseenter(function(){
                var userMenu = $(this).children(".user-menu ");
                userMenu.removeClass("hidden");
                clearTimeout(userMenu.data("timeout"));
            }).mouseleave(function(){
                var userMenu = $(this).children(".user-menu");
                userMenu.data("timeout") && clearTimeout(userMenu.data("timeout"));
                userMenu.data("timeout", setTimeout(function(){userMenu.addClass("hidden")}, 100));
            });

	        /* 表单获取焦点变色 */
	        $("form").on("focus", "input", function(){
		        $(this).addClass('focus');
	        }).on("blur","input",function(){
				        $(this).removeClass('focus');
			        });
		    $("form").on("focus", "textarea", function(){
			    $(this).closest('label').addClass('focus');
		    }).on("blur","textarea",function(){
			    $(this).closest('label').removeClass('focus');
		    });

            // 导航栏超出窗口高度后的模拟滚动条
            var sHeight = $(".sidebar").height();
            var subHeight  = $(".subnav").height();
            var diff = subHeight - sHeight; //250
            var sub = $(".subnav");
            if(diff > 0){
                $(window).mousewheel(function(event, delta){
                    if(delta>0){
                        if(parseInt(sub.css('marginTop'))>-10){
                            sub.css('marginTop','0px');
                        }else{
                            sub.css('marginTop','+='+10);
                        }
                    }else{
                        if(parseInt(sub.css('marginTop'))<'-'+(diff-10)){
                            sub.css('marginTop','-'+(diff-10));
                        }else{
                            sub.css('marginTop','-='+10);
                        }
                    }
                });
            }
        }();
    </script>
    
    <script type="text/javascript">
        //导航高亮
        highlight_subnav('<?php echo U('User/user_add');?>');
    </script>

</body>
</html>
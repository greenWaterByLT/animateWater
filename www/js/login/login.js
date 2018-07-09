/**
 * Created by litian on 2017/9/1.
 */
$(function() {
    $("body").addClass('login_bj');
    document.createElement("section");
    document.createElement("header");
    document.createElement("footer");

    $("form.login input.loginSubmit").click(function () {
        var userName = $("form input[name='userName']").val(),
            password = $("form input[name='password']").val();

        if(checkIsEmpty(userName)){
            var msg = '请输入用户名';
            alert(msg);
            return false;
        }
        var userNameRes = checkUserName(userName);
        if(userNameRes){
            alert(userNameRes);
            return false;
        }

        if(checkIsEmpty(password)){
            var msg = '请输入密码';
            alert(msg);
            return false;
        }
        /*var passwordRes = checkPassword(password);
        if(passwordRes){
            alert(passwordRes);
            return false;
        }*/

        $.ajax({
            'url': '/index/index',
            'data': {userName:userName,password:password,isLogin:'YES'},
            'type': 'post',
            'dateType': 'json',
            'success': function (data) {
                if(data.code == 1){
                    window.location.href = '/index/catalog';
                }else {
                    alert(data.msg);
                }
            }
        })
    });

    $("form[name='register'] input.btn_zhuce").click(function () {
        var userName = $("form input[name='userName']").val(),
            password = $("form input[name='password']").val(),
            email = $("form input[name='email']").val(),
            invite_code = $("form input[name='invite_code']").val();

        if(checkIsEmpty(userName)){
            var msg = '请输入用户名';
            alert(msg);
            return false;
        }
        var userNameRes = checkUserName(userName);
        if(userNameRes){
            alert(userNameRes);
            return false;
        }

        if(checkIsEmpty(email)){
            var msg = '请输入邮箱';
            alert(msg);
            return false;
        }
        var emailRes = checkEmail(email);
        if(emailRes){
            alert(emailRes);
            return false;
        }

        if(checkIsEmpty(password)){
            var msg = '请输入密码';
            alert(msg);
            return false;
        }
        var passwordRes = checkPassword(password);
        if(passwordRes){
            alert(passwordRes);
            return false;
        }

        if(checkIsEmpty(invite_code)){
            var msg = '请输入邀请码';
            alert(msg);
            return false;
        }
        var inviteCodeRes = checkInviteCode(invite_code);
        if(inviteCodeRes){
            alert(inviteCodeRes);
            return false;
        }

        $.ajax({
            'url': '/index/register',
            'data': $("form[name='register']").serialize(),
            'type': 'post',
            'dateType': 'json',
            'success': function (data) {
                if(data.code == 1){
                    window.location.href = '/index';
                }else {
                    alert(data.msg);
                }
            }
        });
    });
});

function checkUserName(userName)
{
    //验证账号长度
    userName = $.trim(userName);
    if(userName.length < 6 || userName.length > 18){
        var msg = '账号长度必须是6到18位';
        return msg;
    }

    //验证账号格式
    var rule = /^[0-9a-zA-z\_\——]*$/;
    if (!rule.test(userName)) {
        var msg = '账号名称必须是字母、数字、下划线或者破折号';
        return msg;
    }

    return false;
}

function checkPassword(password)
{
    //验证密码长度
    password = $.trim(password);
    if(password.length < 6 || password.length > 18){
        var msg = '密码长度必须是6到18位';
        return msg;
    }

    //验证密码格式
    var rule = /^\s$/;
    var rule1 = /^[0-9]+$/,
        rule2 = /^[a-zA-Z]+$/,
        rule3 = /^[0-9a-zA-z\?!\._\-\+\*%]*$/;
    if(rule.test(password)){
        var msg = '密码不能包含空格';
        return msg;
    }
    if(rule1.test(password)){
        var msg = '密码必须含有字母';
        return msg;
    }
    if(rule2.test(password)){
        var msg = '密码必须含有数字';
        return msg;
    }
    if(!rule3.test(password)){
        var msg = '密码只能是数字、字母或字符(?!._-+*%)';
        return msg;
    }

    return false;
}

function checkEmail(email)
{
    var rule = /^[A-Za-z0-9\u4e00-\u9fa5]+@[a-zA-Z0-9_-]+(\.[a-zA-Z0-9_-]+)+$/;
    email = $.trim(email);
    if(!rule.test(email)){
        var msg = '邮箱格式错误';
        return msg;
    }
    return false;
}

function checkInviteCode(inviteCode)
{
    inviteCode = $.trim(inviteCode);

    $.ajax({
        'url': '',
        'data': {inviteCode:inviteCode},
        'type': 'post',
        'dateType': 'json',
        'success': function (data) {
            if(data.code == 1){
                window.location.href = '/index';
            }else {
                alert(data.msg);
            }
        }
    });

    return false;
}

function forgetPassword()
{
    var msg = '请联系管理员，获知你账号的密码\n管理员QQ：995400524';
    if($("input[name='password']").attr('type') && $("input[name='password']").attr('type') == 'password') {
        $("input[name='password']").attr('type', 'text');
    }else if($("input[name='password']").attr('type') && $("input[name='password']").attr('type') == 'text'){
        $("input[name='password']").attr('type', 'password');
    }
    //alert(msg);
}

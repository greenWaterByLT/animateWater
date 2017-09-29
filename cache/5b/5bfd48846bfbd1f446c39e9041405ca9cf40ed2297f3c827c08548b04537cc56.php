<?php

/* register.html */
class __TwigTemplate_b6e5f5ee4300252333dafb431219d63789e5e0421168334d6ae49234838ee734 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/base.html", "register.html", 1);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'headSet' => array($this, 'block_headSet'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "/base.html";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " ";
        echo twig_escape_filter($this->env, ((array_key_exists("title", $context)) ? (_twig_default_filter((isset($context["title"]) ? $context["title"] : null), "blueSkyLearn")) : ("blueSkyLearn")), "html", null, true);
        echo " ";
    }

    // line 4
    public function block_headSet($context, array $blocks = array())
    {
        // line 5
        echo "<link type=\"text/css\" rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, (isset($context["root"]) ? $context["root"] : null), "html", null, true);
        echo "/css/login/login.css\">
<script type=\"text/javascript\" src=\"";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["root"]) ? $context["root"] : null), "html", null, true);
        echo "/js/login/login.js\"></script>
";
    }

    // line 9
    public function block_body($context, array $blocks = array())
    {
        // line 10
        echo "<div class=\"zhuce_body\">
    <div class=\"logo\"><a href=\"/index\"><img src=\"";
        // line 11
        echo twig_escape_filter($this->env, (isset($context["root"]) ? $context["root"] : null), "html", null, true);
        echo "/images/login/logo-2.png\" width=\"114\" height=\"54\" border=\"0\"></a></div>
    <div class=\"zhuce_kong\">
        <div class=\"zc\">
            <div class=\"bj_bai\">
                <h3>欢迎注册</h3>
                <form action=\"\" method=\"post\" class=\"register\" name=\"register\">
                    <input name=\"username\" type=\"text\" class=\"kuang_txt phone\" placeholder=\"邮箱/会员帐号/手机号\">
                    <input name=\"email\" type=\"text\" class=\"kuang_txt email\" placeholder=\"邮箱\">
                    <input name=\"password\" type=\"password\" class=\"kuang_txt password\" placeholder=\"密码\">
                    <input name=\"invite_code\" type=\"text\" class=\"kuang_txt possword\" placeholder=\"邀请码\">
                    <input id=\"verification\" type=\"text\" class=\"kuang_txt yanzm\" placeholder=\"验证码\">
                    <div>
                        <div class=\"hui_kuang\"><img src=\"";
        // line 23
        echo twig_escape_filter($this->env, (isset($context["root"]) ? $context["root"] : null), "html", null, true);
        echo "/images/login/zc_22.jpg\" width=\"92\" height=\"31\"></div>
                        <div class=\"shuaxin\"><a href=\"#\"><img src=\"";
        // line 24
        echo twig_escape_filter($this->env, (isset($context["root"]) ? $context["root"] : null), "html", null, true);
        echo "/images/login/zc_25.jpg\" width=\"13\" height=\"14\"></a></div>
                    </div>
                    <div>
                        <input name=\"\" type=\"checkbox\" value=\"\"><span>已阅读并同意<a href=\"#\" target=\"_blank\"><span class=\"lan\">《XXXXX使用协议》</span></a></span>
                    </div>
                    <input type=\"button\" class=\"registerSubmit btn_zhuce\" value=\"注册\">

                </form>
            </div>
            <div class=\"bj_right\">
                <p>使用以下账号直接登录</p>
                <a href=\"/index/index\" class=\"zhuce_qq\">QQ登录</a>
                <a href=\"/index/index\" class=\"zhuce_wb\">微博登录</a>
                <a href=\"/index/index\" class=\"zhuce_wx\">微信登录</a>
                <p>已有账号？<a href=\"/index/index\">立即登录</a></p>
            </div>
        </div>
    </div>

</div>

";
    }

    public function getTemplateName()
    {
        return "register.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 24,  73 => 23,  58 => 11,  55 => 10,  52 => 9,  46 => 6,  41 => 5,  38 => 4,  30 => 3,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends '/base.html' %}

{% block title %} {{ title|default('blueSkyLearn') }} {% endblock %}
{% block headSet %}
<link type=\"text/css\" rel=\"stylesheet\" href=\"{{ root }}/css/login/login.css\">
<script type=\"text/javascript\" src=\"{{ root }}/js/login/login.js\"></script>
{% endblock %}

{% block body %}
<div class=\"zhuce_body\">
    <div class=\"logo\"><a href=\"/index\"><img src=\"{{ root }}/images/login/logo-2.png\" width=\"114\" height=\"54\" border=\"0\"></a></div>
    <div class=\"zhuce_kong\">
        <div class=\"zc\">
            <div class=\"bj_bai\">
                <h3>欢迎注册</h3>
                <form action=\"\" method=\"post\" class=\"register\" name=\"register\">
                    <input name=\"username\" type=\"text\" class=\"kuang_txt phone\" placeholder=\"邮箱/会员帐号/手机号\">
                    <input name=\"email\" type=\"text\" class=\"kuang_txt email\" placeholder=\"邮箱\">
                    <input name=\"password\" type=\"password\" class=\"kuang_txt password\" placeholder=\"密码\">
                    <input name=\"invite_code\" type=\"text\" class=\"kuang_txt possword\" placeholder=\"邀请码\">
                    <input id=\"verification\" type=\"text\" class=\"kuang_txt yanzm\" placeholder=\"验证码\">
                    <div>
                        <div class=\"hui_kuang\"><img src=\"{{ root }}/images/login/zc_22.jpg\" width=\"92\" height=\"31\"></div>
                        <div class=\"shuaxin\"><a href=\"#\"><img src=\"{{ root }}/images/login/zc_25.jpg\" width=\"13\" height=\"14\"></a></div>
                    </div>
                    <div>
                        <input name=\"\" type=\"checkbox\" value=\"\"><span>已阅读并同意<a href=\"#\" target=\"_blank\"><span class=\"lan\">《XXXXX使用协议》</span></a></span>
                    </div>
                    <input type=\"button\" class=\"registerSubmit btn_zhuce\" value=\"注册\">

                </form>
            </div>
            <div class=\"bj_right\">
                <p>使用以下账号直接登录</p>
                <a href=\"/index/index\" class=\"zhuce_qq\">QQ登录</a>
                <a href=\"/index/index\" class=\"zhuce_wb\">微博登录</a>
                <a href=\"/index/index\" class=\"zhuce_wx\">微信登录</a>
                <p>已有账号？<a href=\"/index/index\">立即登录</a></p>
            </div>
        </div>
    </div>

</div>

{% endblock %}", "register.html", "/mnt/hgfs/AMP/www/learn_frame/learn/view/register.html");
    }
}

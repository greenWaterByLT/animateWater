<?php

/* login.html */
class __TwigTemplate_0a512f1f77b0a4dab1afa24eece536206834bdaac1e9657fa157ed0d92157e41 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("/base.html", "login.html", 1);
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
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"";
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
        <form action=\"#\" method=\"post\" name=\"login\" class=\"login\">
            <div class=\"zc\">
                <div class=\"bj_bai\">
                    <h3>登录</h3>
                    <input class=\"username kuang_txt\" type=\"text\" name=\"userName\" placeholder=\"邮箱/会员帐号/手机号\" value=\"litian\" autofocus required>
                    <input class=\"password kuang_txt\" type=\"password\" name=\"password\" placeholder=\"请输入密码\" required>
                    <div>
                        <a href=\"javascript:;\" onclick=\"forgetPassword();\">忘记密码？</a><input name=\"\" type=\"checkbox\" value=\"\" checked><span>记住我</span>
                    </div>
                    <input type=\"button\" class=\"loginSubmit btn_zhuce\" value=\"登录\">
                </div>
                <div class=\"bj_right\">
                    <p>使用以下账号直接登录</p>
                    <a href=\"/index/index\" class=\"zhuce_qq\">QQ登录</a>
                    <a href=\"/index/index\" class=\"zhuce_wb\">微博登录</a>
                    <a href=\"/index/index\" class=\"zhuce_wx\">微信登录</a>
                    <p>没有账号？<a href=\"/index/register\">立即注册</a></p>
                </div>
            </div>
        </form>
    </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "login.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 11,  55 => 10,  52 => 9,  46 => 6,  41 => 5,  38 => 4,  30 => 3,  11 => 1,);
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
<link rel=\"stylesheet\" type=\"text/css\" href=\"{{ root }}/css/login/login.css\">
<script type=\"text/javascript\" src=\"{{ root }}/js/login/login.js\"></script>
{% endblock %}

{% block body %}
<div class=\"zhuce_body\">
    <div class=\"logo\"><a href=\"/index\"><img src=\"{{ root }}/images/login/logo-2.png\" width=\"114\" height=\"54\" border=\"0\"></a></div>
    <div class=\"zhuce_kong\">
        <form action=\"#\" method=\"post\" name=\"login\" class=\"login\">
            <div class=\"zc\">
                <div class=\"bj_bai\">
                    <h3>登录</h3>
                    <input class=\"username kuang_txt\" type=\"text\" name=\"userName\" placeholder=\"邮箱/会员帐号/手机号\" value=\"litian\" autofocus required>
                    <input class=\"password kuang_txt\" type=\"password\" name=\"password\" placeholder=\"请输入密码\" required>
                    <div>
                        <a href=\"javascript:;\" onclick=\"forgetPassword();\">忘记密码？</a><input name=\"\" type=\"checkbox\" value=\"\" checked><span>记住我</span>
                    </div>
                    <input type=\"button\" class=\"loginSubmit btn_zhuce\" value=\"登录\">
                </div>
                <div class=\"bj_right\">
                    <p>使用以下账号直接登录</p>
                    <a href=\"/index/index\" class=\"zhuce_qq\">QQ登录</a>
                    <a href=\"/index/index\" class=\"zhuce_wb\">微博登录</a>
                    <a href=\"/index/index\" class=\"zhuce_wx\">微信登录</a>
                    <p>没有账号？<a href=\"/index/register\">立即注册</a></p>
                </div>
            </div>
        </form>
    </div>

</div>
{% endblock %}", "login.html", "/mnt/hgfs/AMP/www/learn_frame/learn/view/login.html");
    }
}

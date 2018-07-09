<?php

/* catalog.html */
class __TwigTemplate_719c4b1f118501ecfda49be9897908fe5bf31bd0e74e87f8e3ff75b9b11650e8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
\t<meta charset=\"utf-8\">
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t<title>";
        // line 6
        echo twig_escape_filter($this->env, (isset($context["title"]) ? $context["title"] : null), "html", null, true);
        echo "</title>
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"";
        // line 7
        echo twig_escape_filter($this->env, (isset($context["root"]) ? $context["root"] : null), "html", null, true);
        echo "/learn/css/catalog.css\">
</head>
<body>
\t<div class=\"top\">
\t\t顶端设置
\t</div>
\t<div class=\"left\">
\t\t左端列表
\t</div>
\t<div class=\"content\">
\t\t底端备注
\t</div>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "catalog.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 7,  26 => 6,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!DOCTYPE html>
<html>
<head>
\t<meta charset=\"utf-8\">
\t<meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
\t<title>{{ title }}</title>
\t<link rel=\"stylesheet\" type=\"text/css\" href=\"{{ root }}/learn/css/catalog.css\">
</head>
<body>
\t<div class=\"top\">
\t\t顶端设置
\t</div>
\t<div class=\"left\">
\t\t左端列表
\t</div>
\t<div class=\"content\">
\t\t底端备注
\t</div>
</body>
</html>", "catalog.html", "/mnt/hgfs/AMP/www/learn_frame/learn/view/catalog.html");
    }
}

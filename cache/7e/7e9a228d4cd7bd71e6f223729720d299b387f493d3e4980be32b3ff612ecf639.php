<?php

/* /base.html */
class __TwigTemplate_8aae7add55fbaa1ef40f4f8d8ecd63bd55e4d9b0263f0db98795266180bf42bb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'headSet' => array($this, 'block_headSet'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 6
        $this->loadTemplate("meta.html", "/base.html", 6)->display($context);
        // line 7
        echo "    ";
        $this->displayBlock('headSet', $context, $blocks);
        // line 8
        echo "</head>
<body>
    ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "</body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
    }

    // line 7
    public function block_headSet($context, array $blocks = array())
    {
    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "/base.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 10,  53 => 7,  48 => 5,  43 => 11,  41 => 10,  37 => 8,  34 => 7,  32 => 6,  28 => 5,  22 => 1,);
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
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <title>{% block title %}{% endblock %}</title>
    {% include 'meta.html' %}
    {% block headSet %}{% endblock %}
</head>
<body>
    {% block body %}{% endblock %}
</body>
</html>", "/base.html", "/mnt/hgfs/AMP/www/learn_frame/learn/view/base.html");
    }
}

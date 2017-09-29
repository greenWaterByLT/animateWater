<?php

/* meta.html */
class __TwigTemplate_b668fca40e51acf8e2f8be24ff444ecf5d2f11cb4e00fb7810e89195ca05844b extends Twig_Template
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
        echo "<link rel=\"shortcut icon\" href=\"/favicon.ico\"/>
<script type=\"text/javascript\" src=\"";
        // line 2
        echo twig_escape_filter($this->env, (isset($context["root"]) ? $context["root"] : null), "html", null, true);
        echo "/common/js/jquery.min.js\"></script>
<script type=\"text/javascript\" src=\"";
        // line 3
        echo twig_escape_filter($this->env, (isset($context["root"]) ? $context["root"] : null), "html", null, true);
        echo "/common/js/common.js\"></script>";
    }

    public function getTemplateName()
    {
        return "meta.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  26 => 3,  22 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<link rel=\"shortcut icon\" href=\"/favicon.ico\"/>
<script type=\"text/javascript\" src=\"{{ root }}/common/js/jquery.min.js\"></script>
<script type=\"text/javascript\" src=\"{{ root }}/common/js/common.js\"></script>", "meta.html", "/mnt/hgfs/AMP/www/learn_frame/learn/view/meta.html");
    }
}

<?php

/* index.html.twig */
class __TwigTemplate_de76b5d58a07d2c72394388c96e8c8673aa511c60158f2b0db7379232af700bc extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("partials/page.html.twig", "index.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "partials/page.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_content($context, array $blocks = array())
    {
        // line 4
        echo "    ";
        echo $this->getAttribute($this->getAttribute((isset($context["gantry"]) ? $context["gantry"] : null), "platform", array()), "displayContent", array(0 => (isset($context["content"]) ? $context["content"] : null)), "method");
        echo "
";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 4,  28 => 3,  11 => 1,);
    }
}
/* {% extends "partials/page.html.twig" %}*/
/* */
/* {% block content %}*/
/*     {{ gantry.platform.displayContent(content)|raw }}*/
/* {% endblock %}*/
/* */

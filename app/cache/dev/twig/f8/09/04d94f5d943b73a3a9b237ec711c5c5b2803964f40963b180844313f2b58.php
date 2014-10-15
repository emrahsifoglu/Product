<?php

/* PriaDemoBundle:Secured:index.html.twig */
class __TwigTemplate_f80904d94f5d943b73a3a9b237ec711c5c5b2803964f40963b180844313f2b58 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate(":Security:layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
        );
    }

    protected function doGetParent(array $context)
    {
        return ":Security:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " SECURED AREA ";
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        echo " Welcome, ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
        echo ". This is Secured Area ";
    }

    public function getTemplateName()
    {
        return "PriaDemoBundle:Secured:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  35 => 5,  29 => 3,);
    }
}

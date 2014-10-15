<?php

/* PriaDemoBundle:Secured:_logout-form.html.twig */
class __TwigTemplate_592d05db2b461ff4cda920153f8659151eade612d7145b717c4f8a5ea418f3e7 extends Twig_Template
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
        echo "<div id=\"logout-container\">
    <span>username is ";
        // line 2
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
        echo "</span> - <a id=\"logout\" href=\"";
        echo $this->env->getExtension('routing')->getPath("logout");
        echo "\">Logout</a>
</div>";
    }

    public function getTemplateName()
    {
        return "PriaDemoBundle:Secured:_logout-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  22 => 2,  19 => 1,);
    }
}

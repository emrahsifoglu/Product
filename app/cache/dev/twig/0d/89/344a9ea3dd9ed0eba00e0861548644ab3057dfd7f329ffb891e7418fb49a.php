<?php

/* PriaDemoBundle:Home:_login-form.html.twig */
class __TwigTemplate_0d89344a9ea3dd9ed0eba00e0861548644ab3057dfd7f329ffb891e7418fb49a extends Twig_Template
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
        echo "<div id=\"login-container-open\" class=\"login-container-toggle\"><span><a href=\"#\">Login</a></span></div>
<div id=\"login-container\">
    <div style=\"right: 10px;\" id=\"login-container-hide\" class=\"login-container-toggle\"><span><a href=\"#\">Hide</a></span></div>
    <form id=\"login-form\" action=\"";
        // line 4
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"post\">
        ";
        // line 6
        echo "        <div>
            <label for=\"username\">Username</label>
            <input name=\"_username\" id=\"_username\" type=\"text\" placeholder=\"USERNAME\" data-required=\"true\" data-error-valid=\"Username is not valid\" data-min=\"4\" data-max=\"15\" data-error-len=\"Username must be between 4 and 15 characters\" data-error-required=\"Username is required\"/>
        </div>
        <div>
            <label for=\"password\">Password</label>
            <input name=\"_password\" id=\"_password\" type=\"Password\" placeholder=\"PASSWORD\" data-required=\"true\" data-min=\"4\" data-max=\"16\" data-error-len=\"Password must be between 4 and 16 characters\" data-error-required=\"Password is required\"/>
        </div>
        <input name=\"login\" type=\"button\" id=\"_submit\" value=\"Log In\" />
    </form>
</div>
<input type=\"hidden\" id=\"login-success\" value=\"";
        // line 17
        echo $this->env->getExtension('routing')->getPath("login_success");
        echo "\" />";
    }

    public function getTemplateName()
    {
        return "PriaDemoBundle:Home:_login-form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  41 => 17,  28 => 6,  24 => 4,  19 => 1,);
    }
}

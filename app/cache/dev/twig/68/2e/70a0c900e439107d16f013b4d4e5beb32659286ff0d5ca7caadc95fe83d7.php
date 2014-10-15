<?php

/* PriaDemoBundle:Admin:index.html.twig */
class __TwigTemplate_682e70a0c900e439107d16f013b4d4e5beb32659286ff0d5ca7caadc95fe83d7 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate(":Security:layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'header' => array($this, 'block_header'),
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'content' => array($this, 'block_content'),
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
        echo " ADMIN AREA ";
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        echo " Welcome, ";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user", array()), "username", array()), "html", null, true);
        echo " this is Admin Area ";
    }

    // line 7
    public function block_css($context, array $blocks = array())
    {
        // line 8
        echo "    ";
        $this->displayParentBlock("css", $context, $blocks);
        echo "
    <link rel='stylesheet' type='text/css' media='all' href='";
        // line 9
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/priademo/css/product-list.css"), "html", null, true);
        echo "' />
    <link rel='stylesheet' type='text/css' media='all' href='";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/priademo/css/admin-product-list.css"), "html", null, true);
        echo "' />
";
    }

    // line 13
    public function block_js($context, array $blocks = array())
    {
        // line 14
        echo "    ";
        $this->displayParentBlock("js", $context, $blocks);
        echo "
    <script type=\"text/javascript\" src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/priademo/js/admin-product-list.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 18
    public function block_content($context, array $blocks = array())
    {
        // line 19
        echo "    ";
        $this->displayParentBlock("content", $context, $blocks);
        echo "
    ";
        // line 20
        echo twig_include($this->env, $context, "PriaDemoBundle:Admin:_admin-product-list.html.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return "PriaDemoBundle:Admin:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 20,  81 => 19,  78 => 18,  72 => 15,  67 => 14,  64 => 13,  58 => 10,  54 => 9,  49 => 8,  46 => 7,  38 => 5,  32 => 3,);
    }
}

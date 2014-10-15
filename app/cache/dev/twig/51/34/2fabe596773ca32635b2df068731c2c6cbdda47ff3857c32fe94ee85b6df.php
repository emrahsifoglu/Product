<?php

/* PriaDemoBundle:Home:index.html.twig */
class __TwigTemplate_51342fabe596773ca32635b2df068731c2c6cbdda47ff3857c32fe94ee85b6df extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("layout.html.twig");

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
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " Welcome, this is Home ";
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        echo " Home ";
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/priademo/css/login-form.css"), "html", null, true);
        echo "' />
    <link rel='stylesheet' type='text/css' media='all' href='";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/priademo/css/product-list.css"), "html", null, true);
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/priademo/js/product-list.js"), "html", null, true);
        echo "\"></script>
    <script type=\"text/javascript\" src=\"";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/priademo/js/login-form.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 19
    public function block_content($context, array $blocks = array())
    {
        // line 20
        echo "    ";
        echo twig_include($this->env, $context, "PriaDemoBundle:Home:_product-list.html.twig");
        echo "
    ";
        // line 21
        echo twig_include($this->env, $context, "PriaDemoBundle:Home:_login-form.html.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return "PriaDemoBundle:Home:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 21,  83 => 20,  80 => 19,  74 => 16,  70 => 15,  65 => 14,  62 => 13,  56 => 10,  52 => 9,  47 => 8,  44 => 7,  38 => 5,  32 => 3,);
    }
}

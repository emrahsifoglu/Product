<?php

/* :Security:layout.html.twig */
class __TwigTemplate_a0951653d7002fdc187fcfd34a732a1e37f8a72a1c8307bfe1b4267b980b8b3e extends Twig_Template
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
        echo " Welcome, this is secured Area ";
    }

    // line 5
    public function block_header($context, array $blocks = array())
    {
        echo " Secured Area ";
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
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/priademo/css/logout-form.css"), "html", null, true);
        echo "' />
";
    }

    // line 12
    public function block_js($context, array $blocks = array())
    {
        // line 13
        echo "    ";
        $this->displayParentBlock("js", $context, $blocks);
        echo "
    <script type=\"text/javascript\" src=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/priademo/js/logout-form.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
        // line 18
        echo "    ";
        echo twig_include($this->env, $context, "PriaDemoBundle:Secured:_logout-form.html.twig");
        echo "
";
    }

    public function getTemplateName()
    {
        return ":Security:layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  75 => 18,  72 => 17,  66 => 14,  61 => 13,  58 => 12,  52 => 9,  47 => 8,  44 => 7,  38 => 5,  32 => 3,);
    }
}

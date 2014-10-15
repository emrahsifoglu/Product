<?php

/* ::layout.html.twig */
class __TwigTemplate_743824c381930b241dc923d9ac640459046a623b301c8205ae8a0f5976a3d7ef extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html.twig");

        $this->blocks = array(
            'css' => array($this, 'block_css'),
            'js' => array($this, 'block_js'),
            'body' => array($this, 'block_body'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_css($context, array $blocks = array())
    {
        // line 4
        echo "      <link rel='stylesheet' type='text/css' media='all' href='";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/priademo/css/layout.css"), "html", null, true);
        echo "' />
";
    }

    // line 7
    public function block_js($context, array $blocks = array())
    {
        // line 8
        echo "        <script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-2.1.1.min.js\"></script>
        <script type=\"text/javascript\" src=\"http://underscorejs.org/underscore-min.js\"></script>
        <script type=\"text/javascript\" src=\"http://backbonejs.org/backbone-min.js\"></script>
";
    }

    // line 13
    public function block_body($context, array $blocks = array())
    {
        // line 14
        echo "    <header>";
        $this->displayBlock('header', $context, $blocks);
        echo "</header>
    <div id=\"content\">
        ";
        // line 16
        $this->displayBlock('content', $context, $blocks);
        // line 17
        echo "    </div>
    <footer class=\"site-footer\">
        Footer
    </footer>
";
    }

    // line 14
    public function block_header($context, array $blocks = array())
    {
    }

    // line 16
    public function block_content($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::layout.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  76 => 16,  71 => 14,  63 => 17,  61 => 16,  55 => 14,  52 => 13,  45 => 8,  42 => 7,  35 => 4,  32 => 3,);
    }
}

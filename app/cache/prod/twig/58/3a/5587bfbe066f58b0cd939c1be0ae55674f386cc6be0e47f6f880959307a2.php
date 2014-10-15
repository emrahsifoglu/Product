<?php

/* ::demo.html.twig */
class __TwigTemplate_583a5587bfbe066f58b0cd939c1be0ae55674f386cc6be0e47f6f880959307a2 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\" />
    <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "    ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 8
        echo "    <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
</head>
<body>
";
        // line 11
        $this->displayBlock('body', $context, $blocks);
        // line 12
        echo "</body>
</html>";
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 7
    public function block_javascripts($context, array $blocks = array())
    {
    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "::demo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 11,  58 => 6,  52 => 5,  47 => 12,  45 => 11,  38 => 8,  35 => 7,  33 => 6,  29 => 5,  23 => 1,  197 => 75,  194 => 74,  182 => 69,  175 => 65,  169 => 62,  166 => 61,  161 => 60,  154 => 55,  142 => 50,  135 => 46,  129 => 43,  126 => 42,  122 => 41,  116 => 37,  114 => 36,  93 => 19,  90 => 18,  87 => 17,  71 => 13,  66 => 12,  63 => 7,  49 => 9,  44 => 8,  42 => 7,  39 => 6,  36 => 5,  30 => 3,);
    }
}

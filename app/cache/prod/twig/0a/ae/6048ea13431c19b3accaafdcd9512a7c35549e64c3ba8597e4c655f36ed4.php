<?php

/* PriaDemoBundle:Demo:login.html.twig */
class __TwigTemplate_0aae6048ea13431c19b3accaafdcd9512a7c35549e64c3ba8597e4c655f36ed4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::demo.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'javascripts' => array($this, 'block_javascripts'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "::demo.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " Login ";
    }

    // line 5
    public function block_stylesheets($context, array $blocks = array())
    {
        // line 6
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "7cac343_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7cac343_0") : $this->env->getExtension('assets')->getAssetUrl("css/7cac343_login_1.css");
            // line 7
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" media=\"screen\" />
    ";
        } else {
            // asset "7cac343"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_7cac343") : $this->env->getExtension('assets')->getAssetUrl("css/7cac343.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" media=\"screen\" />
    ";
        }
        unset($context["asset_url"]);
    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        // line 12
        echo "    <script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-2.0.3.min.js\"></script>
    ";
        // line 13
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "e691724_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e691724_0") : $this->env->getExtension('assets')->getAssetUrl("js/e691724_login_1.js");
            // line 14
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "e691724"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_e691724") : $this->env->getExtension('assets')->getAssetUrl("js/e691724.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 18
    public function block_body($context, array $blocks = array())
    {
        // line 19
        echo "    <body>
    <div id=\"content\">
        <form id=\"login_form\" action=\"";
        // line 21
        echo $this->env->getExtension('routing')->getPath("login_check");
        echo "\" method=\"POST\">
            <div align=\"center\" class=\"top\">LOGIN</div>
            <div align=\"center\" >
                <table border=\"0\">
                    <tr>
                        <td align=\"left\">Username</td>
                        <td align=\"left\"><input name=\"_username\" type=\"text\" id=\"_username\" data-required=\"true\" data-error-valid=\"Username is not valid\" data-min=\"5\" data-max=\"15\" data-error-len=\"Username must be between 5 and 15 characters\" data-error-required=\"Username is required\"></td>
                    </tr>
                    <tr>
                        <td align=\"left\">Password</td>
                        <td align=\"left\"><input name=\"_password\" type=\"Password\" id=\"_password\" data-required=\"true\" data-min=\"4\" data-max=\"8\" data-error-len=\"Password must be between 4 and 8 characters\" data-error-required=\"Password is required\"></td>
                    </tr>
                    <tr>
                        <td colspan=\"2\" align=\"right\" class=\"buttondiv\"><input name=\"Submit\" type=\"submit\" id=\"submit\" value=\"Enter\" style=\"margin-left:-10px; height:23px\"/></td>
                    </tr>
                    <tr>
                        <td colspan=\"2\" align=\"right\"><span id=\"msgbox\" style=\"display:none\"></span></td>
                    </tr>
                </table>
            </div>
        </form>
    </div>
    <div align=\"center\" id=\"output\"></div>
    </body>
";
    }

    public function getTemplateName()
    {
        return "PriaDemoBundle:Demo:login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 21,  90 => 19,  87 => 18,  71 => 14,  67 => 13,  64 => 12,  61 => 11,  45 => 7,  40 => 6,  37 => 5,  31 => 3,);
    }
}

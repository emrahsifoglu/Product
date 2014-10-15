<?php

/* PriaDemoBundle:Test:upload.html.twig */
class __TwigTemplate_d691b52ac4a50dafcea55bc2fe1d6f41711ceaa332de5b84622848cdd433392a extends Twig_Template
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
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "925583b_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_925583b_0") : $this->env->getExtension('assets')->getAssetUrl("css/925583b_update_1.css");
            // line 2
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
";
        } else {
            // asset "925583b"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_925583b") : $this->env->getExtension('assets')->getAssetUrl("css/925583b.css");
            echo "    <link rel=\"stylesheet\" href=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\" />
";
        }
        unset($context["asset_url"]);
        // line 4
        echo "
<script type=\"text/javascript\" src=\"//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js\"></script>

";
        // line 7
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "4afa9fd_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4afa9fd_0") : $this->env->getExtension('assets')->getAssetUrl("js/4afa9fd_update_1.js");
            // line 8
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        } else {
            // asset "4afa9fd"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_4afa9fd") : $this->env->getExtension('assets')->getAssetUrl("js/4afa9fd.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
";
        }
        unset($context["asset_url"]);
        // line 10
        echo "
<form enctype=\"multipart/form-data\" method=\"post\" action=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("upload");
        echo "\">
    <input type=\"file\" name=\"fieldname\" />
    <input type=\"submit\" />
    <div>";
        // line 14
        echo twig_escape_filter($this->env, (isset($context["status"]) ? $context["status"] : $this->getContext($context, "status")), "html", null, true);
        echo "</div>
    <div>";
        // line 15
        echo twig_escape_filter($this->env, (isset($context["message"]) ? $context["message"] : $this->getContext($context, "message")), "html", null, true);
        echo "</div>
</form>

<div>
    <table border=\"0\">
        <tr>
            <td>
                <table id=\"avatar\" background=\"\" bgcolor=\"#DDD\" width=\"180\" height=\"180\" style=\"width:180; height:180; overflow:hidden; background-position:center; background-repeat:no-repeat; border-left: 1px solid #800080; border-right: 1px solid #FF00FF; border-top: 1px solid #FF00FF; border-bottom: 1px solid #800080\">
                    <tr>
                        <td valign=\"middle\" align=\"center\">
                            <div id=\"progressbox\"><div id=\"progressbar\"><div id=\"statustxt\"></div></div></div>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td>
                <form action=\"profile.php\"  method=\"post\" enctype=\"multipart/form-data\" id=\"UploadForm\">
                    <div id=\"getfile\">SEÇİN</div>
                    <div style='height: 0px;width: 0px; overflow:hidden;'><input id=\"upfile\" name=\"ImageFile\" type=\"file\" value=\"upload\"/></div>
                </form>
            </td>
        </tr>
    </table>
</div>";
    }

    public function getTemplateName()
    {
        return "PriaDemoBundle:Test:upload.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 15,  69 => 14,  63 => 11,  60 => 10,  46 => 8,  42 => 7,  37 => 4,  23 => 2,  19 => 1,);
    }
}

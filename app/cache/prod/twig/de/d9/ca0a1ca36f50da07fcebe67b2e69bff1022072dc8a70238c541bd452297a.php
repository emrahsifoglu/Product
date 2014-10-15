<?php

/* PriaDemoBundle:Demo:index.html.twig */
class __TwigTemplate_ded9ca0a1ca36f50da07fcebe67b2e69bff1022072dc8a70238c541bd452297a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("::demo.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
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
        echo " List of Products ";
    }

    // line 5
    public function block_javascripts($context, array $blocks = array())
    {
        // line 6
        echo "    <script type=\"text/javascript\" src=\"http://code.jquery.com/jquery-2.0.3.min.js\"></script>
    ";
        // line 7
        if ((twig_length_filter($this->env, (isset($context["products"]) ? $context["products"] : $this->getContext($context, "products"))) > 3)) {
            // line 8
            echo "        ";
            if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
                // asset "669dd85_0"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_669dd85_0") : $this->env->getExtension('assets')->getAssetUrl("js/669dd85_jcarousellite_1.0.1.min_1.js");
                // line 9
                echo "        <script type=\"text/javascript\" src=\"";
                echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
                echo "\"></script>
        ";
            } else {
                // asset "669dd85"
                $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_669dd85") : $this->env->getExtension('assets')->getAssetUrl("js/669dd85.js");
                echo "        <script type=\"text/javascript\" src=\"";
                echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
                echo "\"></script>
        ";
            }
            unset($context["asset_url"]);
            // line 11
            echo "    ";
        }
        // line 12
        echo "    ";
        if (isset($context['assetic']['debug']) && $context['assetic']['debug']) {
            // asset "18e9259_0"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_18e9259_0") : $this->env->getExtension('assets')->getAssetUrl("js/18e9259_index_1.js");
            // line 13
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        } else {
            // asset "18e9259"
            $context["asset_url"] = isset($context['assetic']['use_controller']) && $context['assetic']['use_controller'] ? $this->env->getExtension('routing')->getPath("_assetic_18e9259") : $this->env->getExtension('assets')->getAssetUrl("js/18e9259.js");
            echo "    <script type=\"text/javascript\" src=\"";
            echo twig_escape_filter($this->env, (isset($context["asset_url"]) ? $context["asset_url"] : $this->getContext($context, "asset_url")), "html", null, true);
            echo "\"></script>
    ";
        }
        unset($context["asset_url"]);
    }

    // line 17
    public function block_body($context, array $blocks = array())
    {
        // line 18
        echo "    ";
        if ((twig_length_filter($this->env, (isset($context["products"]) ? $context["products"] : $this->getContext($context, "products"))) > 0)) {
            // line 19
            echo "        <div style=\"display:none;\" id=\"product_detail\">";
            echo $this->env->getExtension('routing')->getPath("product_read");
            echo "</div>
        <table  align=\"center\">
            <tr>
                <td>
                    <table align=\"center\" id=\"big_image_holder\" background=\"\" bgcolor=\"#DDD\" width=\"400\" height=\"400\" style=\"width:400; height:400; overflow:hidden; background-position:center; background-repeat:no-repeat; border-left: 1px solid #800080; border-right: 1px solid #FF00FF; border-top: 1px solid #FF00FF; border-bottom: 1px solid #800080\">
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
                    <table align=\"center\" class=\"records_list\">
                        <tr>
                            ";
            // line 36
            if ((twig_length_filter($this->env, (isset($context["products"]) ? $context["products"] : $this->getContext($context, "products"))) > 3)) {
                // line 37
                echo "                                <td><button class=\"prev\"><<</button></td>
                                <td>
                                    <div class=\"jCarouselLite\">
                                        <ul>
                                            ";
                // line 41
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")));
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    // line 42
                    echo "                                                <li>
                                                    <table class=\"product\" id=\"";
                    // line 43
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id"), "html", null, true);
                    echo "\">
                                                        <thead>
                                                        <tr>
                                                            <th><span>";
                    // line 46
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "name"), "html", null, true);
                    echo "</span></th>
                                                        </tr>
                                                        </thead>
                                                        <tr>
                                                            <td><img src=\"";
                    // line 50
                    echo twig_escape_filter($this->env, (isset($context["images_folder_path"]) ? $context["images_folder_path"] : $this->getContext($context, "images_folder_path")), "html", null, true);
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "imageThumb"), "html", null, true);
                    echo "\" width=\"150\" height=\"150\"></td>
                                                        </tr>
                                                    </table>
                                                </li>
                                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 55
                echo "                                        </ul>
                                    </div>
                                </td>
                                <td><button class=\"next\">>></button></td>
                            ";
            } else {
                // line 60
                echo "                                ";
                $context['_parent'] = (array) $context;
                $context['_seq'] = twig_ensure_traversable((isset($context["products"]) ? $context["products"] : $this->getContext($context, "products")));
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    // line 61
                    echo "                                    <td>
                                        <table class=\"product\" id=\"";
                    // line 62
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "id"), "html", null, true);
                    echo "\">
                                            <thead>
                                            <tr>
                                                <th><span>";
                    // line 65
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "name"), "html", null, true);
                    echo "</span></th>
                                            </tr>
                                            </thead>
                                            <tr>
                                                <td><img src=\"";
                    // line 69
                    echo twig_escape_filter($this->env, (isset($context["images_folder_path"]) ? $context["images_folder_path"] : $this->getContext($context, "images_folder_path")), "html", null, true);
                    echo twig_escape_filter($this->env, $this->getAttribute((isset($context["product"]) ? $context["product"] : $this->getContext($context, "product")), "imageThumb"), "html", null, true);
                    echo "\" width=\"150\" height=\"150\"></td>
                                            </tr>
                                        </table>
                                    </td>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 74
                echo "                            ";
            }
            // line 75
            echo "                        </tr>
                    </table>
                </td>
            </tr>
        </table>


    ";
        }
    }

    public function getTemplateName()
    {
        return "PriaDemoBundle:Demo:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  197 => 75,  194 => 74,  182 => 69,  175 => 65,  169 => 62,  166 => 61,  161 => 60,  154 => 55,  142 => 50,  135 => 46,  129 => 43,  126 => 42,  122 => 41,  116 => 37,  114 => 36,  93 => 19,  90 => 18,  87 => 17,  71 => 13,  66 => 12,  63 => 11,  49 => 9,  44 => 8,  42 => 7,  39 => 6,  36 => 5,  30 => 3,);
    }
}

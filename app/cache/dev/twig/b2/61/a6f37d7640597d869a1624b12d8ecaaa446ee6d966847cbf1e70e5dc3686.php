<?php

/* PriaDemoBundle:Home:_product-list.html.twig */
class __TwigTemplate_b261a6f37d7640597d869a1624b12d8ecaaa446ee6d966847cbf1e70e5dc3686 extends Twig_Template
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
        echo "<table style=\"border: 0\">
    <tr>
        <td>
            <div id=\"product-list-container\">
                <ul id=\"product-list\">

                </ul>
            </div>
        </td>
        <td id=\"product-detail-holder\">

        </td>
   </tr>
</table>

<script id=\"productItem\" type=\"text/template\">
    <li class=\"show\"><img src='/uploads/uploads/products/<%= imageThumb %>'/><h3><%= name %></h3><p><%= description %></p></li>
</script>

<script id=\"productItemDetail\" type=\"text/template\">
    <div id=\"product-detail\" style=\"background-image: url('/uploads/uploads/products/<%= imageBig %>')\">
        <h3 style=\"padding-left: 5px;\"><%= name %></h3>
        <p style=\"padding-left: 5px;\" id=\"text\"><%= description %></p>
    </div>
</script>";
    }

    public function getTemplateName()
    {
        return "PriaDemoBundle:Home:_product-list.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}

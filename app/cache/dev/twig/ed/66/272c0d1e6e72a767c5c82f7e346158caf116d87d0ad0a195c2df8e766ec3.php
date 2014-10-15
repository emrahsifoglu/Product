<?php

/* PriaDemoBundle:Admin:_admin-product-list.html.twig */
class __TwigTemplate_ed66272c0d1e6e72a767c5c82f7e346158caf116d87d0ad0a195c2df8e766ec3 extends Twig_Template
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
        <td id=\"product-crud-holder\">

        </td>
    </tr>
</table>

<script id=\"productItem\" type=\"text/template\">
    <li>
       <img src='/uploads/uploads/products/<%= imageThumb %>'/><h3><%= name %></h3><p><%= description %></p>
       <span style=\"float: right; font-weight: bold;\">
           <a id=\"edit\" href=\"#\">EDIT</a> - <a id=\"show\" href=\"#\">SHOW</a> - <a id=\"delete\" href=\"#\">DELETE</a>
        </span>
    </li>
</script>

<script id=\"productItemDetail\" type=\"text/template\">
    <div id=\"product-detail\" style=\"background-image: url('/uploads/uploads/products/<%= imageThumb %>')\">
        <h3 style=\"padding-left: 5px;\"><%= name %></h3>
        <p style=\"padding-left: 5px;\" id=\"text\"><%= description %></p>
    </div>
</script>

<script id=\"productItemEdit\" type=\"text/template\">
    <div id=\"product-edit\">
        <div id=\"new\"><span>New<span></div>
        <h3>Name</h3>
        <input type=\"text\" id=\"name\" value=\"<%= name %>\" placeholder=\"Name\">
        <h3>Description</h3>
        <textarea id=\"description\" style=\"resize: none;\" rows=\"4\" cols=\"50\" placeholder=\"Description\"><%= description %></textarea>
        <h3>External Link</h3>
        <input id=\"externalLink\" type=\"text\" value=\"<%= externalLink %>\"  placeholder=\"Link\">
        <div style=\"position:absolute; bottom: 5px; right: 5px;\"><button id=\"update\">Update</button></div>
    </div>
</script>

<script id=\"productItemForNew\" type=\"text/template\">
    <div id=\"product-edit\">
        <h3>Name</h3>
        <input type=\"text\" id=\"name\" placeholder=\"Name\">
        <h3>Description</h3>
        <textarea id=\"description\" style=\"resize: none;\" rows=\"4\" cols=\"50\" placeholder=\"Description\"></textarea>
        <h3>External Link</h3>
        <input id=\"externalLink\" type=\"text\" placeholder=\"Link\">
        <div style=\"position:absolute; bottom: 5px; right: 5px;\"><button id=\"save\">save</button></div>
    </div>
</script>";
    }

    public function getTemplateName()
    {
        return "PriaDemoBundle:Admin:_admin-product-list.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}

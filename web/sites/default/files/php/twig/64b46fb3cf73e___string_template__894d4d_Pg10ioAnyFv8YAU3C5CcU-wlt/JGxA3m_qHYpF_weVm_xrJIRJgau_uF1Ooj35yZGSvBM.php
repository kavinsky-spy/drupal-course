<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* __string_template__894d4d96670b0b9991b23f27f1cf02ad */
class __TwigTemplate_43e5e5154352f4e5753607f2d5a89708 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 6
        echo "
";
        // line 7
        $context["custom_access"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("examples.menu_example.custom_access");
        // line 8
        $context["permissioned"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("examples.menu_example.permissioned");
        // line 9
        $context["route_only"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("examples.menu_example.route_only");
        // line 10
        $context["tabs"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("examples.menu_example.tabs");
        // line 11
        $context["use_url_arguments"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("examples.menu_example.use_url_arguments");
        // line 12
        $context["title_callbacks"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("examples.menu_example.title_callbacks");
        // line 13
        $context["placeholder_argument"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("examples.menu_example.placeholder_argument");
        // line 14
        $context["path_override"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("example.menu_example.path_override");
        // line 15
        echo "
";
        // line 16
        echo t("<p>This page is displayed by the simplest (and base) menu example. Note that
the title of the page is the same as the link title. There are a number of
examples here, from the most basic (like this one) to extravagant mappings of
loaded placeholder arguments. Enjoy!</p>

<ul>
    <li><a href=@custom_access>Custom Access Example</a></li>
    <li><a href=@permissioned>Permissioned Example</a></li>
    <li><a href=@route_only>Route only example</a></li>
    <li><a href=@tabs>Tabs</a></li>
    <li><a href=@use_url_arguments>URL Arguments</a></li>
    <li><a href=@title_callbacks>Dynamic title</a></li>
    <li><a href=@placeholder_argument>Placeholder Arguments</a></li>
    <li><a href=@path_override>Path Override</a></li>
</ul>", array("@custom_access" =>         // line 24
($context["custom_access"] ?? null), "@permissioned" =>         // line 25
($context["permissioned"] ?? null), "@route_only" =>         // line 26
($context["route_only"] ?? null), "@tabs" =>         // line 27
($context["tabs"] ?? null), "@use_url_arguments" =>         // line 28
($context["use_url_arguments"] ?? null), "@title_callbacks" =>         // line 29
($context["title_callbacks"] ?? null), "@placeholder_argument" =>         // line 30
($context["placeholder_argument"] ?? null), "@path_override" =>         // line 31
($context["path_override"] ?? null), ));
    }

    public function getTemplateName()
    {
        return "__string_template__894d4d96670b0b9991b23f27f1cf02ad";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  83 => 31,  82 => 30,  81 => 29,  80 => 28,  79 => 27,  78 => 26,  77 => 25,  76 => 24,  61 => 16,  58 => 15,  56 => 14,  54 => 13,  52 => 12,  50 => 11,  48 => 10,  46 => 9,  44 => 8,  42 => 7,  39 => 6,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__894d4d96670b0b9991b23f27f1cf02ad", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 7, "trans" => 16);
        static $filters = array("escape" => 24);
        static $functions = array("path" => 7);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'trans'],
                ['escape'],
                ['path']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}

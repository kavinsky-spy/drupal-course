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

/* __string_template__2644b3f6f5980b14935894da563f43a3 */
class __TwigTemplate_8a1906d629ecc1b4b9bac8d37f38e8e1 extends Template
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
        $context["simple_ajax_example"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("ajax_example.simplest");
        // line 8
        $context["ajax_generate_textfields"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("ajax_example.autotextfields");
        // line 9
        $context["ajax_submit"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("ajax_example.submit_driven_ajax");
        // line 10
        $context["ajax_dependent_dropdown"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("ajax_example.dependent_dropdown");
        // line 11
        $context["ajax_dependent_dropdown_nojs"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("ajax_example.dependent_dropdown", ["nojs" => "nojs"]);
        // line 12
        $context["ajax_dynamic_form"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("ajax_example.dynamic_form_sections");
        // line 13
        $context["ajax_dynamic_form_nojs"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("ajax_example.dynamic_form_sections", ["nojs" => "nojs"]);
        // line 14
        $context["ajax_wizard_example"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("ajax_example.wizard");
        // line 15
        $context["ajax_wizard_example_nojs"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("ajax_example.wizardnojs");
        // line 16
        echo "
";
        // line 17
        echo t("<p>The AJAX example module provides many examples of AJAX including forms, links, and AJAX commands.</p>
<p><a href=@simple_ajax_example>Simplest AJAX Example</a></p>
<p><a href=@ajax_generate_textfields>Generate textfields</a></p>
<p><a href=@ajax_submit>Submit-driven AJAX</a></p>
<p><a href=@ajax_dependent_dropdown>Dependent dropdown</a></p>
<p><a href=@ajax_dependent_dropdown_nojs>Dependent dropdown w/ no JS</a></p>
<p><a href=@ajax_dynamic_form>Dynamic form sections</a></p>
<p><a href=@ajax_dynamic_form_nojs>Dynamic form sections w/ no JS</a></p>
<p><a href=@ajax_wizard_example>AJAX Wizard Example</a></p>
<p><a href=@ajax_wizard_example_nojs>AJAX Wizard Example w/JS turned off</a></p>", array("@simple_ajax_example" =>         // line 20
($context["simple_ajax_example"] ?? null), "@ajax_generate_textfields" =>         // line 21
($context["ajax_generate_textfields"] ?? null), "@ajax_submit" =>         // line 22
($context["ajax_submit"] ?? null), "@ajax_dependent_dropdown" =>         // line 23
($context["ajax_dependent_dropdown"] ?? null), "@ajax_dependent_dropdown_nojs" =>         // line 24
($context["ajax_dependent_dropdown_nojs"] ?? null), "@ajax_dynamic_form" =>         // line 25
($context["ajax_dynamic_form"] ?? null), "@ajax_dynamic_form_nojs" =>         // line 26
($context["ajax_dynamic_form_nojs"] ?? null), "@ajax_wizard_example" =>         // line 27
($context["ajax_wizard_example"] ?? null), "@ajax_wizard_example_nojs" =>         // line 28
($context["ajax_wizard_example_nojs"] ?? null), ));
    }

    public function getTemplateName()
    {
        return "__string_template__2644b3f6f5980b14935894da563f43a3";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 28,  80 => 27,  79 => 26,  78 => 25,  77 => 24,  76 => 23,  75 => 22,  74 => 21,  73 => 20,  63 => 17,  60 => 16,  58 => 15,  56 => 14,  54 => 13,  52 => 12,  50 => 11,  48 => 10,  46 => 9,  44 => 8,  42 => 7,  39 => 6,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__2644b3f6f5980b14935894da563f43a3", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 7, "trans" => 17);
        static $filters = array("escape" => 20);
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

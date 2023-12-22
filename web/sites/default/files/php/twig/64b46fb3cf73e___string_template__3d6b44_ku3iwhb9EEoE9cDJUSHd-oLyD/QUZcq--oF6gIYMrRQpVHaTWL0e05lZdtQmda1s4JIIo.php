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

/* __string_template__3d6b44f44fef9256997afad8856cdb53 */
class __TwigTemplate_a0e8255b3d306d7f26ed1af4c2f36926 extends Template
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
        $context["js_weights"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("js_example.weights");
        // line 8
        $context["js_accordion"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("js_example.accordion");
        // line 9
        echo "
";
        // line 10
        echo t("<p>Drupal includes jQuery and jQuery UI.</p>

<p>We have two examples of using these:</p>

<ol>
  <li>
    <p><a href=@js_accordion>An accordion-style section reveal effect</a>:
        This demonstrates calling a JavaScript function using Drupal rendering
        system.
  </li>
  <li>
    <p><a href=@js_weights>Sorting according to numeric weight</a>: This
        demonstrates attaching your own JavaScript code to individual page
        elements using Drupal rendering system.</p>
  </li>
</ol>", array("@js_accordion" =>         // line 18
($context["js_accordion"] ?? null), "@js_weights" =>         // line 23
($context["js_weights"] ?? null), ));
    }

    public function getTemplateName()
    {
        return "__string_template__3d6b44f44fef9256997afad8856cdb53";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  66 => 23,  65 => 18,  49 => 10,  46 => 9,  44 => 8,  42 => 7,  39 => 6,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__3d6b44f44fef9256997afad8856cdb53", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 7, "trans" => 10);
        static $filters = array("escape" => 18);
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

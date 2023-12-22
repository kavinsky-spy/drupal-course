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

/* modules/contrib/examples/modules/js_example/templates/accordion.html.twig */
class __TwigTemplate_e1defccf07f4ad54d61438d84e27042e extends Template
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
        // line 8
        echo "<div class=\"accordionWrapper\">
  <div class=\"accordionItem open\">
    <h2 class=\"accordionItemHeading\">About accordions</h2>
    <div class=\"accordionItemContent\">
      <p>JavaScript accordions let you squeeze a lot of content into a small space in a Web page.</p>
      <p>This simple accordion degrades gracefully in browsers that don't support JavaScript or CSS.</p>
    </div>
  </div>

  <div class=\"accordionItem close\">
    <h2 class=\"accordionItemHeading\">Accordion items</h2>
    <div class=\"accordionItemContent\">
      <p>A JavaScript accordion is made up of a number of expandable/collapsible items. Only one item is ever shown at a time.</p>
      <p>You can include any content you want inside an accordion item. Here's a bullet list:</p>
      <ul>
        <li>List item #1</li>
        <li>List item #2</li>
        <li>List item #3</li>
      </ul>
    </div>
  </div>

  <div class=\"accordionItem close\">
    <h2 class=\"accordionItemHeading\">How to use a JavaScript accordion</h2>
    <div class=\"accordionItemContent\">
      <p>Click an accordion item's heading to expand it. To collapse the item, click it again, or click another item heading.</p>
    </div>
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/examples/modules/js_example/templates/accordion.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  39 => 8,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/examples/modules/js_example/templates/accordion.html.twig", "/app/web/modules/contrib/examples/modules/js_example/templates/accordion.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
                [],
                []
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

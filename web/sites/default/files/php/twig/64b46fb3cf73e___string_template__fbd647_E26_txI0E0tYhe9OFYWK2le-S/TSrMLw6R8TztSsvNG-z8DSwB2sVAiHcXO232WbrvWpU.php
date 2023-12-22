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

/* __string_template__fbd647a8a8989a54d39b1fc5f4a9f99b */
class __TwigTemplate_3c8b75b18285b4a30efcb3b4998da6b1 extends Template
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
        $context["block_admin_page"] = (($__internal_compile_0 = $this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("block.admin_display")) && is_array($__internal_compile_0) || $__internal_compile_0 instanceof ArrayAccess ? ($__internal_compile_0["#markup"] ?? null) : null);
        // line 8
        echo "
";
        // line 9
        echo t("<p>The Block Example provides three sample blocks which demonstrate the various
  block APIs. To experiment with the blocks, enable and configure them on
  <a href=\"@block_admin_page\">the block admin page</a>.</p>", array("@block_admin_page" =>         // line 13
($context["block_admin_page"] ?? null), ));
    }

    public function getTemplateName()
    {
        return "__string_template__fbd647a8a8989a54d39b1fc5f4a9f99b";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  50 => 13,  47 => 9,  44 => 8,  42 => 7,  39 => 6,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__fbd647a8a8989a54d39b1fc5f4a9f99b", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 7, "trans" => 9);
        static $filters = array("escape" => 13);
        static $functions = array("url" => 7);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'trans'],
                ['escape'],
                ['url']
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

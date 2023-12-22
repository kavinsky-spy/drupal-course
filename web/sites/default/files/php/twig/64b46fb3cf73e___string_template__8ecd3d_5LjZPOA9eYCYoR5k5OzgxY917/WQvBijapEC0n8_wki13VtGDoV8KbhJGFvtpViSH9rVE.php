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

/* __string_template__8ecd3ddbfa1f08a607bc055e97d39124 */
class __TwigTemplate_5ddb88d81860726e7099a965c2cc49ac extends Template
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
        $context["help_hooks_example"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("help.page", ["name" => "hooks_example"]);
        // line 8
        $context["node_add_page"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("node.add_page");
        // line 9
        $context["user_login"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("user.login");
        // line 10
        echo "
";
        // line 11
        echo t("<h2>Implementing, defining, and invoking hooks</h2>

<p>The code in this module implements a couple of new features which you can see
in action.</p>

<p><strong>Implements <code>hook_help()</code>:</strong> In
<code>hooks_example.module</code> you'll find an implementation of the
<code>hook hook_help()</code> which is used to add contents to this module's
help overview. Visible at <a href=@help_hooks_example>
<code>admin/help/hooks_example</code></a>.</p>

<p><strong>View counts:</strong> <code>hooks_example_node_view()</code> is an
implementation of the hook <code>hook_ENTITY_TYPE_view()</code> that adds a
basic page view counter. You can see this in action by navigating to any node on
the site and looking for the the text telling you how many times you've viewed
that page.</p>

<p>Don't have any nodes? <a href=@node_add_page>Add some</a> and look at
their counters.</p>

<p><strong>Implements <code>hook_form_alter()</code>:</strong> In
<code>hooks_example.module</code> you'll find an implementation of
<code>hook_form_alter()</code> which demonstrates the use of one of the most
commonly used alter hooks. You can view the altered form at
<a href=@user_login><code>user/login</code></a>.</p>

<p>To learn more about how to implement an existing hook, or how to define and
invoke a new hook start by reading the <code>@docblock</code> comments in
<code>hooks_example.module</code>.</p>", array("@help_hooks_example" =>         // line 21
($context["help_hooks_example"] ?? null), "@node_add_page" =>         // line 30
($context["node_add_page"] ?? null), "@user_login" =>         // line 37
($context["user_login"] ?? null), ));
    }

    public function getTemplateName()
    {
        return "__string_template__8ecd3ddbfa1f08a607bc055e97d39124";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 37,  81 => 30,  80 => 21,  51 => 11,  48 => 10,  46 => 9,  44 => 8,  42 => 7,  39 => 6,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__8ecd3ddbfa1f08a607bc055e97d39124", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 7, "trans" => 11);
        static $filters = array("escape" => 21);
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

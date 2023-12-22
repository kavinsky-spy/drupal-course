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

/* __string_template__cf22c44e835d99eeac27adc0e946b2f2 */
class __TwigTemplate_8fef28175b20d49b55a68bf6ba373b9e extends Template
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
        $context["sum_in_hands"] = $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("testing_example.sum_in_hands");
        // line 8
        echo "
";
        // line 9
        echo t("<h2>Testing Frameworks in Drupal</h2>

<p>This module <a href=@sum_in_hands>provides a path</a> so we can test it.
    The path takes two numeric arguments, and tells you how many hands are
    required to count the sum of both numbers.</p>

<h3>How to use this example module</h3>
<p>You really should be reading the various docblocks in the files under
  <code>tests/src/</code>.</p>

<h3>How To:</h3>
<ul>
  <li>PHPUnit-based Drupal tests go in the <code>tests/src</code> directory, so
    they will not be loaded by the autoloader during normal bootstrap.
  </li>

  <li>Unit tests go in <code>[your_module]/tests/src/Unit</code>.</li>
  <li>Kernel tests go in <code>[your_module]/tests/src/Kernel</code>.</li>
  <li>Functional tests go in <code>[your_module]/tests/src/Functional</code>.</li>
</ul>

<table>
  <thead>
  <tr>
    <td><b>Type</b></td>
    <td><b>Location</b></td>
    <td><b>Namespace</b></td>
    <td><b>Subclass of</b></td>
  </tr>
  </thead>
  <tbody>
  <tr>
    <td>Unit test</td>
    <td>[your_module]/tests/src/Unit</td>
    <td>Drupal\\Tests\\[your_module]\\Unit\\</td>
    <td>Drupal\\Tests\\UnitTestCase</td>
  </tr>
  <tr>
    <td>Kernel test</td>
    <td>[your_module]/tests/src/Kernel</td>
    <td>Drupal\\Tests\\[your_module]\\Kernel\\</td>
    <td>Drupal\\KernelTests\\KernelTestBase</td>
  </tr>
  <tr>
    <td>Functional test</td>
    <td>[your_module]/tests/src/Functional</td>
    <td>Drupal\\Tests\\[your_module]\\Functional\\</td>
    <td>Drupal\\Tests\\BrowserTestBase</td>
  </tr>
  <tr>
    <td>FunctionalJavascript test</td>
    <td>[your_module]/tests/src/FunctionalJavascript</td>
    <td>Drupal\\Tests\\[your_module]\\FunctionalJavascript\\</td>
    <td>Drupal\\FunctionalJavascriptTests\\WebDriverTestBase</td>
  </tr>
  <tr>
    <td>Shared test traits</td>
    <td>[your_module]/tests/src/Traits</td>
    <td>Drupal\\Tests\\[your_module]\\Traits\\</td>
    <td>n/a</td>
  </tr>

  </tbody>
</table>

<h3>Standard PHPUnit Practices</h3>
<p>You can run PHPUnit from the command line or via the run-tests.sh command.</p>
<p>You can specify which type of test you're running via
  <pre><code>phpunit --testsuite</code></pre> and
  <pre><code>run-tests.sh --types</code><pre>.
<p>There are many options to phpunit, but, for instance, to run all of the
  testing_example phpunit tests, you could
<pre><code>./vendor/phpunit/phpunit/phpunit -c core/ ./modules/examples/testing_example</code></pre>
</p>", array("@sum_in_hands" =>         // line 12
($context["sum_in_hands"] ?? null), ));
    }

    public function getTemplateName()
    {
        return "__string_template__cf22c44e835d99eeac27adc0e946b2f2";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 12,  47 => 9,  44 => 8,  42 => 7,  39 => 6,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__cf22c44e835d99eeac27adc0e946b2f2", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 7, "trans" => 9);
        static $filters = array("escape" => 12);
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

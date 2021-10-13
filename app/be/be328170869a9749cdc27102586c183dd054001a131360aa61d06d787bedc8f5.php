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

/* tasks.view.twig */
class __TwigTemplate_74840f75635ef7ce5cbd59d3ca70e74ead5b744b90e67e6437b2a173c094c3a1 extends Template
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
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<?php
require_once \"header.view.php\";
?>
<?php require_once \"logedperson.view.php\"; ?>

<div class=\"container text-center\">
    <h1>My Tasks</h1><br>
</div>
<div class=\"container text-center \">
    <form action=\"\" method=\"post\">
        <label for=\"number\">Task number:</label>
        <input type=\"text\" id=\"number\" name=\"number\">
        <label for=\"description\">Task description:</label>
        <input type=\"text\" id=\"description\" name=\"description\">
        <input type=\"submit\" id=\"submit\" name=\"submit\" value=\"Add New\"><br><br>
    </form>
</div>
<div class=\"container text-center\">
    <form action=\"/tasks/searchResults\">
        <label for=\"number\">Search task by number:</label>
        <input type=\"text\" id=\"number\" name=\"numberSearch\">
        <input type=\"submit\" id=\"search\" name=\"search\" value=\"Search\">
    </form>
</div>
<br><br>
<table class=\"table container\">
    <thead class=\"table-dark\">
    <tr>
        <th scope=\"col\">ID</th>
        <th scope=\"col\">Description</th>
    </tr>
    </thead>
    <tbody>

        ";
        // line 35
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["tasks"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["task"]) {
            // line 36
            echo "        <tr>
            <th scope=\"row\">";
            // line 37
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "getNumber", [], "any", false, false, false, 37), "html", null, true);
            echo "</th>
            <td>";
            // line 38
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["task"], "getDescription", [], "any", false, false, false, 38), "html", null, true);
            echo "</td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['task'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 41
        echo "
    </tbody>

</table>

<?php
require_once \"footer.view.php\";
?>
";
    }

    public function getTemplateName()
    {
        return "tasks.view.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 41,  84 => 38,  80 => 37,  77 => 36,  73 => 35,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tasks.view.twig", "/Users/elinapulke/PhpstormProjects/toDoApp/app/Views/tasks.view.twig");
    }
}

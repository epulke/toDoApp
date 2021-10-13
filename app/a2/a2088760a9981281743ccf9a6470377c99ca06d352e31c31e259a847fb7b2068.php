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
class __TwigTemplate_d80bbd4a1d18007be0aa88ab5ab324e88b6f62b5ebcd8f38c73ba01bd6c15dbb extends Template
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
        <?php foreach(\$tasks->getTasks() as \$task): ?>
        <tr>
            <th scope=\"row\"><?= \$task->getNumber(); ?></th>
            <td><?= \$task->getDescription(); ?></td>
        </tr>
        <?php endforeach;?>
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

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "tasks.view.twig", "/Users/elinapulke/PhpstormProjects/toDoApp/app/Views/tasks.view.twig");
    }
}

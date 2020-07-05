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

/* base.html.twig */
class __TwigTemplate_89d8bb8bf8fb174d558fdba74e36db4a32256420ea49f95510adcb801a06bb94 extends Template
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
        echo "<!DOCTYPE html>
<html>
\t<head>
\t\t<meta charset=\"UTF-8\">
\t\t<title>
\t\t\tCaravane
\t\t</title>
\t\t<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui\">
\t\t<link href=\"https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900\" rel=\"stylesheet\">
\t\t<link href=\"https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css\" rel=\"stylesheet\">
\t\t<link rel=\"stylesheet\" href=\"https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp\"/>
\t\t";
        // line 12
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackLinkTags("app");
        echo "
\t</head>
\t<body>
\t\t<div id=\"app\"></div>
\t\t";
        // line 16
        echo $this->extensions['Symfony\WebpackEncoreBundle\Twig\EntryFilesTwigExtension']->renderWebpackScriptTags("app");
        echo "
\t</body>
</html>
";
    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  57 => 16,  50 => 12,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "base.html.twig", "/home/eldji/caravane/templates/base.html.twig");
    }
}

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

/* user/signup.html.twig */
class __TwigTemplate_8824cd1b92d79286db809bc777c7a8c1676709070b929c52a98e039d9a853a6f extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "user/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("user/layout.html.twig", "user/signup.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 4
        echo "\t<p>Bonjour
\t\t";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "name", [], "any", false, false, false, 5), "html", null, true);
        echo ",</p>
\t<p>Voici vos accès sur CARAVANE</p>
\t<p>Pour vous connectez veuillez cliquez sur ce lien</p>

\t<table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"btn btn-primary\">
\t\t<tbody>
\t\t\t<tr>
\t\t\t\t<td align=\"left\">
\t\t\t\t\t<table role=\"presentation\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">
\t\t\t\t\t\t<tbody>
\t\t\t\t\t\t\t<tr>
\t\t\t\t\t\t\t\t<td>
\t\t\t\t\t\t\t\t\t<a href=\"";
        // line 17
        echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
        echo "\" target=\"_blank\">";
        echo twig_escape_filter($this->env, ($context["url"] ?? null), "html", null, true);
        echo "</a>
\t\t\t\t\t\t\t\t</td>
\t\t\t\t\t\t\t</tr>
\t\t\t\t\t\t</tbody>
\t\t\t\t\t</table>
\t\t\t\t</td>
\t\t\t</tr>
\t\t</tbody>
\t</table>
\t<p>Username: ";
        // line 26
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["user"] ?? null), "email", [], "any", false, false, false, 26), "html", null, true);
        echo "</p>
\t<p>Mot de passe: ";
        // line 27
        echo twig_escape_filter($this->env, ($context["password"] ?? null), "html", null, true);
        echo "</p>
\t<p>Merci!</p>
";
    }

    public function getTemplateName()
    {
        return "user/signup.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  86 => 27,  82 => 26,  68 => 17,  53 => 5,  50 => 4,  46 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "user/signup.html.twig", "/home/eldji/caravane/templates/user/signup.html.twig");
    }
}

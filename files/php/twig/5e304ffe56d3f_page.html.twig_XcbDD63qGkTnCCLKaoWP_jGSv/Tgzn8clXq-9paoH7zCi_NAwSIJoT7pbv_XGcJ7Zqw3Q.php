<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* themes/custom/bbseg/templates/layout/page.html.twig */
class __TwigTemplate_95bf01149c54ea6dce4ff660974550bd629648b4a0ebedbb4eb0641c7b8db612 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["if" => 105];
        $filters = ["escape" => 50];
        $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

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

    protected function doDisplay(array $context, array $blocks = [])
    {
        // line 45
        echo "
<div class=\"main-wrapper\">

\t<header class=\"main-header\" role=\"header\">
\t\t<div class=\"container-header container\">
\t\t\t";
        // line 50
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "header", [])), "html", null, true);
        echo "

\t\t\t<a class=\"hamburguer\" href=\"#\" menu-open>
\t\t\t\t<span class=\"sr-only\">Open menu</span>
\t\t\t</a>
\t\t</div>

\t\t<div class=\"region region-full-menu\" id=\"fullMenu\">
\t\t\t<div class=\"close\" menu-close>
\t\t\t\t<span class=\"sr-only\">Close</span>
\t\t\t</div>

\t\t\t";
        // line 62
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "toolbar", [])), "html", null, true);
        echo "

\t\t\t";
        // line 64
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "menu", [])), "html", null, true);
        echo "
\t\t</div>
\t</header>

\t<a href=\"#\" class=\"hand\">
\t\t<span class=\"sr-only\">Lorem, ipsum.</span>
\t</a>

\t<main role=\"main\">
\t\t";
        // line 73
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "breadcrumb", [])), "html", null, true);
        echo "

\t\t<a id=\"main-content\" tabindex=\"-1\"></a>

\t\t<div id=\"fullpage\">
\t\t\t";
        // line 78
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "content", [])), "html", null, true);
        echo "

\t\t\t<div id=\"section-footer\" class=\"section\">
\t\t\t\t<section class=\"section-contact\">
\t\t\t\t\t<div class=\"image\">
\t\t\t\t\t\t<img src=\"/themes/custom/bbseg/images/img-contact.png\">
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"infos\">
\t\t\t\t\t\t<h2 class=\"title\">Fale com a gente.</h2>
\t\t\t\t\t\t<p class=\"sub-title\">Sobre o que você quer falar?</p>
\t\t\t\t\t\t<ul class=\"menu\">
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a class=\"link-seguros\" href=\"#\">Seguros</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a class=\"link-previdencia\" href=\"#\">Previdência</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a class=\"link-capitalizacao\" href=\"#\">Capitalização</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t<a class=\"link-dental\" href=\"#\">Dental</a>
\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t</ul>
\t\t\t\t\t</div>
\t\t\t\t</section>

\t\t\t\t";
        // line 105
        if ($this->getAttribute(($context["page"] ?? null), "footer", [])) {
            // line 106
            echo "\t\t\t\t\t<footer class=\"main-footer\" role=\"contentinfo\">
\t\t\t\t\t\t";
            // line 107
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute(($context["page"] ?? null), "footer", [])), "html", null, true);
            echo "

\t\t\t\t\t\t<div class=\"container\">
\t\t\t\t\t\t\t<div class=\"col col-logo\">
\t\t\t\t\t\t\t\t<a href=\"/\" title=\"Home\" rel=\"home\" class=\"site-logo\">
\t\t\t\t\t\t\t\t\t<img src=\"/themes/custom/bbseg/images/logo.png\" alt=\"Home\">
\t\t\t\t\t\t\t\t</a>

\t\t\t\t\t\t\t\t<p class=\"text-tel\">
\t\t\t\t\t\t\t\t\tCentral de atendimento BB<br/>
\t\t\t\t\t\t\t\t\t<span class=\"big\">0800 131 500</span><br/>
\t\t\t\t\t\t\t\t\t<span class=\"small\">Seg a sexta das 8:00 as 18:00</span>
\t\t\t\t\t\t\t\t</p>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"col col-menu\">
\t\t\t\t\t\t\t\t<ul class=\"accordion-mob\">
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<strong>Seguros</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Para você</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Para seu negócio</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Serviços</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Sinistro</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"col col-menu\">
\t\t\t\t\t\t\t\t<ul class=\"accordion-mob\">
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<strong>Previdência</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Rentabilidade</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Simulador IR</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t<ul class=\"accordion-mob\">
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<strong>Quem somos</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Trabalhe conosco</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"col col-menu\">
\t\t\t\t\t\t\t\t<ul class=\"accordion-mob\">
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<strong>Capitalização</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Simulador</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Sorteios</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"col col-menu\">
\t\t\t\t\t\t\t\t<ul class=\"accordion-mob\">
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<strong>Dental</strong>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Para você</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Para sua empresa</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t\t<li>
\t\t\t\t\t\t\t\t\t\t<a href=\"#\">Rede credenciada</a>
\t\t\t\t\t\t\t\t\t</li>
\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t<div class=\"col col-infos\">
\t\t\t\t\t\t\t\t<p class=\"text-tel\">
\t\t\t\t\t\t\t\t\tCentral de atendimento BB<br/>
\t\t\t\t\t\t\t\t\t<span class=\"big\">0800 131 500</span><br/>
\t\t\t\t\t\t\t\t\t<span class=\"small\">Seg a sexta das 8:00 as 18:00</span>
\t\t\t\t\t\t\t\t</p>

\t\t\t\t\t\t\t\t<div class=\"socials\">
\t\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t\t<li><a class=\"facebook\" href=\"#\"><span class=\"sr-only\">Facebook</span></a></li>
\t\t\t\t\t\t\t\t\t\t<li><a class=\"twitter\" href=\"#\"><span class=\"sr-only\">Twitter</span></a></li>
\t\t\t\t\t\t\t\t\t\t<li><a class=\"instagram\" href=\"#\"><span class=\"sr-only\">Instagram</span></a></li>
\t\t\t\t\t\t\t\t\t\t<li><a class=\"youtube\" href=\"#\"><span class=\"sr-only\">Youtube</span></a></li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</div>

\t\t\t\t\t\t\t\t<div class=\"apps\">
\t\t\t\t\t\t\t\t\t<ul>
\t\t\t\t\t\t\t\t\t\t<li><a class=\"google-play\" href=\"#\"><span class=\"sr-only\">Disponível no Google Play</span></a></li>
\t\t\t\t\t\t\t\t\t\t<li><a class=\"app-store\" href=\"#\"><span class=\"sr-only\">Baixar na App Store</span></a></li>
\t\t\t\t\t\t\t\t\t</ul>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</footer>
\t\t\t</div>
\t\t</div>
\t</main>
";
        }
        // line 225
        echo "<div class=\"loading\">
\t<div class=\"animate\">
\t\t<div></div>
\t\t<div></div>
\t\t<div></div>
\t\t<div></div>
\t\t<div></div>
\t\t<div></div>
\t\t<div></div>
\t\t<div></div>
\t</div>
</div></div>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/bbseg/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  258 => 225,  137 => 107,  134 => 106,  132 => 105,  102 => 78,  94 => 73,  82 => 64,  77 => 62,  62 => 50,  55 => 45,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/bbseg/templates/layout/page.html.twig", "/app/www/docroot/themes/custom/bbseg/templates/layout/page.html.twig");
    }
}

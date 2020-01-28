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

/* themes/custom/bbseg/templates/block/block--sectionhomedental.html.twig */
class __TwigTemplate_bdc270176df066a16ad9d22a58756727059ec01f736432bd669cd263146714e7 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["set" => 29, "if" => 39];
        $filters = ["clean_class" => 31, "escape" => 36];
        $functions = ["file_url" => 67];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape'],
                ['file_url']
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
        // line 29
        $context["classes"] = [0 => "block", 1 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed($this->getAttribute(        // line 31
($context["configuration"] ?? null), "provider", [])))), 2 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 32
($context["plugin_id"] ?? null))))];
        // line 35
        echo "
<section class=\"section section-home\" id=\"";
        // line 36
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["content"] ?? null), "field_class", []), 0, [], "array")), "html", null, true);
        echo "\">
\t<div class=\"container\">
\t\t<div class=\"text\">
\t\t\t";
        // line 39
        if ($this->getAttribute($this->getAttribute(($context["content"] ?? null), "field_tag", []), 0, [], "array")) {
            // line 40
            echo "\t\t\t\t<h3 class=\"tag\">
\t\t\t\t\t";
            // line 41
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["content"] ?? null), "field_tag", []), 0, [], "array")), "html", null, true);
            echo "
\t\t\t\t</h3>
\t\t\t";
        }
        // line 44
        echo "
\t\t\t";
        // line 45
        if ($this->getAttribute($this->getAttribute(($context["content"] ?? null), "field_title2", []), 0, [], "array")) {
            // line 46
            echo "\t\t\t\t<h2 class=\"title\">
\t\t\t\t\t";
            // line 47
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["content"] ?? null), "field_title2", []), 0, [], "array")), "html", null, true);
            echo "
\t\t\t\t</h2>
\t\t\t";
        }
        // line 50
        echo "
\t\t\t";
        // line 51
        if ($this->getAttribute($this->getAttribute(($context["content"] ?? null), "field_text", []), 0, [], "array")) {
            // line 52
            echo "\t\t\t\t<p class=\"description\">
\t\t\t\t\t";
            // line 53
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute(($context["content"] ?? null), "field_text", []), 0, [], "array")), "html", null, true);
            echo "
\t\t\t\t</p>
\t\t\t";
        }
        // line 56
        echo "
\t\t\t";
        // line 57
        if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["content"] ?? null), "field_b", []), 0, []), "#url", [], "array")) {
            // line 58
            echo "\t\t\t\t<a class=\"btn-big\" href=\"";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute(($context["content"] ?? null), "field_b", []), 0, []), "#url", [], "array")), "html", null, true);
            echo "\">
\t\t\t\t\t";
            // line 59
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute(($context["content"] ?? null), "field_b", []), 0, []), "#title", [], "array")), "html", null, true);
            echo "
\t\t\t\t</a>
\t\t\t";
        }
        // line 62
        echo "\t\t</div>
\t</div>

\t<div class=\"image\">
\t\t<picture>
\t\t\t<source srcset=\"";
        // line 67
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["content"] ?? null), "field_image_mobile", []), 0, []), "#item", [], "array"), "entity", []), "uri", []), "value", []))]), "html", null, true);
        echo "\" media=\"(max-width: 750px)\">
\t\t\t<img src=\"";
        // line 68
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["content"] ?? null), "field_image_desktop", []), 0, []), "#item", [], "array"), "entity", []), "uri", []), "value", []))]), "html", null, true);
        echo "\">
\t\t</picture>
\t</div>
</section>
";
    }

    public function getTemplateName()
    {
        return "themes/custom/bbseg/templates/block/block--sectionhomedental.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  134 => 68,  130 => 67,  123 => 62,  117 => 59,  112 => 58,  110 => 57,  107 => 56,  101 => 53,  98 => 52,  96 => 51,  93 => 50,  87 => 47,  84 => 46,  82 => 45,  79 => 44,  73 => 41,  70 => 40,  68 => 39,  62 => 36,  59 => 35,  57 => 32,  56 => 31,  55 => 29,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "themes/custom/bbseg/templates/block/block--sectionhomedental.html.twig", "/app/www/docroot/themes/custom/bbseg/templates/block/block--sectionhomedental.html.twig");
    }
}

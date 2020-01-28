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

/* modules/contrib/webform/templates/webform-progress-tracker.html.twig */
class __TwigTemplate_d1ef42637bc853078aa439bd72d0b01925f6dd79bfb28f88f115826a902b8d84 extends \Twig\Template
{
    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $tags = ["for" => 23, "set" => 24, "if" => 35];
        $filters = ["escape" => 20, "length" => 35, "t" => 39];
        $functions = ["attach_library" => 20];

        try {
            $this->sandbox->checkSecurity(
                ['for', 'set', 'if'],
                ['escape', 'length', 't'],
                ['attach_library']
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
        // line 20
        echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->env->getExtension('Drupal\Core\Template\TwigExtension')->attachLibrary("webform/webform.progress.tracker"), "html", null, true);
        echo "

<ul class=\"webform-progress-tracker progress-tracker progress-tracker--center\">
  ";
        // line 23
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["progress"] ?? null));
        foreach ($context['_seq'] as $context["index"] => $context["page"]) {
            // line 24
            echo "    ";
            $context["is_completed"] = ($context["index"] < ($context["current_index"] ?? null));
            // line 25
            echo "    ";
            $context["is_active"] = ($context["index"] == ($context["current_index"] ?? null));
            // line 26
            echo "    ";
            // line 27
            $context["classes"] = [0 => "progress-step", 1 => ((            // line 29
($context["is_completed"] ?? null)) ? ("is-complete") : ("")), 2 => ((            // line 30
($context["is_active"] ?? null)) ? ("is-active") : (""))];
            // line 33
            echo "    <li";
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["attributes"] ?? null), "setAttribute", [0 => "data-webform-page", 1 => $this->getAttribute($context["page"], "name", [])], "method"), "setAttribute", [0 => "title", 1 => $this->getAttribute($context["page"], "title", [])], "method"), "setAttribute", [0 => "class", 1 => ""], "method"), "addClass", [0 => ($context["classes"] ?? null)], "method")), "html", null, true);
            echo ">
      <span class=\"progress-marker\">";
            // line 34
            echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, ($context["index"] + 1), "html", null, true);
            echo "</span>
      ";
            // line 35
            if ((twig_length_filter($this->env, ($context["progress"] ?? null)) < ($context["max_pages"] ?? null))) {
                // line 36
                echo "        <span class=\"progress-text\">
          <span class=\"progress-title\">
            ";
                // line 38
                if ((($context["is_active"] ?? null) || ($context["is_completed"] ?? null))) {
                    // line 39
                    echo "              <span class=\"visually-hidden\">";
                    echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(((($context["is_active"] ?? null)) ? (t("Current")) : (t("Completed"))));
                    echo ": </span>
            ";
                }
                // line 41
                echo "            ";
                echo $this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($this->getAttribute($context["page"], "title", [])), "html", null, true);
                echo "
          </span>
        </span>
      ";
            }
            // line 45
            echo "    </li>
  ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['index'], $context['page'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 47
        echo "</ul>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/webform/templates/webform-progress-tracker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  115 => 47,  108 => 45,  100 => 41,  94 => 39,  92 => 38,  88 => 36,  86 => 35,  82 => 34,  77 => 33,  75 => 30,  74 => 29,  73 => 27,  71 => 26,  68 => 25,  65 => 24,  61 => 23,  55 => 20,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/webform/templates/webform-progress-tracker.html.twig", "/app/www/docroot/modules/contrib/webform/templates/webform-progress-tracker.html.twig");
    }
}

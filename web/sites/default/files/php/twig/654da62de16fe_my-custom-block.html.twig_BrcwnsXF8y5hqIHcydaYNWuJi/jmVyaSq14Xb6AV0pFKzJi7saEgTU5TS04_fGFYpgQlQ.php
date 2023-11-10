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

/* modules/custom/speaker/templates/my-custom-block.html.twig */
class __TwigTemplate_2bf280612dcf1ddae67239cec6b6c117 extends Template
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
        // line 1
        echo "<div class=\"custom-block\">
  <h2>";
        // line 2
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["random_entity"] ?? null), "label", [], "any", false, false, true, 2), 2, $this->source), "html", null, true);
        echo "</h2>

  <div class=\"circular-thumbnail\">
  ";
        // line 5
        if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["random_entity"] ?? null), "portrait", [], "any", false, false, true, 5))) {
            // line 6
            echo "    <img src=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, Drupal\twig_tweak\TwigTweakExtension::imageStyleFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["random_entity"] ?? null), "portrait", [], "any", false, false, true, 6), 0, [], "any", false, false, true, 6), "entity", [], "any", false, false, true, 6), "uri", [], "any", false, false, true, 6), "value", [], "any", false, false, true, 6), 6, $this->source), "circular_thumbnail"), "html", null, true);
            echo "\" alt=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["random_entity"] ?? null), "portrait", [], "any", false, false, true, 6), 0, [], "any", false, false, true, 6), "alt", [], "any", false, false, true, 6), 6, $this->source), "html", null, true);
            echo "\">
  ";
        }
        // line 8
        echo "  </div>

  ";
        // line 10
        if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["random_entity"] ?? null), "name", [], "any", false, false, true, 10))) {
            // line 11
            echo "    <p>Name: ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["random_entity"] ?? null), "name", [], "any", false, false, true, 11), 0, [], "any", false, false, true, 11), "value", [], "any", false, false, true, 11), 11, $this->source), "html", null, true);
            echo "</p>
  ";
        }
        // line 13
        echo "
  ";
        // line 14
        if (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["random_entity"] ?? null), "topics_of_expertise", [], "any", false, false, true, 14))) {
            // line 15
            echo "    <p>Term: ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["random_entity"] ?? null), "topics_of_expertise", [], "any", false, false, true, 15), 0, [], "any", false, false, true, 15), "entity", [], "any", false, false, true, 15), "name", [], "any", false, false, true, 15), "value", [], "any", false, false, true, 15), 15, $this->source), "html", null, true);
            echo "</p>
  ";
        }
        // line 17
        echo "</div>";
    }

    public function getTemplateName()
    {
        return "modules/custom/speaker/templates/my-custom-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  81 => 17,  75 => 15,  73 => 14,  70 => 13,  64 => 11,  62 => 10,  58 => 8,  50 => 6,  48 => 5,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/custom/speaker/templates/my-custom-block.html.twig", "/opt/lampp/htdocs/speaker/web/modules/custom/speaker/templates/my-custom-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 5);
        static $filters = array("escape" => 2, "length" => 5, "image_style" => 6);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'length', 'image_style'],
                []
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

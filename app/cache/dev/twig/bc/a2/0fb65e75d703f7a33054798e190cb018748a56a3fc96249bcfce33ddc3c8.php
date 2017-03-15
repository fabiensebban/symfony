<?php

/* SdzBlogBundle:Blog:ajouter.html.twig */
class __TwigTemplate_bca20fb65e75d703f7a33054798e190cb018748a56a3fc96249bcfce33ddc3c8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("SdzBlogBundle::layout.html.twig");

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sdzblog_body' => array($this, 'block_sdzblog_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SdzBlogBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_title($context, array $blocks = array())
    {
        echo " Ajouter un article - ";
        $this->displayParentBlock("title", $context, $blocks);
        echo " ";
    }

    // line 5
    public function block_sdzblog_body($context, array $blocks = array())
    {
        // line 6
        echo "
    <h2>Ajouter un article</h2>

    ";
        // line 9
        $this->env->loadTemplate("SdzBlogBundle:Blog:formulaire.html.twig")->display($context);
        // line 10
        echo "
    <p>
        Vous créez un nouvelle article.
    </p>

    <p>
        <a href=\"\" class=\"btn\">
            <i class=\"icon-inbox\"></i>
            Sauvegarder
        </a>
    </p>

";
    }

    public function getTemplateName()
    {
        return "SdzBlogBundle:Blog:ajouter.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 10,  45 => 9,  40 => 6,  37 => 5,  29 => 3,);
    }
}

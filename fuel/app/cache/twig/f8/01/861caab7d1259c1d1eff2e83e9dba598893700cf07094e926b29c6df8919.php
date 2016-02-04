<?php

/* index.twig */
class __TwigTemplate_f801861caab7d1259c1d1eff2e83e9dba598893700cf07094e926b29c6df8919 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<p> ";
        echo Html::anchor("admin/customers/create", "New Customer", array("class" => "btn btn-success"));
        echo " </p>

";
        // line 3
        if ((twig_length_filter($this->env, (isset($context["customers"]) ? $context["customers"] : null)) > 0)) {
            // line 4
            echo "    ";
            echo $this->getAttribute((isset($context["pagination"]) ? $context["pagination"] : null), "render");
            echo "
    
        <table class=\"table table-striped\">
            <thead>
                    <tr>
                            <th>Description</th>
                            <th>Contact person</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th style=\"width: 150px;\"></th>
                    </tr>
            </thead>
            <tbody>
            ";
            // line 17
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable((isset($context["customers"]) ? $context["customers"] : null));
            foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
                echo "\t\t
                    <tr>
                            <td>";
                // line 19
                echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "description");
                echo " </td>
                            <td> ";
                // line 20
                echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "contact_person");
                echo " </td>
                            <td> ";
                // line 21
                echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "phone");
                echo " </td>
                            <td> ";
                // line 22
                echo $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "email");
                echo " </td>
                            <td nowrap>
                                   ";
                // line 24
                echo Html::anchor(("admin/customers/view/" . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id")), "View");
                echo " |
                                   ";
                // line 25
                echo Html::anchor(("admin/customers/edit/" . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id")), "Edit");
                echo " |
                                   ";
                // line 26
                echo Html::anchor(("admin/customers/delete/" . $this->getAttribute((isset($context["item"]) ? $context["item"] : null), "id")), "Delete", array("onclick" => "return confirm(\"Are you sure?\")"));
                echo "

                            </td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 30
            echo "\t
        </tbody>
    </table>    
";
        } else {
            // line 34
            echo "    <p>No Customers.</p>
";
        }
    }

    public function getTemplateName()
    {
        return "index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 34,  87 => 30,  76 => 26,  72 => 25,  68 => 24,  63 => 22,  59 => 21,  55 => 20,  51 => 19,  44 => 17,  27 => 4,  25 => 3,  19 => 1,);
    }
}

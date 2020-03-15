<?php


class Affichage
{
    public static function afficherCleEtrangeres(array $tableau, string $selectName = "0", string $placeholder = null)
    {
        echo "<select name=\"$selectName\">";

        if ($placeholder) {
            echo "<option value=\"\" disabled selected>" . $placeholder . "</option>";
        }

        foreach ($tableau as $lignes) {
            foreach ($lignes as $valeurDelaColonne) {
                echo "<option value=\"$valeurDelaColonne\">$valeurDelaColonne</option>";
            }
        }
        echo "</select>";
    }
}


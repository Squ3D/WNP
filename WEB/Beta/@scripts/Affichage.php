

<?php


class Affichage
{
    public static function afficherCleEtrangeres(array $tableau, string $selectName = "0")
    {
        echo "<select name=\"$selectName\">";
        foreach ($tableau as $lignes) {
            foreach ($lignes as $valeurDelaColonne) {
                echo"< <option value=\"\">Numéro matricule</option>";
                echo "<option value=\"$valeurDelaColonne\">$valeurDelaColonne</option>";
            }
        }
        echo "</select>";
    }
}
?>






const valeur = prompt("Entrer votre prenom")
alert("bonjour" + valeur);

console.log("bonjour en java");

let a = 3.14;
console.log(a);

const a = 3.14; //creer une contante
a = 6.14 // impossible on ne peut pas changer une constante

let num1 = 0; {
    num1 = 1; // OK : num1 est déclarée dans le bloc parent
    const num2 = 0;
}
console.log(num1); // 1
console.log(num2); // Erreur : num2 n'est pas visible ici !
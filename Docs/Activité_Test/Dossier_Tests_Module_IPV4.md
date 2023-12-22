<table>
<tr> <td> Dossier de test</td> <td> Version: 1.0</td> </tr>
<tr> <td> Responsable de la rédaction : Hugo Verneuil </td> <td> Date : 19/12/2023 </td> </tr>
</table>
<h3 align="center"  ><strong> Dossier de Test module IPv4 </strong></h3>

<h3> Introduction </h3>

Rappel des objectifs du module IPV4 : 

"The module will offer one or more forms which enable the user to obtain the division into logical subnetworks
from a given IP address and a mask written with CIDR notation." - Tiré des consignes données dans le document <a href="./saebut3fa-vo.pdf">saebut3fa-vo.pdf</a> section "2.3 module 3 : ipv4" ligne 1 à 2.

Les objectifs du module peuvent donc être résumés ainsi, donné une adresse IP valide, son mask et un nombre de sous réseau souhaité avec leur taille respective, le module se doit de :

<ul> 
<li> Calculer l'adresse de chaque sous réseau</li> 
<li> Calculer le masque de chaque sous réseau (au format IP et CIDR) </li>
<li> Calculer la plage d'adresse attribuée à chaque sous réseau </li>
<li> Calculer l'adresse de broadcast attribuée à chaque sous réseau </li>
</ul>
Pour ce faire, le module possède 3 fonctions chargées d'accomplir un ou plusieurs des objectifs cités plus haut :
<ul> 
<li> La fonction "taille_mask_sous_res" charger de calculer la taille réelle et le masque CDRI de chaque sous réseau</li> 
<li> La fonction "mask_cdri_vers_dec" charger de convertir le masque de chaque sous réseau au format IP </li>
<li> La fonction "addr_broad_plage_sous_res" charger de calculer l'adresse, l'adresse de broadcast et la plage d'adresse attribuées à chaque sous réseau  </li>
</ul>


Ce document a pour objectif de présenter la conception et la réalisation des tests effectués sur ces différentes fonctions ainsi que leurs résultats.

<h3> Environnement de test </h3>

L'ensemble des tests sont exécutés sur phpstorm qui est également la plateforme utilisée pour la réalisation des fonctions testées. <br>
Pour la réalisation de ces tests, nous utilisons le framework PHPUnit, un framework spécialisé dans l'activité de test de fonctions php.

<h3> Stratégie de tests </h3>

Pour la réalisation de ces tests, nous avons choisi de réaliser des tests dits boîtes noires.
Ces tests ont pour objectifs de vérifier que selon une entrée donnée, le résultat sorti par la fonction corresponde aux attentes.
Pour concevoir ces tests, nous utilisons la méthodologie de partition d'équivalence.
Le but est de partitionner l'entrée des tests pour minimiser les tests à réaliser tout en couvrant au maximum les possibilités d'entrée.

<h3>Descriptions des Tests</h3>

<h4>1. Campagne de test</h4>

<table>
<tr> <td colspan="2"> Produit testé : Module IPV4 </td> </tr>
<tr> <td colspan="2"> Configuration logicielle : Conteneur Docker </td> </tr>
<tr> <td colspan="2"> Configuration matérielle : / </td> </tr>
<tr> <td> Date de début : 19/12/2023 </td> <td> Date de finalisation : 22/12/2023 </td> </tr>
<tr> <td colspan="2"> Tests à appliquer : liste de références aux descriptions des tests </td> </tr>
<tr> <td colspan="2"> Responsable de la campagne de test : Hugo Verneuil </td> </tr>
</table>

<h4>2. Tests</h4>

<table>
<tr> <td colspan="3"> Identification du test : test fonction "taille_mask_sous_res" </td> <td colspan="2"> Version : 1.0 </td> </tr>
<tr> <td colspan="5"> Description du test : test de l'algorithme de calcul de la taille et du masque alloué à chaque sous réseaux - fonction "taille_mask_sous_res", par la méthode 
de partition d'équivalence. Soit A l'ensemble des entiers positifs supérieur à 0 (A = ]0;+∞[), B l'ensemble des puissances de 2 jusqu'à la 24ème puissance (B = [2**1;2**2;...;2**24]), soit C l'ensemble des entiers allant de 1 à 32 (C = [1;2;3;...;32]) et soit B1 définit par B1 = B - 2 (B1 = [(2**1)-2;(2**2)-2;...;(2**24)-2]).</td> </tr>
<tr> <td colspan="5"> Ressources requises : / </td> </tr>
<tr> <td colspan="5"> Responsable : Hugo Verneuil</td> </tr>
<tr><th>Classe</th><th>Acteur 1 (taille_souhaite)</th><th>Résultat attendu 1 (taille_alloue)</th><th>Résultat attendu 2 (masque)</th><th>Résultat obtenus</th></tr>
<tr><td>P1</td><td>taille_souhaite ∈ A, taille_souhaite <= (2**24)-2</td><td>taille_alloue ∈ A, taille_alloue >= taille_souhaite, taille_alloue <= (2**24)-2</td><td>masque ∈ C, masque = 32 - fraction_arrondie_supérieur(log(2**taille_alloue)) </td><td>OK</td></tr>
<tr><td>P2</td><td>taille_souhaite ∈ A, taille_souhaite > (2**24)-2</td><td>taille_souhaite ∈ A, taille_alloue = 2**25</td><td>masque = 0</td><td>OK</td></tr>
</table>
<br>
<table>
<tr> <td colspan="3"> Identification du test : test fonction "mask_cdri_vers_dec" </td> <td colspan="2"> Version : 1.0 </td> </tr>
<tr> <td colspan="4"> Description du test : test de l'algorithme de conversion masque CIDR vers masque décimaux - fonction "mask_cdri_vers_dec", par la méthode 
de partition d'équivalence. Soit A l'ensemble des entiers allant de 1 à 32 (A = [1;2;3;...;32]), soit B l'ensemble des chaînes de caractères et soit B1 l'ensemble des châines de caractères respectant le format : "((0|128|192|224|240|248|252|254|255)\.){3}(0|128|192|224|240|248|252|254|255)", c'est à dire l'ensemble des valeurs décimal possible d'un masque IPV4 sous forme de chaîne de cractères.  </td> </tr>
<tr> <td colspan="4"> Ressources requises : / </td> </tr>
<tr> <td colspan="4"> Responsable : Hugo Verneuil</td> </tr>
<tr><th>Classe</th><th>Acteur (mask_actuel)</th><th>Résultat attendu (mask_dec)</th><th>Résultat obtenus</th></tr>
<tr><td>P1</td><td>mask_actuel ∈ A</td><td>mask_dec ∈ B1 </td><td>OK</td></tr>
<tr><td>P2</td><td>mask_actuel ∉ A</td><td>mask_dec ∈ B, mask_dec = "-1"</td><td>OK</td></tr>
</table>
<br>
<table>
<tr> <td colspan="4"> Identification du test : test fonction "addr_broad_plage_sous_res" </td> <td colspan="3"> Version : 1.0 </td> </tr>
<tr> <td colspan="7"> Description du test : test de l'algorithme de calcul du broadcast et de la plage d'adresse de chaque sous réseaux - fonction "addr_broad_plage_sous_res", par la méthode 
de partition d'équivalence. Soit A l'ensemble des long integer résultant d'une conversion IP vers long, soit B l'ensemble des puissances de 2 jusqu'à la 24ème puissance (B = [2**1;2**2;...;2**24]) et soit B1 définit par B1 = B - 2 (B1 = [(2**1)-2;(2**2)-2;...;(2**24)-2]) et soit C l'ensemble des chaînes de caractères. </td> </tr>
<tr> <td colspan="7"> Ressources requises : / </td> </tr>
<tr> <td colspan="7"> Responsable : Hugo Verneuil</td> </tr>
<tr><th>Classe</th><th>Acteur 1 (addr)</th><th>Acteur 2 (taille_alloue)</th><th>Résultat attendu 1 (addr)</th><th>Résultat attendu 2 (Plage)</th><th>Résultat attendu 3 (broadcast)</th><th>Résultat obtenus</th></tr>
<tr><td>P1</td><td>addr ∈ A</td><td>taille_alloue ∈ B1</td><td>addr ∈ A</td><td>Plage ∈ C</td><td>broadcast ∈ A</td><td>OK</td></tr>
<tr><td>P2</td><td>addr ∉ A</td><td>taille_alloue ∉ B1</td><td>addr ∈ A</td><td>Plage ∈ C</td><td>broadcast ∈ A</td><td>OK</td></tr>
<tr><td>P3</td><td>addr ∉ A</td><td>taille_alloue ∈ B1</td><td>addr ∈ A</td><td>Plage ∈ C</td><td>broadcast ∈ A</td><td>OK</td></tr>
<tr><td>P4</td><td>addr ∈ A</td><td>taille_alloue ∉ B1</td><td>addr ∈ A</td><td>Plage ∈ C</td><td>broadcast ∈ A</td><td>OK</td></tr>
</table>
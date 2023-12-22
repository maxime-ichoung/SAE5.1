
<table>
<tr> <td> Dossier de test</td> <td> Version: 1.0</td></tr>
<tr> <td> Responsable de la rédaction : Pereira de Miranda Romain </td> <td> Date : 21/12/2023</td></tr>
</table>
<h3 align="center"  ><strong> Dossier de Test module IPv6 </strong></h3>

<h3> Introduction </h3>

Le module IPv6 est une des trois applications proposées sur notre site web. <br>
Ce module basé sur l'IPv6 se divise en 3 objectifs :
<ul> 
<li> Simplifier une IPv6</li> 
<li> Affichage en hexadecimal et binaire des deux octets significatifs</li>
<li> Donner le type de l'IP </li>
</ul>
 Ce document à pour objectifs de présenter les tests réaliser sur ces différents objectifs ainsi que la conception de ces mêmes tests.

<h3> Environnement de test </h3>

L'ensemble des tests sont éxécuté sur phpstorm qui est également la plateform utilisé pour la réalisation des fonctions testées. <br>
Pour la réalisation de ces tests, nous utilisons le framework PHPUnit, un framework spécialisé dans l'activité de test de fonction php.

<h3> Stratégie de tests </h3>

Pour la réalisation de ces tests, nous avons choisi de réaliser des tests dits boîtes noires.
Ces tests ont pour objectifs de vérifier que selon une entrée donnée, le résultat sorti par la fonction corresponde aux attentes.
Pour concevoir ces tests, nous utilisons la méthodologie de partition d'équivalence.
Le but est de partitionner l'entrée des tests pour minimiser les tests à réaliser tout en couvrant au maximum les possibilités d'entrée.


<br><br>
<h3> Simplification de l'IPv6 </h3>
<table>
<tr> <td colspan="4"> 
Description du test : Test de la fonction de simplification de l'IPv6 dans l'ensemble des 8*16o en hexadecimal de l'ip par la méthode de partition d'équivalence.
Soit A l'ensemble des notations de 8*2o en hexadecimal. Soit A1 l'ensemble des notations hexadecimal de 2o qui commence par n 0, 1 <= n <4. Soit A2 les notations hexadecimal de 2o de valeur 0. Soit A3 l'ensemble des notation hexadecimal de 2o restant. <br>
Soit B1 l'ensemble des notations simplifier d'un A2. Soit B2 la notation simplifier d'une suite de A2. Soit B3 la notation simplifier d'un A3 sans les n 0
</td>
</tr>
<tr> <td colspan="4"> Responsable : Pereira de Miranda Romain</td> </tr>
<tr> <td> Classe </td> <td> Acteur 1 (a) </td>  <td> Acteur 2 </td> <td> Résultat attendu (c) </td></tr>
<tr> <td> P1 </td> <td> a∈A2 </td> <td> b∈7A3 </td> <td> a &cup; b = c ∈ B1 &cup; 7A3 </td></tr>
<tr> <td> P2 </td> <td> a∈2A2 </td> <td> b∈6A3</td> <td> a &cup; b = c ∈ B2 &cup; 6A3 </td></tr>
<tr> <td> P3 </td> <td> a∈nA2 </td> <td> b∈8-nA3 </td> <td> a &cup; b = c ∈ B2 &cup; 8-nA3</td></tr>
<tr> <td> P4 </td> <td> a∈7A3 </td> <td> b∈A2 </td> <td> a &cup; b = c ∈ 7A3 &cup; B1</td></tr>
<tr> <td> P5 </td> <td> a∈6A3 </td> <td> b∈2A2 </td> <td> a &cup; b = c ∈ 6A3 &cup; B2</td></tr>
<tr> <td> P6 </td> <td> a∈8-nA3</td> <td> b∈nA2 </td> <td> a &cup; b = c ∈ 8-nA3 &cup ; B2</td></tr>
<tr> <td> P7 </td> <td colspan = 2 align="center"> a∈8A1 </td> <td> a = c ∈ 8B3 </td></tr>
<tr> <td> P8 </td> <td> a∈2A2</td> <td> b∈2A3</td> <td> a &cup; b &cup; a &cup; b = c ∈ B2 &cup; 2A3 &cup; 2B1 &cup; 2A3</td></tr>
<tr> <td> P9 </td> <td> a∈A1 </td> <td> b∈6A3</td> <td> a &cup; b &cup; a = c ∈ B1 &cup; 6A3 &cup; B1 </td></tr>
<tr> <td> P10 </td> <td> a∈A2 </td> <td> b∈5A3 </td> <td> 2a &cup; b &cup; a = c ∈ B2 &cup; 5A3 &cup; B1 </td> </tr>
</table>


<br><br>
<h3> Determination des 2 octets de poids fort d'une adresse IPv6 </h3>
<table>
<tr> <td colspan="4">
Description du test : Test de la fonction de determination des 2 octets de poids fort d'une adresse IPv6 par la méthode de partition d'équivalence.
Ici nous utiliserons que le debut de chaque ipv6 donc les 2 premiers octets. Nous ferons donc abstration des 14 octets suivant pour la déclaration des partitions d'équivalance.

Soit A l'ensemble des notations de 2 octets en hexadecimal.
Soit A1 l'ensemble des notations hexadecimal de 2 octets qui commence par n 0, 1 <= n < 4.
Soit A2 le notation hexadecimal de 2 octets de valeur 0.
Soit A3 l'ensemble des notation hexadecimal de 2 octets. <br>

Soit B l'ensemble des notations de 16 bits.
Soit B1 l'ensemble binaire composé de 16 bits valant 0. 
Soit B2 l'ensemble binaire commençant par n bits valant 0 et composé de 16 bits. 
Soit B3 l'ensemble binaire composé de 16 bits valant à 0 ou 1.
</td>
</tr>
<tr> <td colspan="4"> Responsable : Di Mascio Raphaël</td> </tr>
<tr> <td> Classe </td> <td> Acteur 1 (a) </td>  <td> Acteur 2 </td> <td> Résultat attendu (c) </td></tr>
<tr> <td> P1 </td> <td colspan = 2 align="center"> a ∈ 8A3 </td> <td> a = c ∈ B3 </td></tr>
<tr> <td> P2 </td> <td> a ∈ A1 </td> <td> b ∈ 7A3 </td> <td> a &cup; b = c ∈ B1 &cup; B2 </td></tr>
<tr> <td> P3 </td> <td> a ∈ A2 </td> <td> b ∈ 7A3</td> <td> a &cup; b = c ∈ B2 &cup; B1 </td></tr>
</table>



<br><br>
<h3> Determination du type d'une adresse IPv6 </h3>
<table>
<tr> <td colspan="4">
Description du test : Test de la fonction de determination du type d'une adresse IPv6 par la méthode de partition d'équivalence.
Ici nous utiliserons que le debut de chaque ipv6 donc les 2 premiers octets. Nous ferons donc abstration des 14 octets suivant pour la déclaration des partitions d'équivalance.

Soit A l'ensemble des notations de 2 octets en hexadecimal.
Soit A1 l'ensemble des notations hexadecimal de 16 octets correspondant à une adresse ipv6 commençant par fe80 .
Soit A2 l'ensemble des notations hexadecimal 16 octets correspondant à une adresse ipv6 commençant par ff00 .
Soit A3 une notation hexadecimal de 16 octets correspondant à une adresse ipv6 égale à 0000:0000:0000:0000:0000:0000:0000:0001 .
Soit A4 une notation hexadecimal de 16 octets correspondant à une adresse ipv6 égale à 0000:0000:0000:0000:0000:0000:0000:0000 .
Soit A5 l'ensemble des notation hexadecimal de 16 octets correspondant à une adresse ipv6 et différente de A3 et A4. <br>

Soit B l'ensemble des types d'adresse IPV6.
Soit B1 une adresse IPV6 de type Adresse local du lien.
Soit B2 une adresse IPV6 de type Multicast.
Soit B3 une adresse IPV6 de type Adresse de bouclage.
Soit B4 une adresse IPV6 de type Adresse non spécifiée.
Soit B5 une adresse IPV6 de type Unicast.
</td>
</tr>
<tr> <td colspan="4"> Responsable : Di Mascio Raphaël</td> </tr>
<tr> <td> Classe </td> <td> Acteur 1 (a) </td> <td> Résultat attendu (c) </td></tr>
<tr> <td> P1 </td> <td> a ∈ A1 </td> <td> a = c ∈ B1 </td></tr>
<tr> <td> P2 </td> <td> a ∈ A2 </td> <td> a = c ∈ B2 </td></tr>
<tr> <td> P3 </td> <td> a ∈ A3 </td> <td> a = c ∈ B3 </td></tr>
<tr> <td> P4 </td> <td> a ∈ A4 </td> <td> a = c ∈ B4 </td></tr>
<tr> <td> P5 </td> <td> a ∈ A5 </td> <td> a = c ∈ B5 </td></tr>
</table>
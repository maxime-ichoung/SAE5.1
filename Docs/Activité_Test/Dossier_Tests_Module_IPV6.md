
<table>
<tr> <td> Dossier de test</td> <td> Version: 1.0</td></tr>
<tr> <td> Responsable de la rédaction : Romain Pereira de Miranda </td> <td> Date : 21/12/2023</td></tr>
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
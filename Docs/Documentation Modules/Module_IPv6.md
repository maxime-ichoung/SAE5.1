### Documentation du Module IPv6

Notre module IPv6 est une interface web conçue pour simplifier l'écriture des adresses IPv6 et afficher les deux octets les plus significatifs en format hexadécimal et binaire. De plus, il détermine le type d'adresse IPv6. Le module se compose de l'interface utilisateur (front-end), et d'un script PHP pour le traitement des adresses IPv6.

#### Interface Utilisateur (HTML/CSS)
- **Structure HTML :** La page `Module_IPV6.php` contient un formulaire permettant à l'utilisateur de saisir une adresse IPv6. Le formulaire comprend des validations pour assurer la saisie d'une adresse IPv6 valide.
- **Utilisation de Bootstrap :** Pour le design et la mise en page responsive.

#### Script PHP (`actions/actionModule_IPV6.php`)
- **Fonction `simplifyV2($adresse)` :** Simplifie l'adresse IPv6 en réduisant les séquences de zéros. Elle utilise une logique complexe pour identifier et supprimer la plus longue séquence de zéros, en respectant la syntaxe IPv6.
- **Fonction `binaire_poids_fort($adresse)` :** Convertit les deux octets les plus significatifs de l'adresse IPv6 en binaire et en hexadécimal. Elle utilise les fonctions `inet_pton`, `bin2hex`, et `base_convert` pour réaliser les conversions.
- **Fonction `type_ipv6($ipv6)` :** Détermine le type d'adresse IPv6 (par exemple, locale, multicast, unicast) en se basant sur le format de l'adresse.

La fonction `simplifyV2($adresse)` dans le script PHP est conçue pour simplifier une adresse IPv6 en réduisant les séquences de zéros. Voici une explication détaillée de son fonctionnement :

### Fonctionnement de `simplifyV2($adresse)`

1. **Identification de la Plus Grande Séquence de Zéros :**
   - La fonction commence par parcourir chaque caractère de l'adresse IPv6.
   - Elle cherche la plus longue séquence de zéros consécutifs, incluant les séparateurs `:`.
   - Le comptage de cette séquence tient compte des zéros implicites dans les groupes incomplets (moins de 4 chiffres hexadécimaux).
   - Elle garde la trace du début et de la fin de cette plus longue séquence.

2. **Suppression de la Plus Grande Séquence :**
   - Si la séquence la plus longue de zéros est suffisamment grande (plus de 6 caractères ou s'étend jusqu'à la fin de l'adresse), elle est remplacée par `::` (notation courte pour IPv6).
   - Cette étape gère également les cas particuliers où la séquence se trouve au début ou à la fin de l'adresse.

3. **Élimination des Zéros Non Significatifs :**
   - L'adresse est divisée en segments (séparés par `:`).
   - Chaque segment est parcouru pour supprimer les zéros de tête non significatifs.
   - Si un segment est entièrement composé de zéros, il est remplacé par `0` (sauf dans le cas où il fait partie de la plus longue séquence de zéros déjà traitée).

4. **Reconstruction de l'Adresse :**
   - Après le traitement, les segments sont réassemblés pour former l'adresse IPv6 simplifiée.

### Exemples d'Utilisation

- **Adresse IPv6 Originale :** `2001:0db8:0000:0000:0000:0000:8a2e:0370:7334`
- **Adresse IPv6 Simplifiée :** `2001:db8::8a2e:370:7334`

Dans cet exemple, les séquences de zéros consécutifs entre `0db8` et `8a2e` sont remplacées par `::`, et les zéros de tête non significatifs sont supprimés dans les autres groupes.

### Points Importants

- **Validation de l'Adresse IPv6 :** La fonction suppose que l'adresse IPv6 d'entrée est valide. Une validation supplémentaire peut être nécessaire avant d'appeler cette fonction.


#### Processus
1. **Saisie de l'Adresse :** L'utilisateur entre une adresse IPv6 dans le formulaire.
2. **Soumission et Traitement :** Lorsque le formulaire est soumis, le script PHP traite l'adresse saisie.
3. **Simplification de l'Adresse :** L'adresse est d'abord simplifiée pour réduire les zéros inutiles.
4. **Conversion Binaire et Hexadécimale :** Les deux premiers octets de l'adresse simplifiée sont convertis en format binaire et hexadécimal.
5. **Détermination du Type :** Le type de l'adresse IPv6 est identifié.
6. **Affichage des Résultats :** Les résultats sont affichés sous le formulaire.

#### Performances et gestion des erreurs
- **Validation des Entrées :** La validation côté client et côté serveur assure que seules les adresses IPv6 valides sont traitées.
- **Gestion des Erreurs :** Les fonctions PHP sont conçues pour gérer les erreurs de saisie et les cas spéciaux d'adresses IPv6.
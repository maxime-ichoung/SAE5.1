### Documentation du Module IPv4

Notre module IPv4 est une interface web conçue pour calculer la division en sous-réseaux d'une adresse IPv4 donnée avec une notation CIDR. Il comprend une interface utilisateur, un script PHP principal pour la saisie et la validation des données, et des fonctions PHP pour le calcul des sous-réseaux.

#### Interface Utilisateur (HTML/CSS)
- **Page Web :** La page `Module_IPV4.php` propose un formulaire pour saisir le nombre de sous-réseaux désirés, l'adresse IPv4, et le masque CIDR.
- **Validation de Saisie :** Des validations sont intégrées pour s'assurer que l'adresse IPv4 et le masque CIDR sont correctement formatés.
- **Design Responsive :** Utilisation de Bootstrap pour un design réactif et attrayant.

#### Fonctionnalités PHP
- **`taille_mask_sous_res($taille_sous_res)` :** Calcule la taille allouée et le masque CIDR pour chaque sous-réseau. Cette fonction détermine la plus petite puissance de 2 qui peut accueillir le nombre d'adresses demandé, puis calcule le masque CIDR correspondant.
- **`mask_cdri_vers_dec($mask_actuel)` :** Convertit un masque CIDR en format décimal standard. Par exemple, un masque CIDR de 24 est converti en 255.255.255.0.
- **`addr_broad_plage_sous_res($addr, $taille_alloue)` :** Calcule l'adresse de broadcast et la plage d'adresses pour un sous-réseau donné en fonction de sa taille allouée.

#### Processus
1. **Saisie des Données :** L'utilisateur entre le nombre de sous-réseaux souhaités, une adresse IPv4 et un masque CIDR.
2. **Traitement des Données :** À la soumission du formulaire, le script PHP calcule la taille et le masque alloué pour chaque sous-réseau, convertit le masque CIDR en format décimal, et détermine la plage d'adresses et l'adresse de broadcast pour chaque sous-réseau.
3. **Affichage des Résultats :** Les résultats sont affichés sous forme de tableau, indiquant la taille, le masque, la plage d'adresses et l'adresse de broadcast pour chaque sous-réseau.

#### Performances et gestion des erreurs

- **Validation Côté Serveur :** Assure la faisabilité du découpage en sous-réseaux en fonction de l'adresse IP et du masque CIDR fournis, et s'assurer que les demandes de sous-réseaux sont réalisables.
1. Vérifier que le nombre et la taille des sous-réseaux demandés peuvent être accommodés par le réseau principal donné.
2. S'assurer que la somme des tailles de tous les sous-réseaux ne dépasse pas la taille disponible dans le réseau principal.

- **Validation Côté Client :** La validation des entrées côté serveur assure que seules les adresses IPv4 valides et les masques CIDR sont traités.

1. Utilisation d'attributs HTML comme pattern et required pour valider le format de l'adresse IPv4 et du masque CIDR directement dans le formulaire.

- **Gestion des Erreurs :** Le script est conçu pour gérer les erreurs, comme un réseau principal trop petit pour le nombre de sous-réseaux demandés.
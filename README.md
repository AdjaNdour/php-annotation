# php-annotation

### 1. Pourquoi le dossier /vendor ne doit-il pas être versionné ?

- Parce qu’il contient les dépendances installées par Composer.
    Ces dépendances peuvent être réinstallées automatiquement à partir du fichier composer.json et du fichier composer.lock, Vendor rend lourd le dépôt.

### 2. Quelle différence existe entre un commit et un tag ?

- C'est l'enregistrement d'une modification dans l'historique du projet.
- Un tag est une étiquette qui permet d'identifier précisément un commit important, généralement une version stable du projet.
- Le tag permet de dire que le commit tel correspond à la version ex:1.0.0 stable.

### 3. Pourquoi la branche main doit-elle rester stable ?

- Parce que la branche main doit contenir une version stable et fonctionnelle de l'application. Elle représente généralement la version qui peut être déployée.

### ---------------------------------------------------------------------------------------------------------------

### 1.Pourquoi placer index.php dans un dossier public ?

- Parce que le dossier public est le seul dossier qui doit être accessible directement depuis le navigateur.
    Cela permet de protéger le code métier, les configurations et les informations sensibles de l'application.

### 2.Pourquoi toutes les requêtes devraient-elles passer par ce fichier ?

- Parce que index.php est le point d'entrée unique de l'application le front controller.
    Il reçoit les requêtes, charge automatiquement les classes, transmet la requête au contrôleur approprié grâce au router.

### 3.Quels éléments ne devraient jamais se trouver dans le dossier public ?

- Les fichiers contenant le code métier
- les informations de connexion à la base de données
- les fichiers de configuration
- le router
- les dépendances
- les données sensibles ne doivent pas y être

### 4.Comment avez-vous réparti les responsabilités entre vos dossiers ?

- J'ai séparé l'application en plusieurs parties :
- Les Entities représentent les objets métier
- les Controllers reçoivent les requêtes
- les Services contiennent la logique métier
- les Repositories gèrent l'accès aux données
- les Templates/Views gèrent l'affichage
- Core contient les classes partagées
- routes gère la résolution des URL se trouvant dans le dossier core
- Le dossier public contient uniquement les fichiers accessibles par le navigateur: index.php et les assets /css

### Quelle relation avez-vous établie entre les deux classes ?

- Nous avons établi une relation d’héritage.
    La classe CopieExamen hérite de la classe AbstractDocument avec extends. Elle récupère les caractéristiques communes comme id et dateDepot.

### Pourquoi ne peut-on pas créer directement un AbstractDocument ?

- AbstractDocument est une classe abstraite.
    Elle sert de classe de base pour les différents types de documents. Une classe abstraite ne peut pas être instanciée directement.

### Pourquoi l’identifiant peut-il être absent avant la sauvegarde ?

### Quel principe de conception est favorisé par la protection des propriétés ?

# php-annotation

### -------------------------------------------- PARTIE 0 ------------------------------------------------------

### 1. Pourquoi le dossier /vendor ne doit-il pas être versionné ?

- Parce qu’il contient les dépendances installées par Composer.
    Ces dépendances peuvent être réinstallées automatiquement à partir du fichier composer.json et du fichier composer.lock, Vendor rend lourd le dépôt.

### 2. Quelle différence existe entre un commit et un tag ?

- C'est l'enregistrement d'une modification dans l'historique du projet.
- Un tag est une étiquette qui permet d'identifier précisément un commit important, généralement une version stable du projet.
- Le tag permet de dire que le commit tel correspond à la version ex:1.0.0 stable.

### 3. Pourquoi la branche main doit-elle rester stable ?

- Parce que la branche main doit contenir une version stable et fonctionnelle de l'application. Elle représente généralement la version qui peut être déployée.


### -------------------------------------------- PARTIE 1 ------------------------------------------------------

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


### -------------------------------------------- PARTIE 2 ------------------------------------------------------
 
### 1-Quelle relation avez-vous établie entre les deux classes ?

- Nous avons établi une relation d’héritage.
    La classe CopieExamen hérite de la classe AbstractDocument avec extends. Elle récupère les caractéristiques communes comme id et dateDepot.

### 2-Pourquoi ne peut-on pas créer directement un AbstractDocument ?

- AbstractDocument est une classe abstraite.
    Elle sert de classe de base pour les différents types de documents. Une classe abstraite ne peut pas être instanciée directement.

### 3-Pourquoi l’identifiant peut-il être absent avant la sauvegarde ?

- Parce que l’identifiant est généralement généré automatiquement par la base de données lors de l'insertion.

### 4-Quel principe de conception est favorisé par la protection des propriétés ?

- Cela favorise l'encapsulation.
    Les propriétés sont protégées avec private et ne sont pas accessibles directement depuis l'extérieur de la classe. On utilise des méthodes comme les getters et setters pour contrôler leur accès et leur modification.


### -------------------------------------------- PARTIE 3 ------------------------------------------------------

### 1-Quelle classe doit être responsable de la connexion ?

- La classe Database doit être responsable de la connexion à la base de données.
    Elle permet de centraliser la création et la configuration de la connexion PDO afin d'éviter de répéter le même code dans les autres classes.

### 2-Faut-il créer une nouvelle connexion pour chaque requête SQL ?

- Non, il ne faut pas créer une nouvelle connexion pour chaque requête SQL.
    Il est préférable de réutiliser la même connexion pendant l'exécution de l'application. Cela évite de créer inutilement plusieurs connexions et permet de centraliser la gestion de la base de données.

### 3-Où placer les identifiants de connexion ?

- Les identifiants de connexion doivent être placés dans un fichier de configuration qui n'est pas versionné, par exemple un fichier .env.
    Cela permet de ne pas exposer le mot de passe et les autres informations sensibles dans le code source ou sur GitHub.

### 4-Pourquoi utiliser PDO ?

- PDO permet à PHP de communiquer avec une base de données comme PostgreSQL.
    Il permet également d'utiliser des requêtes préparées, de gérer les erreurs et de sécuriser les requêtes contre les injections SQL.


### -------------------------------------------- PARTIE 4 ------------------------------------------------------

### 1. Pourquoi créer un objet supplémentaire alors que $_POST contient déjà les données ?

- On crée un DTO (Data Transfer Object) pour encapsuler et structurer les données brutes de $_POST afin de les transmettre proprement entre les différentes couches de l'application.

### 2. Quelle différence entre cet objet et CopieExamen ?

- Le DTO transporte les données, tandis que CopieExamen est une entité qui représente réellement une copie d'examen dans l'application.

### 3. Cet objet doit-il posséder un identifiant de base de données ?

- Non, le DTO n'a pas obligatoirement d'identifiant, car lors de la création, l'id peut être généré automatiquement par la base de données.

### 4. Où la conversion des chaînes de dates doit-elle avoir lieu ?

- La conversion de la chaîne de caractères (string) en objet DateTime doit être faite lors de la transformation du DTO en entité, avant son utilisation dans la logique métier.
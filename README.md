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

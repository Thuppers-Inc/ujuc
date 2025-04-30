# Un Jeune Une Compétence - Documentation

## Vue d'ensemble

"Un Jeune Une Compétence" est une plateforme de formation professionnelle conçue pour faciliter l'insertion des jeunes sur le marché du travail. Cette application web permet aux utilisateurs de découvrir, consulter et s'inscrire à diverses formations classées par catégories.

## Fonctionnalités principales

### 1. Catalogue de formations
- Présentation des formations par catégories
- Mise en avant des formations populaires
- Filtrage par type de formation, durée et prix
- Affichage détaillé de chaque formation

### 2. Système d'inscription
- Formulaire d'inscription simple et intuitif
- Vérification des places disponibles
- Confirmation par email

### 3. Espace utilisateur
- Suivi des formations
- Historique des inscriptions
- Documents de formation téléchargeables

### 4. Popup d'alerte
- Alerte de sécurité concernant les inscriptions
- Stockage de préférence utilisateur via localStorage
- Animation et design moderne

## Installation

### Prérequis
- PHP 8.1+
- Composer
- Node.js et NPM
- MySQL ou MariaDB

### Étapes d'installation

1. Cloner le dépôt
```bash
git clone https://github.com/votre-compte/ujuc.git
cd ujuc
```

2. Installer les dépendances
```bash
composer install
npm install
```

3. Configurer l'environnement
```bash
cp .env.example .env
php artisan key:generate
```

4. Configurer la base de données dans le fichier `.env`
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ujuc
DB_USERNAME=root
DB_PASSWORD=
```

5. Migrer et alimenter la base de données
```bash
php artisan migrate --seed
```

6. Lier le stockage
```bash
php artisan storage:link
```

7. Compiler les assets
```bash
npm run dev
```

8. Démarrer le serveur
```bash
php artisan serve
```

## Structure du projet

```
ujuc/
├── app/                  # Logique de l'application
│   ├── Http/             # Contrôleurs et Middleware
│   ├── Models/           # Modèles Eloquent
│   └── Services/         # Services métier
├── config/               # Configuration
├── database/             # Migrations et seeds
├── public/               # Fichiers accessibles publiquement
├── resources/            # Vues, assets non compilés
│   ├── js/               # JavaScript
│   ├── css/              # CSS/SCSS
│   └── views/            # Templates Blade
│       ├── admin/        # Interface d'administration
│       └── site/         # Frontend du site
├── routes/               # Définition des routes
└── storage/              # Fichiers uploadés, cache, logs
```

## Guide d'administration

### Ajout de nouvelles formations

1. Accéder au panneau d'administration (/admin)
2. Naviguer vers "Formations" > "Ajouter une formation"
3. Remplir les informations requises :
   - Titre et description
   - Prix et durée
   - Nombre de places disponibles
   - Catégorie
   - Image (dimension recommandée : 800x600px)
4. Cliquer sur "Enregistrer"

### Gestion des catégories

1. Accéder à "Catégories" > "Liste des catégories"
2. Pour ajouter une catégorie, cliquer sur "Nouvelle catégorie"
3. Pour modifier, utiliser l'icône d'édition sur la ligne correspondante

## Personnalisation

### Styles et thème

Les principales variables de couleur sont définies dans le fichier `resources/views/site/layouts/app.blade.php` :

```css
:root {
    --primary: #F27438;    /* Orange */
    --secondary: #26474E;  /* Bleu-vert foncé */
    --dark: #18534F;       /* Vert foncé */
    --light: #f8f9fa;      /* Gris très clair */
    --accent: #ffd166;     /* Jaune */
}
```

Modifiez ces valeurs pour changer le thème global du site.

### Popup d'alerte de sécurité

#### Comment désactiver le popup d'alerte

**Option 1 : Désactivation temporaire via JavaScript**

Dans le fichier `resources/views/site/layouts/app.blade.php`, modifiez le script comme suit :

```javascript
<script>
    // Ajouter cette ligne pour désactiver le popup
    var disableAlertPopup = true;
    
    function showModal() {
        document.getElementById('alertModal').classList.add('active');
    }
    
    function closeModal() {
        document.getElementById('alertModal').classList.remove('active');
        localStorage.setItem('alertModalClosed', 'true');
    }
    
    document.addEventListener('DOMContentLoaded', function() {
        // Modifier cette condition pour vérifier disableAlertPopup
        if (!localStorage.getItem('alertModalClosed') && !disableAlertPopup) {
            setTimeout(showModal, 800);
        }
    });
</script>
```

**Option 2 : Suppression complète du popup**

Pour supprimer définitivement le popup :

1. Dans `resources/views/site/layouts/app.blade.php` :

   a. Supprimer le code HTML du popup (lignes ~159-174) :
   ```html
   <!-- Popup Modal -->
   <div class="modal-overlay" id="alertModal">
       <!-- ... contenu du modal ... -->
   </div>
   ```

   b. Supprimer le script JavaScript associé (lignes ~187-201) :
   ```javascript
   <script>
       function showModal() { /* ... */ }
       function closeModal() { /* ... */ }
       document.addEventListener('DOMContentLoaded', function() { /* ... */ });
   </script>
   ```

   c. Supprimer les styles CSS du popup (lignes ~78-157) :
   ```css
   /* Style pour le popup modal */
   .modal-overlay { /* ... */ }
   /* ... autres styles du popup ... */
   ```

## Déploiement en production

### Préparation

1. Optimiser pour la production
```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

2. Vérifier les permissions
```bash
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache
```

### Configuration serveur recommandée

- Serveur web : Nginx ou Apache
- PHP-FPM 8.1+
- Base de données : MySQL 8.0 ou MariaDB 10.5+
- Certificat SSL (Let's Encrypt recommandé)

## Maintenance

### Mises à jour

1. Récupérer les dernières modifications
```bash
git pull origin main
```

2. Mettre à jour les dépendances
```bash
composer update
npm update
```

3. Migrer la base de données si nécessaire
```bash
php artisan migrate
```

4. Reconstruire les assets et vider les caches
```bash
npm run build
php artisan optimize:clear
php artisan optimize
```

### Sauvegarde

Il est recommandé de sauvegarder régulièrement :
- La base de données complète
- Le dossier `storage/app`
- Le fichier `.env`

## Résolution des problèmes courants

| Problème | Solution |
|----------|----------|
| Images non visibles | Vérifier que `php artisan storage:link` a été exécuté |
| Erreurs 500 | Consulter les logs dans `storage/logs/laravel.log` |
| Popup d'alerte apparaît malgré désactivation | Effacer le localStorage du navigateur |
| Problèmes de performance | Vérifier l'optimisation des images et activer le cache |

## Support et contact

Pour toute question ou assistance technique, veuillez contacter :
- Email : support@unjeuneunecompetence.org
- Téléphone : +XXX XXX XXX

---

© 2023 Un Jeune Une Compétence. Tous droits réservés.

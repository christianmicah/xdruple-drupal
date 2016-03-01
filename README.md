# xDruple Distribution

## Creating a new project

Step 1. Run Composer `create-project` command on your (virtual) server:

```
composer create-project --stability dev --no-interaction --repository-url=http://satis.codedrivendrupal.com xtuple/xdruple-drupal project.xd
```

Step 2. Go to project directory and load install all vendor packaged:

```
cd project.xd && composer update
```

Step 3. Initialize a new repo and push it to your Github repo:

```
git init && \
git remote add origin git@github.com:your-organization/project-repo.git && \
git push --all origin
```

Step 4. Initialize default theme.

Step 5. Remove "Creating a new project" part from `README.md`, change the title and update Installation instruction to be more concrete.

Step 6. Add and commit all files. Publish code to Github.

## Installation

Step 1. Clone the repository:

```
git clone git@github.com:your-organization/project-repo.git project.xd
```

Step 2. Go to project directory and switch to `develop` branch:

```
cd project.xd && git checkout develop
```

Step 3. Install vendors:

```
composer install
```

Step 4. Copy `config/environment.php.dist` to `config/environment.php` and fill in with correct information.

Step 5. Run `drush-si.sh` script. It requires parameters in the exact order: developer's email, site name, DB name, DB user, DB pass, environment (local). Example:

```
./drush-si.sh developer.wsg@xtuple.com "Site name" name user pass local
```

Step 6. (optional) If using an IDE, mark these directories as excluded:

```
drupal/core/files
drupal/sites/all
drupal/sites/project
web
```

Step 7. (optional) If using PHPStorm IDE, enable Drupal support:

- Drupal installation path is `drupal/core`
- Version is `7`
- Make sure Code style is set from predefined "Drupal"

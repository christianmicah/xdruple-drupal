# xDruple Distribution

## Creating a new project

Step 1. Run Composer `create-project` command on your (virtual) server:

```
composer create-project --stability dev --no-interaction --repository-url=http://satis.codedrivendrupal.com xtuple/xdruple-drupal project.xd
```

Step 1a. Edit `project.xd/composer.json` file; require appropriate Drupal profile:

```...
"require": {
    "cdd/drupal-installer-plugin": "dev-master",
    "profiles/base": "dev-master"
}
```

Step 1b. Go to project directory `cd project.xd` and run `composer update`

Step 2. Initialize a new repo

```
git init
```

Step 2a. Add remote (Github) and push code to it

```
git remote add origin git@github.com:xtuple/xtuple-marketplace.git
git push --all origin
```

Step 3. Add default features set and Core module into `drupal/project/modules`

Step 4. Initialized default theme. 

Step 5. Remove "Creating a new project" part from `README.md`, change the title and update Installation instruction to be more concrete.

Step 6. Add and commit all files. Publish code to Github.

## Installation

Step 1. Clone the repository:

```
git clone git@github.com:xtuple/project-repo.git project.xd
```

Step 2. Go to project directory and switch to `develop` branch:

```
cd project.xd && git checkout develop
```

Step 3. Run `composer install`:

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

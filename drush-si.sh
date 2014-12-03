#!/bin/bash
#
# Script should be called in Drupal root directory.
#
# $1 - email
# $2 - site name
# $3 - db name
# $4 - db user
# $5 - db pass
# $6 - environment [local|development|production]
#
# Example: ./scripts/drush-si.sh developer.wsg@xtuple.com OpenCDD dbname dbuser dbpass local
#
export MAIL=${1}
export SITENAME=${2}
export DBNAME=${3}
export DBUSER=${4}
export DBPASS=${5}
export ENVIRONMENT=${6}

export RESCUED_APP_NAME=${7}
export RESCUED_URL=${8}
export RESCUED_KEY_FILE=${9}
export RESCUED_ISS=${10}

export SUBDIR='default'
export ACCOUNTNAME='Developer'
export ACCOUNTPASS='xTuple-WSG'

if [ ${ENVIRONMENT} != 'local' ] && [ ${ENVIRONMENT} != 'development' ] && [ ${ENVIRONMENT} != 'production' ]; then
    printf "ERROR: Environment value should be local, development or produciton\n"
    exit
fi

sudo rm -rf /tmp/Google_Client

cd drupal/core

if [ -d sites/${SUBDIR} ]; then
    sudo chmod 755 sites/${SUBDIR}
fi

sudo mkdir -p sites/${SUBDIR}/files
sudo chmod -R 777 sites/${SUBDIR}/files

if [ -f sites/${SUBDIR}/settings.php ]; then
    sudo rm sites/${SUBDIR}/settings.php
fi

sudo -u postgres psql postgres --command "DROP DATABASE IF EXISTS ${DBNAME};" && \
sudo -u postgres psql postgres --command "DROP USER IF EXISTS ${DBUSER};" && \
sudo -u postgres psql postgres --command "CREATE USER ${DBUSER} WITH PASSWORD '${DBPASS}';" && \
sudo -u postgres psql postgres --command "CREATE DATABASE ${DBNAME} OWNER ${DBUSER};"

sudo /etc/init.d/memcached restart

mkdir -p sites/${SUBDIR}

mkdir -p files/public && \
mkdir -p files/private && \
chmod 775 files/*

drush site-install -y base \
--account-mail=${MAIL} \
--account-name=${ACCOUNTNAME} \
--account-pass=${ACCOUNTPASS} \
--db-url=pgsql://${DBUSER}:${DBPASS}@localhost/${DBNAME} \
--site-mail=${MAIL} \
--site-name=${SITENAME} \
--sites-subdir=${SUBDIR} \

cd sites/${SUBDIR}
drush en -y ft_core && \
drush en -y core

if [ ${ENVIRONMENT} = 'local' ] || [ ${ENVIRONMENT} = 'development' ]; then
    drush en -y ft_development
fi

drush cc all && drush fra -y && drush fl

sudo chmod 755 ./
sudo rm -rf ./files
sudo chmod 644 ./settings.php

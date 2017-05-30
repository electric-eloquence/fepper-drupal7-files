# Fepper for Drupal 7

The documentation for Fepper for Drupal 7 does not vary from the documentation 
for [Fepper for Drupal 8](https://github.com/electric-eloquence/fepper-drupal). 
As such, there does not exist justification to maintain a separate Fepper 
project for Drupal 7. Instead, populate your Fepper for Drupal 8 project with 
the Drupal 7 backend and patterns: 

* Download the latest release of [Fepper for Drupal 8](https://github.com/electric-eloquence/fepper-drupal/releases).
* Unpack the Fepper for Drupal 8 download.
* Download the latest release of [Drupal 7](https://www.drupal.org/project/drupal).
* Unpack the Drupal 7 download.
* Change the name of the unpacked Drupal 7 directory to `drupal`
* Replace `backend/drupal` in Fepper for Drupal 8 with the unpacked directory.
* Replace `fepper-drupal-mysqldump.sql` in Fepper for Drupal 8 with 
  `fepper-drupal-mysqldump.sql` from this repository.
* Replace `pref.yml` in Fepper for Drupal 8 with `pref.yml` from this repository.
* Replace `source` in Fepper for Drupal 8 with `source` from this repository.
* Copy `fepper` from this repository to `backend/drupal/sites/all/themes/`

If you wish to replicate the look and feel of the Fepper demo site (as per the 
screenshot) in your Drupal 7 backend, follow these instructions:

* Configure `d7.local` to be the hostname in your web server configs.
* Configure `backend/drupal` (correctly pathed) to be the document root for this 
  host.
* Restart the web server.
* Create a MySQL database.
* Create a `settings.php` file by running the 
  [Drupal 7 installation script](https://www.drupal.org/docs/7/installing-drupal-7/step-4-run-the-installation-script).
* Download and enable the [Views module](https://www.drupal.org/project/views).
* Replace `backend/drupal/sites/default/files` in Fepper for Drupal 8 with the 
  `files` directory from this repository.
* Restore `fepper-drupal-mysqldump.sql` into your MySQL database.
* Open http://d7.local in a browser.
* Log into Drupal with `admin:admin`

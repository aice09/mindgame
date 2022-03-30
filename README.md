# Umbra Mindgame

Mind game for umbra as my exam

## To Get Started

1. Install node modules or project dependencies

   ```
   npm install
   ```

   - In case it's a real problem, check the repository of vulnerable package for existing issues and PRs run.
     ```
     npm audit fix
     ```

2. Run Gulp to get compile Javascript, Sass, images, and dump files.

   - Build to compile all stuffs

     ```
     gulp build
     ```

   - Run this to watch your change or automatically compile your scripts

     ```
     gulp
     ```

     or use

     ```
     gulp watch
     ```

   - Run this to delete your **dist** folder.
     ```
     gulp clean
     ```

3. For more info please contact me, find the following contact information inside html files of each pages.

## System Deployment

1. This system are hosted to online VCS (version control system) like Github, Gitlab, Bitbucket, etc.
2. Create account in Netlify

```
config/                   Configuration files.
dist/                     Files publically accessible from the Internet.
    css/                  Published assets.
    img/                  Entry script.
    js/                   Entry script.
node_modules/             Documentation.
pages/                    Files publically accessible from the Internet.
    sys_admin/            Published assets.
    sys_user/             Published assets.
    sys_user_dashboard/   Published assets.
pages_exe/                Files publically accessible from the Internet.
    sys_admin/            Published assets.
    sys_user/             Published assets.
    sys_user_dashboard/   Published assets.
src/                      Application source code.
    css/                  Asset bundle resources.
    dumps/                Layout view templates.
    img/                  View templates.
    js/                   View templates.
    scss/                 View templates.
template/                 Files publically accessible from the Internet.
    sys_admin/            Published assets.
    sys_user/             Published assets.
    sys_user_dashboard/   Published assets.
    login_temp.php        Published assets.
vendor/                   Installed Composer packages.
.env                      A set of Codeception tests for the application.
.env_example              A set of Codeception tests for the application.
.gitignore                A set of Codeception tests for the application.
admin.php                 A set of Codeception tests for the application.
composer.json             A set of Codeception tests for the application.
composer.lock             A set of Codeception tests for the application.
dashboard.php             A set of Codeception tests for the application.
environment.php           A set of Codeception tests for the application.
gulpfile.js               A script that automate & enhance your workflow
index.php                 A set of Codeception tests for the application.
login.php                 A set of Codeception tests for the application.
packagae-lock.json        A set of Codeception tests for the application.
package.json              A set of Codeception tests for the application.
README.md                 A set of Codeception tests for the application.
```

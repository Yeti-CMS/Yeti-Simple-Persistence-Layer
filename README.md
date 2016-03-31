# Yeti-Simple-Persistence-Layer
Intended as an example implementation of persistence for Yeti CMS. Uses PHP &amp; a hard-coded password.

## Requirements
- PHP 5
- Filesystem access to your website

## Installation
1. Open `write-file.php` and change the password (on the fourth line).
2. Upload to the root of your webserver (so that subdomain.yourdomain.com/write-files.php is accessible).
3. Open `yeti-cms/loader.js` and add the module by appending `loadScript("/yeti-cms/simple-persistence-adapter.mod.js");` (or include it in your webpage as a `<script src="/yeti-cms/simple-persistence-adapter.mod.js"></script>`. SCRIPT tag.
4. Ensure the directory your site is in has write access. `chmod -R 777 my-website-directory` should do the trick.

That's it! Now, when you press `Publish`, you will be prompted for a password, and if successful, your changes will be published.

## Yeti CMS
This module is designed to work with the`Yeti CMS` frontend (https://github.com/Yeti-CMS/yeti-frontend).

## Known Issues
- Not a very robust solution.
- Not very secure (a single password). Especially true if you're not using HTTPS.
- `Page Published!` is displayed after each successful AJAX request, even if you enter the wrong password and it is *not* actually published.

## Like it? Want to do something better?
Pull requests / forks welcome!


## Disclaimer
THE PROGRAM IS DISTRIBUTED IN THE HOPE THAT IT WILL BE USEFUL, BUT WITHOUT ANY WARRANTY. IT IS PROVIDED "AS IS" WITHOUT WARRANTY OF ANY KIND, EITHER EXPRESSED OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE. THE ENTIRE RISK AS TO THE QUALITY AND PERFORMANCE OF THE PROGRAM IS WITH YOU. SHOULD THE PROGRAM PROVE DEFECTIVE, YOU ASSUME THE COST OF ALL NECESSARY SERVICING, REPAIR OR CORRECTION.

IN NO EVENT UNLESS REQUIRED BY APPLICABLE LAW THE AUTHOR WILL BE LIABLE TO YOU FOR DAMAGES, INCLUDING ANY GENERAL, SPECIAL, INCIDENTAL OR CONSEQUENTIAL DAMAGES ARISING OUT OF THE USE OR INABILITY TO USE THE PROGRAM (INCLUDING BUT NOT LIMITED TO LOSS OF DATA OR DATA BEING RENDERED INACCURATE OR LOSSES SUSTAINED BY YOU OR THIRD PARTIES OR A FAILURE OF THE PROGRAM TO OPERATE WITH ANY OTHER PROGRAMS), EVEN IF THE AUTHOR HAS BEEN ADVISED OF THE POSSIBILITY OF SUCH DAMAGES.

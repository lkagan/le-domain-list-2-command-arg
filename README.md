Quick and dirty tool that Converts a list of domains into a command line argument for letsencrypt / certbot.

Expects domains without 'www' and duplicates the domain with the 'www'.

Usage:
    `php index.php <filename>`

Outputs files in the current directory.   Each file contains no more than 100 domain names, let's encrypt's current limit per cert.


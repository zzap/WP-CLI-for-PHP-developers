wp cli alias list
wp @client option get home
wp @wpcli option get home
wp @client db export - | wp @wpcli db import - && wp @wpcli search-replace "https://milana.dev/" "http://wpcli.loc/"
cd www/wpcli.loc/
wp @wpcli search-replace "https://milana.dev/" "http://wpcli.loc/"
wp search-replace "milana.dev" "wpcli.loc"
wp search-replace "https://wpcli.loc" "http://wpcli.loc"
wp core version
wp eval 'echo wp_login_url();'
wp eval 'echo wp_login_url() . "\n";'
wp shell
touch test.php
code test.php
wp eval-file test.php
wp shell
wp user list --help
wp user list --fields=ID,user_login,user_email,user_pass
wp user generate
wp user list --fields=ID,user_login,user_email,user_pass
wp user list --fields=ID,user_login,user_email,user_pass > user.csv
wp eval-file test.php
wp eval-file test.php
mv test.php export_users.php
touch import_users.php
code import_users.php
wp eval-file import_users.php
wp user delete --help
wp user delete $(wp user list --field=ID)
wp user list
wp user generate --count=10
wp user list
wp eval-file import_users.php
wp user list
wp shell
wp post list
wp shell

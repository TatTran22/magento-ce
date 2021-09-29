#!/bin/zsh

cowthink "Setup Upgrade..." | lolcat

bin/magento setup:upgrade

cowthink "Compile..." | lolcat

bin/magento setup:di:compile

cowthink "Static content deploy" | lolcat

bin/magento s:s:d -f

cowthink "Flush cache" | lolcat

bin/magento c:f

cowsay "Restarting PHP service" | lolcat

brew services restart php@7.4

cowsay "Done!" | lolcat

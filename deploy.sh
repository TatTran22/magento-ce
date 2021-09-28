#!/bin/zsh

echo "Step 1..."

bin/magento setup:upgrade

echo "Step 2..."

bin/magento s:s:d -f

echo "Step 3..."

bin/magento c:f

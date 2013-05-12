#!/bin/sh

cd $(dirname $0)

rm -f ./delegated-*

wget ftp://ftp.arin.net/pub/stats/arin/delegated-arin-latest ftp://ftp.ripe.net/pub/stats/ripencc/delegated-ripencc-latest ftp://ftp.apnic.net/pub/stats/apnic/delegated-apnic-latest ftp://ftp.lacnic.net/pub/stats/lacnic/delegated-lacnic-latest ftp://ftp.afrinic.net/pub/stats/afrinic/delegated-afrinic-latest

cat ./delegated-* | php ./conv.php | sort -n | php ./minimize.php > ipv4.txt

rm -f ./delegated-*

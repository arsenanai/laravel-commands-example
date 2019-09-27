composer install

prepare two .csv files to directory: database/seeds
katonew.csv is one that could be taken from source: http://stat.gov.kz/important/classifier
katoold.csv is one that could be exported from prod_eproc database, kato table with query:

select
id, code, kk, ru, full_kk, full_ru, has_child, parent_id
from kato

then run to import csv files to db:
php artisan migrate:refresh --seed

after, you can synchronize old_katos table according to changes in new_katos:
php artisan kato:synchronize

finally, you can export old_katos table, in order to import it to prod_eproc database
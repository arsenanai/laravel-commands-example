# Synchronize tables using Artisan Console

This programm was delevoped to synchronize tables in laravel, uses Artisan console

## Software requirements

Numbered list:
  
  1. php >= 7.2
  2. composer (newest)

## Installation
`composer install`

## Usage

prepare two .csv files to directory: database/seeds

Numbered list:

  1. new.csv is one that could be taken from source: http://stat.gov.kz/important/classifier
  2. old.csv is one that could be exported from production database with query below
`
select
id, code, kk, ru, full_kk, full_ru, has_child, parent_id
from kato`
  3. prepare database, I used postgres, fill connection settings to .env file. Then run:
`
php artisan migrate:refresh --seed`
  4. after, you can synchronize _old_table_ according to changes in _new_table_: 
`
php artisan kato:synchronize`
  5. finally, you can export _old_table_, in order to import it to _production_ database
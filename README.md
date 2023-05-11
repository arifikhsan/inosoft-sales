# Rest API Penjualan kendaraan

## Fitur:
 
✅ Melihat stok kendaraan  
✅ Penjualan kendaraan  
✅ Laporan penjualan per kendaraan

## Petunjuk Instalasi

Install tools berikut:
* PHP 8
* Composer
* MongoDB 4.2

Install PHP di MacOS menggunakan homebrew:

`brew install php`

Install PHP di Windows menggunakan choco:

`choco install php`

Install PHP di Ubuntu menggunakan phpbrew:

`phpbrew install 8.2.5`

Install Composer sesuai sistem operasi di https://getcomposer.org/download/

Install dan jalankan MongoDB menggunakan docker:

`docker-compose up`

## Petunjuk penggunaan

1. Copy `.env.example` dengan nama `.env`
2. Buat database di mongodb dengan nama `inosoft_sales`
3. Download semua dependensi menggunakan composer dengan `composer install` 
4. Buat tabel dengan `php artisan migrate`
5. Jalankan aplikasi `php artisan serve`

6. Download postman collection pada link berikut: https://www.postman.com/arifikhsan/workspace/inosoft-sales
7. Ubah environment menjadi `development`

<img width="300" alt="Screenshot 2023-05-11 at 10 20 32" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/729c65f5-f9e9-4ee5-841f-065d7ec7028a">

8. Daftar akun baru

<img width="1552" alt="Screenshot 2023-05-11 at 10 29 17" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/aa65628f-c7a9-4618-a5fa-6e451b7a6158">

9. Login dengan akun yang sudah terdaftar

<img width="1552" alt="Screenshot 2023-05-11 at 10 30 36" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/def880b6-d8e5-4926-9f7f-4aa09ddbd0e6">

10. Buat kendaraan baru (mobil)

<img width="1552" alt="Screenshot 2023-05-11 at 10 31 53" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/7aed920f-2236-408d-8aef-b966f886f159">

11. Lihat semua kendaraan

<img width="1552" alt="Screenshot 2023-05-11 at 10 32 58" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/7ec4c484-8b49-4db7-bd99-d9f01228e8c4">

12. Masukan stok

<img width="1552" alt="Screenshot 2023-05-11 at 10 33 55" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/5c735f02-c2c8-41d6-be2a-870353bd56d5">

13. ✅ Melihat stok kendaraan 

<img width="1552" alt="Screenshot 2023-05-11 at 10 48 11" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/ea27cc0f-9f7e-4b3c-be67-555663e65fa9">

14. Mencatat penjualan kendaraan

<img width="1552" alt="Screenshot 2023-05-11 at 10 36 13" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/219519fd-9b14-47f4-bf3d-e4f35d66efd6">

15. ✅ Melihat semua penjualan kendaraan

<img width="1552" alt="Screenshot 2023-05-11 at 10 49 45" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/93d56344-4556-48b6-ae5c-11bbf11c0adb">

16. ✅ Melihat laporan penjualan per kendaraan

<img width="1552" alt="Screenshot 2023-05-11 at 10 39 35" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/57ac0d66-f868-4adf-bdb7-2e3be3d21756">

Karena mobil sudah dibeli dua unit, maka stoknya tinggal 98:

<img width="1552" alt="Screenshot 2023-05-11 at 10 53 04" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/f4749f25-79b8-4a31-bb4a-86af2e80b3f7">

## Petunjuk menjalankan unit test

1. Buat database di MongoDB dengan nama `inosoft_sales_test`
2. jalankan test dengan `php artisan test`

<img width="328" alt="Screenshot 2023-05-11 at 10 41 14" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/ca7873e1-1604-4abc-a9aa-e63f371167b0">



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

<img width="300" alt="Screenshot 2023-05-11 at 10 20 32" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/81ac2d88-dd45-480e-a159-66e666ccad54">

8. Daftar akun baru

<img width="1552" alt="Screenshot 2023-05-11 at 10 29 17" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/4441e34d-1e2a-4e39-9997-bc70d1852e3f">

9. Login dengan akun yang sudah terdaftar

<img width="1552" alt="Screenshot 2023-05-11 at 10 30 36" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/50ec871c-5d7f-4631-bfaf-d6397b21d135">

10. Buat kendaraan baru (mobil)

<img width="1552" alt="Screenshot 2023-05-11 at 10 31 53" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/c7996645-01b4-4237-8531-f596be8d3e1b">

11. Lihat semua kendaraan

<img width="1552" alt="Screenshot 2023-05-11 at 10 32 58" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/bd69cd0f-518b-43e4-810d-e5e6177ec00a">

12. Masukan stok

<img width="1552" alt="Screenshot 2023-05-11 at 10 33 55" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/e8706819-3615-423f-ae4e-8b8afe11ec2f">

13. ✅ Melihat stok kendaraan 

<img width="1552" alt="Screenshot 2023-05-11 at 11 01 55" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/b944627b-b51f-45fe-aaa8-b70ae18e33fe">

14. Mencatat penjualan kendaraan

<img width="1552" alt="Screenshot 2023-05-11 at 10 36 13" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/10815788-96b2-4caf-a694-8766c187ab49">

15. ✅ Melihat semua penjualan kendaraan

<img width="1552" alt="Screenshot 2023-05-11 at 11 03 28" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/444548c9-10fc-493b-9558-18d59535239d">

16. ✅ Melihat laporan penjualan per kendaraan

<img width="1552" alt="Screenshot 2023-05-11 at 10 39 35" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/a5bb4815-e04b-4279-b815-576e30fabc6c">

Karena mobil sudah dibeli dua unit, maka stoknya tinggal 98:

<img width="1552" alt="Screenshot 2023-05-11 at 10 53 04" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/faaf6494-5396-4523-8aad-15c70d54703f">

## Petunjuk menjalankan unit test

1. Buat database di MongoDB dengan nama `inosoft_sales_test`
2. jalankan test dengan `php artisan test`

<img width="328" alt="Screenshot 2023-05-11 at 10 41 14" src="https://github.com/arifikhsan/inosoft-sales/assets/32485694/da11a8ea-b0b6-43e2-81f8-66f008028107">



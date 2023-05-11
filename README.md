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

![Screenshot 2023-05-11 at 10.20.32.png](..%2F..%2F..%2FPictures%2Fscreenshots%2FScreenshot%202023-05-11%20at%2010.20.32.png)

8. Daftar akun baru

![Screenshot 2023-05-11 at 10.29.17.png](..%2F..%2F..%2FPictures%2Fscreenshots%2FScreenshot%202023-05-11%20at%2010.29.17.png)

9. Login dengan akun yang sudah terdaftar

![Screenshot 2023-05-11 at 10.30.36.png](..%2F..%2F..%2FPictures%2Fscreenshots%2FScreenshot%202023-05-11%20at%2010.30.36.png)

10. Buat kendaraan baru (mobil)

![Screenshot 2023-05-11 at 10.31.53.png](..%2F..%2F..%2FPictures%2Fscreenshots%2FScreenshot%202023-05-11%20at%2010.31.53.png)

11. Lihat semua kendaraan

![Screenshot 2023-05-11 at 10.32.58.png](..%2F..%2F..%2FPictures%2Fscreenshots%2FScreenshot%202023-05-11%20at%2010.32.58.png)

12. Masukan stok

![Screenshot 2023-05-11 at 10.33.55.png](..%2F..%2F..%2FPictures%2Fscreenshots%2FScreenshot%202023-05-11%20at%2010.33.55.png)

13. ✅ Melihat stok kendaraan 

![Screenshot 2023-05-11 at 10.35.01.png](..%2F..%2F..%2F..%2F..%2Fvar%2Ffolders%2Fk8%2Ff4nlqkk16m33_sz_j0m95ws80000gn%2FT%2FTemporaryItems%2FNSIRD_screencaptureui_UDQcDR%2FScreenshot%202023-05-11%20at%2010.35.01.png)

14. Mencatat penjualan kendaraan

![Screenshot 2023-05-11 at 10.36.13.png](..%2F..%2F..%2FPictures%2Fscreenshots%2FScreenshot%202023-05-11%20at%2010.36.13.png)

15. ✅ Melihat semua penjualan kendaraan

![Screenshot 2023-05-11 at 10.37.07.png](..%2F..%2F..%2F..%2F..%2Fvar%2Ffolders%2Fk8%2Ff4nlqkk16m33_sz_j0m95ws80000gn%2FT%2FTemporaryItems%2FNSIRD_screencaptureui_JLzsUJ%2FScreenshot%202023-05-11%20at%2010.37.07.png)

16. ✅ Melihat laporan penjualan per kendaraan

![Screenshot 2023-05-11 at 10.39.35.png](..%2F..%2F..%2FPictures%2Fscreenshots%2FScreenshot%202023-05-11%20at%2010.39.35.png)

## Petunjuk menjalankan unit test

1. Buat database di MongoDB dengan nama `inosoft_sales_test`
2. jalankan test dengan `php artisan test`

![Screenshot 2023-05-11 at 10.41.14.png](..%2F..%2F..%2FPictures%2Fscreenshots%2FScreenshot%202023-05-11%20at%2010.41.14.png)

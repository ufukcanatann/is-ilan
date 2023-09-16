Kurulum adımları;

1- Git ile proje kaynak dosyalarının aktarımı tamamlandıktan sonra "composer install" komutu ile gerekli olan paket kurulumlarını yapıyoruz.

2- Projenin veritabanı işlemleri için sırasıyla;
    a- php artisan migrate
    b- php artisan db:seed
komutlarını çalıştırıyoruz.

3- Projeyi php artisan serve komutu ile başlatıyoruz.

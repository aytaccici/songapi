# Song Api

 Kullanıcıların şarkıları favorilerine atabildiği, silebildiği basit bir API projesidir.   Aşağıdaki teknolojiler kullanışmıştır
  - Laravel 6
  - Mysql
  - Redis
 
### BILGILENDIRME
Proje Docker Containerlari olarak ayağa kaldırabilir. Container ayağa kalktığında dört adet container olusasacak ve aşağıdaki isimleri alacaklar
  - Nginx Sunucu : webserver
  - Laravel Application  : app
  - Mysql : db
  - Redis : redis

Uygulamayı docker ile containerize etmeden önce env.example dosyasınının adını .env olarak değiştirin.  DB ve Redis için ENV'de HOSt alanları container namelerinden dolayı ve redis olarak ayarlanmalı.
### INSTALLATION

```sh
$ docker-compose up -d
$ docker-compose exec app php artisan migrate
$ docker-compose exec app php artisan db:seed
```

Projes dosyasına POSTMAN collection'ı da eklenmiştir . Bu dosyayı postmane import edip URL  değişikliği yaparak postman üzerinden denemeler yapışmıştır.

Eğer Nginx sunucunun yayın yapacağı portları değişrtirmek isterseniz gerekli değişikşikleri docker-compose.yaml dosyasından yapabilirsiniz.
PHP ve NGINX Ayarları için proje ana dizinindeki  : php,nginx klasorlerinden yönetilmektedir Docker Compose ayarları buradan alır. 

License
----

MIT


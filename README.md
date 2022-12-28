# Laravel ile Todo uygulaması
Laravel ile sadece api olarak hazırlanmış olan **Todo** uygulaması.

Bu uyglamanın içerisinde,
* repository pattern
* validation
* resource
* notification
* IoC
* nested route
* middleware
* seeder
* factory
* migration
* model relation
* model scope
* jwt

örnekleri yer almaktadır.


# Nasıl kurulur?
1) Öncelikle bilgisyarınıza bu repositoryi indirmeniz gerekmektedir.
2) Daha sonra `composer install` diyerek vendor dosyasını indirmelisiniz.
3) `php artisan migrate` komutu ile tablolarımızı oluşturuyoruz.
4) `php artisan db:seed` komutu ile tablolarımız içerisine örnek kullanıcılar oluşturuyoruz.
5) `php artisan serve` komutu ile uygulamamızı çalıştıralım.


# Admin bilgileri nelerdir?

* Admin kullanıcı adı: admin@example.com
* Admin şifre: 123456

# Endpointleri nasıl test edebilirim?

Postman üzerinden buradaki bağlantıyı kullanarak endpointleri test edebilirsiniz.
[Postman](https://www.postman.com/hasanablak/workspace/yukotech-todo/overview)


# Backend Application Challenge

Merhaba,

Sizden bu aşamada bir backend uygulama geliştirmenizi beklemekteyiz. Uygulamayı NodeJS, PHP(Laravel) veya GoLang kullanarak arka uç birimiyle geliştirebilirsiniz. Lakin üç dil/altyapı üzerinde geliştirme yapamayacaksanız istediğiniz dili/altyapıyı kullanabilirsiniz fakat üç dilden birinizi kullanmanız faydanıza olacaktır. Yapacağınız uygulama bir ToDo uygulaması olacaktır.

## Yapılacaklar

### Eklenecekler

JWT TOKEN kullanalım
- Veritabanında kayıtlı bir yönetici kullanıcısı bulunmalıdır. Bu kullanıcı uygulama başladığında yoksa doğrudan eklenmelidir.
- Kullanıcı oluşturma ve giriş yapma uç noktaları eklenmelidir.
- ToDo oluşturma, listeleme, düzenleme ve silme uç noktaları eklenmelidir.
- Yetkilendirme mekanizması eklenmelidir.
- Yönetici kullanıcısı bütün kullanıcıları listeleyebilir.
- Eğer kullanıcının rolü yönetici ise istediği kullanıcıya ToDo oluşturabilir ve güncelleyebilir.
- Eğer kullanıcının rolü yönetici ise aradığı kullanıcının ToDo'larını listeleyebilir ve silebilir.
- Silinen ToDo'ları geri alma özelliği olmalıdır.(delete olayı laravelde defaultta varolan sistemi)
- Uygulamanın bir veritabanı kullanması gereklidir.

## Size Ek Puan Kazandırabilecek Kısımlar

- Uygulama içi testlerin yazılması size fayda sağlayacaktır.
- Migration ve Seederların oluşturulması size fayda sağlayacaktır. (Kullandığınız veritabanına göre değişkenlik gösterebilir lakin kullandığınız veritabanındaki karşılığını yapabilirsiniz.)
- Kodu mümkün olduğunca yalın/temiz yazmanız faydanıza olacaktır.
- Uygulamanızın güzel bir mimari üzerine kurulması faydanıza olacaktır.
- Mikroservis yaklaşımını kullanmanız faydanıza olacaktır.
- Uygulamanızı Dockerize etmeniz faydanıza olacaktır.
- Uygulamanız için bir CI/CD pipeline oluşturmanız faydanıza olacaktır.
- Geliştirdiğiniz uygulama için bir dokümantasyon aracı kullanmanız faydanıza olacaktır.
- Atomic ve açıklayıcı başlık içeren commitler atmanız faydanıza olacaktır.
- Herhangi bir tema motoru veya ön uç birim geliştirme altyapısıyla arayüz tasarlamanız faydanıza olacaktır.

Ekleyeceğiniz ek parçalar size artı puan olarak dönecektir. Bu eklediğiniz parçaları not olarak belirtirseniz incelenecektir.

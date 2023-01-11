# :label: Resto-Api-V1

Resto-Api-V1 adalah sebuah project REST API sederhana yang digunakan untuk mengelola sebuah data makanan berdasarkan permintaan klien ke sisi server berdasarkan url & method yang dikirimkan klien, project ini dibangun menggunakan PHP & database Mysql   

# :gear: Panduan untuk menggunakan API

### **Akses API**

Untuk mengakses API, silahkan ketikan `http://localhost/resto-api-v1/nama controller/method controller` pada url browser yang anda gunakan / bisa menggunakan Postman untuk membantu mengakses API tersebut.

### ***Menambahkan Data***
> Nama Controller: Makanan

> Method Controller: addMakanan

> Method: POST

> Body Request: 
  ```       
     ------------------------------
     |      KEY       |    VALUE  |
     -----------------------------
     | nama_makanan   |   Varchar |
     | harga_makanan  |   Varchar |
     ------------------------------
     
  ```

Penggunaan pada Postman dikirimkan pada Body > form-data.

### ***Menampilkan Seluruh Data***

> Nama Controller: Makanan

> Method Controller: getMakanan

> Method: GET

### ***Menampilkan Detail Data Berdasarkan Id***

> Nama Controller: Makanan

> Method Controller: getMakananById

> Id pencarian: number

> Method: GET

> Url: `http://localhost/resto-api-v1/nama controller/method controller/Id pencarian`

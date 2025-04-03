# Quản lý cửa hàng cho thuê sách
 Dự án xây dựng trang web quản lý cho cửa hàng cho thuê sách.

## Cài đặt

Hướng dẫn cài đặt cho dự án:
1. Clone repo này:
```git clone git@github.com:Schemple/book-rental-store.git```
hoặc ```git clone https://github.com/Schemple/book-rental-store.git```
2. Cài đặt Docker Descktop https://www.docker.com/products/docker-desktop/ hoặc Docker Engine
3. Bật command line trong folder repo đã clone, thực hiện lệnh ```docker compose up``` để build container
4. Sau khi các container đã bắt đầu thực hiện cài các dependencies:
```docker exec app composer install```
5. Chỉnh sửa .env cho phù hợp.
6. Bắt đầu sử dụng dự án từ local.


Hệ thống web quản lý và tra cứu điểm thi THPT Quốc gia 2024, được xây dựng bằng Laravel 12 với kiến trúc OOP và Design Patterns.

## 📋 Yêu cầu hệ thống

- PHP >= 8.2
- Composer
- MySQL >= 8.0 hoặc SQLite
- Node.js & NPM (tùy chọn, cho frontend assets)

## 🚀 Hướng dẫn cài đặt và chạy project local

### Bước 1: Clone project

```bash
git clone https://github.com/hoangminh1252010/goldenowl-test-hoangminh
cd test-php/backend
```

### Bước 2: Cài đặt dependencies

```bash
# Cài đặt PHP dependencies
composer install

# Cài đặt NPM dependencies (nếu cần)
npm install
```

### Bước 3: Cấu hình môi trường

```bash
# Copy file .env.example thành .env
copy .env.example .env

# Hoặc trên Linux/Mac
cp .env.example .env
```

### Bước 4: Cấu hình database trong file `.env`

**Nếu dùng MySQL:**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=score_system
DB_USERNAME=root
DB_PASSWORD=your_password
```

**Nếu dùng SQLite**
```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

Nếu dùng SQLite, tạo file database:
```bash
touch database/database.sqlite
```

### Bước 5: Tạo Application Key

```bash
php artisan key:generate
```

### Bước 6: Chạy Migrations

```bash
# Tạo các bảng trong database
php artisan migrate

# Hoặc reset và chạy lại (xóa dữ liệu cũ)
php artisan migrate:fresh
```

### Bước 7: Import dữ liệu điểm thi


- Đặt file CSV đã có sẵn tại: `storage/app/data/diem_thi_thpt_2024.csv`
- Tạo thư mục nếu chưa có:
  ```bash
  mkdir -p storage/app/data
  ```

**Chạy Seeder:**
```bash
# Chạy seeder để import dữ liệu từ CSV

php artisan db:seed
```

### Bước 8: Khởi động server

```bash
php artisan serve
```

Server sẽ chạy tại: `http://127.0.0.1:8000`

### Bước 9: Truy cập ứng dụng

Mở trình duyệt và truy cập:
- **Trang chủ (Dashboard):** http://127.0.0.1:8000
- **Tra cứu điểm thi:** http://127.0.0.1:8000/tra-cuu-diem
- **Báo cáo phân loại:** http://127.0.0.1:8000/bao-cao-phan-loai
- **Thống kê biểu đồ:** http://127.0.0.1:8000/thong-ke-bieu-do
- **Top 10 Khối A:** http://127.0.0.1:8000/top-10-khoi-a

## 📁 Cấu trúc dự án

```
backend/
├── app/
│   ├── Http/Controllers/     # Controllers
│   ├── Models/                # Eloquent Models
│   └── Services/               # Business Logic Services
├── database/
│   ├── migrations/            # Database migrations
│   └── seeders/               # Database seeders
├── resources/
│   └── views/                 # Blade templates
├── routes/
│   └── web.php                # Routes của webweb
└── storage/
    └── app/
        └── data/              # File CSV dữ liệu đã được cho sẵnsẵn
```

## 🛠️ Các lệnh Artisan hữu ích

```bash
# Chạy migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Reset và chạy lại migrations
php artisan migrate:fresh

# Chạy seeders
php artisan db:seed

# Chạy seeder cụ thể
php artisan db:seed --class=ScoreSeeder

# Xóa cache
php artisan cache:clear
php artisan config:clear
php artisan view:clear

# Tạo model mới
php artisan make:model ModelName

# Tạo controller mới
php artisan make:controller ControllerName
```


## 🔧 Xử lý lỗi thường gặp

### Lỗi: "CSV file not found"
- Đảm bảo file CSV ở đúng vị trí: `storage/app/data/diem_thi_thpt_2024.csv`
- Tạo thư mục nếu chưa có: `mkdir -p storage/app/data`

### Lỗi: "SQLSTATE[HY000] [2002] Connection refused"
- Kiểm tra MySQL đã chạy chưa
- Kiểm tra thông tin kết nối trong file `.env`

### Lỗi: "Class 'App\Services\ScoreService' not found"
- Chạy: `composer dump-autoload`

### Lỗi: "Permission denied" trên storage
```bash
# Linux/Mac
chmod -R 775 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# Windows (nếu cần)
icacls storage /grant Users:F /T
```

### Lỗi: "Incorrect double value: '' for column"
- File CSV có ô trống, seeder đã xử lý tự động chuyển `''` thành `null`
- Đảm bảo seeder đang sử dụng method `convertToFloat()`


**Lưu ý:**
- Dòng đầu tiên là header (sẽ được bỏ qua)
- Các ô trống sẽ được chuyển thành `null` tự động
- File phải được đặt tại: `storage/app/data/diem_thi_thpt_2024.csv`


## 📦 Dependencies chính

- **Laravel Framework**: ^12.0
- **PHP**: ^8.2
- **MySQL**: 8.0+ hoặc SQLite
- **Chart.js**: CDN (cho biểu đồ)



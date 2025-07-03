# Hệ thống Quản lý Điểm danh Sinh viên

---

## 1. Giới thiệu
Hệ thống Quản lý Điểm danh Sinh viên (Student Attendance System) là một nền tảng web hiện đại giúp tự động hóa quy trình điểm danh, quản lý lớp học, lịch học và báo cáo thống kê cho các trường học, trung tâm đào tạo. Dự án hướng tới sự minh bạch, tiện lợi và tối ưu hóa công tác quản lý giáo dục.

**Lợi ích nổi bật:**
- Tiết kiệm thời gian cho giáo viên và quản trị viên.
- Minh bạch hóa dữ liệu điểm danh, giảm gian lận.
- Sinh viên chủ động theo dõi lịch học, trạng thái điểm danh.
- Báo cáo tổng hợp, thống kê trực quan.

---

## 2. Kiến trúc hệ thống

```
+-------------------+        +-------------------+        +-------------------+
|   Giao diện web   | <----> |   Laravel Backend | <----> |    CSDL MySQL     |
+-------------------+        +-------------------+        +-------------------+
        |                        |                               |
        |                        |                               |
        |                        |                               |
        |                        |                               |
        v                        v                               v
  Người dùng:           Xử lý nghiệp vụ, xác thực,         Lưu trữ dữ liệu:
  - Sinh viên           phân quyền, API, MVC               - users, students,
  - Giáo viên           - Controllers, Models, Views        - teachers, classes,
  - Quản trị viên       - Middleware bảo mật                - sessions, attendance
```

**Các thành phần chính:**
- **Frontend:** Blade template, Bootstrap 5, Vite (tích hợp JS, CSS).
- **Backend:** Laravel 10, RESTful Controllers, Middleware phân quyền.
- **Database:** MySQL/MariaDB, chuẩn hóa dữ liệu, quan hệ rõ ràng.

---

## 3. Vai trò & Chức năng

| Vai trò         | Chức năng chính                                                                 |
|-----------------|---------------------------------------------------------------------------------|
| **Sinh viên**   | - Xem thông tin cá nhân, lịch học, lịch sử điểm danh                           |
|                 | - Tra cứu trạng thái điểm danh từng buổi                                        |
|                 | - Nhận thông báo từ giáo viên/quản trị viên                                     |
| **Giáo viên**   | - Quản lý lớp học, điểm danh sinh viên từng buổi                                |
|                 | - Xem lịch dạy, thống kê điểm danh                                              |
|                 | - Gửi thông báo cho sinh viên                                                    |
| **Quản trị viên**| - Quản lý tài khoản sinh viên, giáo viên                                        |
|                 | - Phân quyền, tạo lớp học, quản lý dữ liệu điểm danh                            |
|                 | - Xem báo cáo tổng hợp toàn hệ thống                                            |

**Luồng nghiệp vụ tiêu biểu:**
- Đăng nhập → Phân quyền → Truy cập dashboard phù hợp.
- Giáo viên tạo buổi học, điểm danh → Sinh viên xem trạng thái điểm danh.
- Quản trị viên quản lý tài khoản, lớp học, xuất báo cáo.

---

## 4. Cấu trúc dữ liệu chính

### 4.1. User (Tài khoản đăng nhập)
| Trường         | Kiểu      | Ý nghĩa                |
|--------------- |-----------|------------------------|
| user_id        | int       | Khóa chính             |
| username       | string    | Tên đăng nhập          |
| email          | string    | Email                  |
| password       | string    | Mật khẩu (hash)        |
| role           | string    | admin/teacher/student  |

### 4.2. Sinh viên (students)
| Trường         | Kiểu      | Ý nghĩa                |
|--------------- |-----------|------------------------|
| student_id     | int       | Khóa chính             |
| user_id        | int       | Liên kết User          |
| ...            | ...       | Thông tin cá nhân      |

### 4.3. Giáo viên (teachers)
| Trường         | Kiểu      | Ý nghĩa                |
|--------------- |-----------|------------------------|
| teacher_id     | int       | Khóa chính             |
| user_id        | int       | Liên kết User          |
| ...            | ...       | Thông tin cá nhân      |

### 4.4. Lớp học (classes)
| Trường         | Kiểu      | Ý nghĩa                |
|--------------- |-----------|------------------------|
| class_id       | int       | Khóa chính             |
| course_id      | int       | Môn học                |
| teacher_id     | int       | Giáo viên phụ trách    |
| ...            | ...       | ...                    |

### 4.5. Buổi học (sessions)
| Trường         | Kiểu      | Ý nghĩa                |
|--------------- |-----------|------------------------|
| session_id     | int       | Khóa chính             |
| class_id       | int       | Lớp học                |
| session_date   | date      | Ngày học               |
| end_time       | time      | Kết thúc               |

### 4.6. Điểm danh (attendance_records)
| Trường         | Kiểu      | Ý nghĩa                |
|--------------- |-----------|------------------------|
| attendance_id  | int       | Khóa chính             |
| student_id     | int       | Sinh viên              |
| session_id     | int       | Buổi học               |
| status         | string    | Trạng thái (có/vắng)   |

---

## 5. Bảo mật & Phân quyền
- **Xác thực:** Sử dụng Laravel Auth, hash mật khẩu (bcrypt).
- **Phân quyền:** Middleware kiểm tra vai trò (admin, teacher, student) trước khi truy cập route.
- **Bảo vệ dữ liệu:** CSRF, XSS, kiểm soát truy cập dữ liệu theo vai trò.
- **Quản lý session:** Sử dụng session Laravel, timeout hợp lý.
- **Mã hóa:** Sử dụng AES-256-CBC cho các thông tin nhạy cảm (config/app.php).

---

## 6. Hướng dẫn cài đặt & phát triển

### 6.1. Yêu cầu hệ thống
- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js & npm

### 6.2. Cài đặt nhanh
```bash
# 1. Clone source code
$ git clone <repo-url>
$ cd StudentAttendance

# 2. Cài đặt backend
$ composer install

# 3. Cài đặt frontend
$ npm install
$ npm run build # hoặc npm run dev

# 4. Cấu hình môi trường
$ cp .env.example .env
# Sửa thông tin DB trong .env
$ php artisan key:generate
$ php artisan migrate

# 5. Khởi động server
$ php artisan serve
# Truy cập http://localhost:8000
```

### 6.3. Lệnh quản trị hữu ích
- Xóa cache: `php artisan cache:clear`, `php artisan view:clear`
- Tạo dữ liệu mẫu: `php artisan db:seed`
- Kiểm thử: `php artisan test`

---

## 7. Đóng góp & liên hệ
- **Đóng góp:** Vui lòng tạo pull request hoặc issue trên Github.
- **Tài liệu chi tiết:** Xem thêm trong thư mục `docs/`.
- **Liên hệ:** [Quản trị viên dự án](mailto:admin@example.com)

---

> © 2024 Student Attendance System. All rights reserved. 
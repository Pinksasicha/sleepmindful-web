# ใช้ PHP 8 เวอร์ชัน CLI
FROM php:8.1-cli

# ตั้ง working directory
WORKDIR /app

# คัดลอกไฟล์ทั้งหมดจาก repository ไปใน container
COPY . /app

# เปิด port 10000 สำหรับ Render
EXPOSE 10000

# สั่งให้รัน PHP built-in server บน port 10000
CMD ["php", "-S", "0.0.0.0:10000"]

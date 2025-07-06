FROM php:8.1-cli

# ติดตั้ง mysqli เพื่อให้ใช้ฐานข้อมูล MySQL ได้
RUN docker-php-ext-install mysqli

# ตั้งโฟลเดอร์ทำงาน
WORKDIR /app

# คัดลอกไฟล์ทั้งหมดจาก repo เข้า container
COPY . /app

# เปิดพอร์ตให้ Render เข้าถึง
EXPOSE 10000

# รัน PHP server ที่โฟลเดอร์ root
CMD ["php", "-S", "0.0.0.0:10000", "-t", "."]

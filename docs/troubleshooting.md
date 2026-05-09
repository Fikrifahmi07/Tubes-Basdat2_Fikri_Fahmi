# Troubleshooting

## Error: PHP version must be 8.2 or higher
Cause:
PHP masih versi lama

Solution:
Upgrade XAMPP ke versi terbaru

---

## Error: The framework needs extension intl
Cause:
Extension intl belum aktif

Solution:
Enable extension=intl pada php.ini lalu restart Apache

---

## Error: MySQL shutdown unexpectedly
Cause:
MariaDB/XAMPP data corruption setelah upgrade

Solution:
Reset folder mysql/data menggunakan backup bawaan XAMPP

---


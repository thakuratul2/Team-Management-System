# Team Management System By Atul Pratap Singh

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="#"><img src="https://img.shields.io/badge/build-passing-brightgreen" alt="Build Status"></a>
<a href="#"><img src="https://img.shields.io/badge/version-1.0.0-blue" alt="Version"></a>
<a href="#"><img src="https://img.shields.io/badge/license-MIT-green" alt="License"></a>
</p>

## 📌 About the Project
This is a **Team Management System** built with **Laravel** that combines **HR Management**, **Payroll Management**, and **Attendance Tracking** using fingerprint-based biometric devices. The system automates employee attendance, payroll calculation, leave management, and reporting, providing a complete HR & payroll solution.

### Key Features
- **Authentication & Roles** — Super Admin, HR, Manager, Employee
- **Employee Management** — Profile, documents, salary structure, bank details
- **Attendance Management**
  - Fingerprint hardware integration (auto punch in/out)
  - Manual punch with HR approval
  - Shift scheduling & overtime calculation
- **Payroll Management**
  - Salary structure (basic, allowances, deductions, taxes)
  - Automatic payroll calculation based on attendance
  - Payslip generation (PDF/Excel)
- **Leave Management** — Request & approval workflows
- **Reports & Dashboard** — Payroll, attendance, late arrivals
- **Device Management** — Add & configure biometric devices
- **Audit Logs & Notifications**

## 🛠 Tech Stack
- Laravel 10+
- MySQL / MariaDB
- Redis (Queues & Cache)
- Bootstrap + Blade Templates
- Device SDK / API Integration (Fingerprint)
- Docker for Local Development

## 🚀 Getting Started
**1. Clone Repository**
```bash
git clone https://github.com/your-repo/team-management-system.git
cd team-management-system
```

**2. Install Dependencies**
```bash
composer install
```
**3. Configure Environment**
Copy the `.env.example` file to `.env` and update the database and other configurations:
```bash
cp .env.example .env
php artisan key:generate
php artisan migrate --seed
```

**4. Start the Application**
```bash
php artisan serve
```

### Attendance Device Integration

1. The system supports fingerprint scanners using either:

2. Webhook push from device agent

3. Polling from device API

4. Manual punch by HR

### Device Configuration
- Configure device IP, port, and credentials in the admin panel.
- Ensure the device is connected to the network and accessible.
- Use the device SDK or API documentation for integration details.
### Example Device SDK Usage
```php
// Example code to fetch attendance from a fingerprint device
$device = new FingerprintDevice('
192.168.1.
100', 'username', 'password');
$attendance = $device->getAttendance();
foreach ($attendance as $record) {
    // Process attendance record
    Attendance::create([
        'employee_id' => $record->employeeId,
        'timestamp' => $record->timestamp,
        'status' => $record->status,
    ]);
}
```

### License

This project is open-source and available under the MIT License.
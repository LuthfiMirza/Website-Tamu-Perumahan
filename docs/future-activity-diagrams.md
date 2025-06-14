# Activity Diagrams - Fitur Masa Depan Sistem Admin Tamu Perumahan

## 1. Activity Diagram - Registrasi Warga Baru

```mermaid
graph TD
    A[Start] --> B[Admin Klik Tambah Warga]
    B --> C[Buka Form Registrasi Warga]
    C --> D[Input Data Pribadi]
    D --> E[Input Nomor Rumah/Blok]
    E --> F[Input Kontak]
    F --> G[Upload Foto KTP]
    G --> H[Set Status Warga]
    H --> I[Klik Submit]
    I --> J{Validasi Data}
    J -->|Invalid| K[Tampilkan Error]
    K --> D
    J -->|Valid| L{Nomor Rumah Tersedia?}
    L -->|No| M[Error: Rumah Sudah Terisi]
    M --> E
    L -->|Yes| N[Simpan Data Warga]
    N --> O[Generate User Account]
    O --> P[Send Welcome Email]
    P --> Q[Catat Log Aktivitas]
    Q --> R[Tampilkan Success Message]
    R --> S[End]
```

## 2. Activity Diagram - Persetujuan Tamu oleh Warga

```mermaid
graph TD
    A[Start] --> B[Warga Login ke System]
    B --> C[Klik Daftarkan Tamu]
    C --> D[Input Data Tamu]
    D --> E[Input Nama Tamu]
    E --> F[Input Nomor Telepon]
    F --> G[Pilih Tanggal Kunjungan]
    G --> H[Set Jam Kunjungan]
    H --> I[Input Keperluan]
    I --> J[Klik Submit]
    J --> K{Validasi Data}
    K -->|Invalid| L[Tampilkan Error]
    L --> D
    K -->|Valid| M[Simpan Persetujuan]
    M --> N[Generate QR Code]
    N --> O[Send QR ke Tamu via SMS/WA]
    O --> P[Notifikasi ke Satpam]
    P --> Q[Catat Log Aktivitas]
    Q --> R[Tampilkan Success & QR Code]
    R --> S[End]
```

## 3. Activity Diagram - Verifikasi Tamu dengan QR Code

```mermaid
graph TD
    A[Start] --> B[Tamu Tiba di Gerbang]
    B --> C[Tamu Tunjukkan QR Code]
    C --> D[Satpam Scan QR Code]
    D --> E{QR Code Valid?}
    E -->|No| F[Tampilkan Error]
    F --> G[Tamu Hubungi Warga]
    G --> H[Manual Verification]
    E -->|Yes| I[Load Data Persetujuan]
    I --> J{Tanggal/Jam Sesuai?}
    J -->|No| K[Tampilkan Peringatan]
    K --> L[Konfirmasi Manual]
    J -->|Yes| M[Auto Fill Form Tamu]
    L --> M
    H --> M
    M --> N[Ambil Foto Tamu]
    N --> O[Input Plat Nomor]
    O --> P[Konfirmasi Entry]
    P --> Q[Simpan Data Tamu]
    Q --> R[Update Status Persetujuan]
    R --> S[Notifikasi ke Warga]
    S --> T[Catat Log Aktivitas]
    T --> U[End]
```

## 4. Activity Diagram - Notifikasi Real-time

```mermaid
graph TD
    A[Event Triggered] --> B{Event Type}
    B -->|Tamu Masuk| C[Prepare Tamu Masuk Notification]
    B -->|Tamu Keluar| D[Prepare Tamu Keluar Notification]
    B -->|Emergency| E[Prepare Emergency Alert]
    B -->|System Alert| F[Prepare System Notification]
    
    C --> G[Get Warga Data]
    D --> G
    E --> H[Get All Users]
    F --> I[Get Admin Users]
    
    G --> J[Send to Specific Warga]
    H --> K[Broadcast to All]
    I --> L[Send to Admins]
    
    J --> M[Push via WebSocket]
    K --> M
    L --> M
    
    M --> N[Send Email/SMS if Critical]
    N --> O[Log Notification]
    O --> P[Update Notification Status]
    P --> Q[End]
```

## 5. Activity Diagram - Booking Fasilitas

```mermaid
graph TD
    A[Start] --> B[Warga Login]
    B --> C[Pilih Menu Booking Fasilitas]
    C --> D[Lihat Fasilitas Tersedia]
    D --> E[Pilih Fasilitas]
    E --> F[Pilih Tanggal]
    F --> G[Pilih Jam]
    G --> H{Slot Tersedia?}
    H -->|No| I[Tampilkan Slot Alternatif]
    I --> G
    H -->|Yes| J[Input Keperluan]
    J --> K[Konfirmasi Booking]
    K --> L[Proses Pembayaran (jika ada)]
    L --> M{Pembayaran Berhasil?}
    M -->|No| N[Tampilkan Error Payment]
    N --> L
    M -->|Yes| O[Simpan Booking]
    O --> P[Generate Booking Code]
    P --> Q[Send Konfirmasi]
    Q --> R[Notifikasi ke Admin]
    R --> S[Catat Log Aktivitas]
    S --> T[End]
```

## 6. Activity Diagram - Manajemen Komplain

```mermaid
graph TD
    A[Start] --> B[Warga Login]
    B --> C[Klik Buat Komplain]
    C --> D[Pilih Kategori Komplain]
    D --> E[Input Deskripsi]
    E --> F[Upload Foto (opsional)]
    F --> G[Set Prioritas]
    G --> H[Submit Komplain]
    H --> I[Generate Ticket Number]
    I --> J[Assign ke Admin/Teknisi]
    J --> K[Send Notifikasi ke Assignee]
    K --> L[Update Status: Open]
    L --> M[Catat Log]
    M --> N{Admin Response}
    N -->|In Progress| O[Update Status: In Progress]
    N -->|Need Info| P[Request Additional Info]
    N -->|Resolved| Q[Update Status: Resolved]
    O --> R[Notifikasi ke Warga]
    P --> R
    Q --> S[Request Warga Confirmation]
    R --> T{Warga Satisfied?}
    S --> T
    T -->|No| U[Reopen Ticket]
    U --> N
    T -->|Yes| V[Close Ticket]
    V --> W[End]
```

## 7. Activity Diagram - Emergency Alert System

```mermaid
graph TD
    A[Emergency Detected] --> B{Emergency Type}
    B -->|Manual Trigger| C[User Clicks Panic Button]
    B -->|System Trigger| D[Sensor/System Alert]
    B -->|Security Breach| E[Unauthorized Access]
    
    C --> F[Confirm Emergency]
    D --> G[Auto Validate Alert]
    E --> G
    
    F --> H{Confirmed?}
    H -->|No| I[Cancel Alert]
    H -->|Yes| J[Activate Emergency Protocol]
    G --> J
    
    J --> K[Send Alert to All Users]
    K --> L[Notify Security Team]
    L --> M[Notify Management]
    M --> N[Log Emergency Event]
    N --> O[Activate Emergency Procedures]
    O --> P[Monitor Response]
    P --> Q{Emergency Resolved?}
    Q -->|No| R[Escalate Alert]
    R --> P
    Q -->|Yes| S[Deactivate Alert]
    S --> T[Send All Clear]
    T --> U[Log Resolution]
    U --> V[End]
    
    I --> W[End]
```

## 8. Activity Diagram - Mobile App Sync

```mermaid
graph TD
    A[Mobile App Opened] --> B[Check Network Connection]
    B --> C{Connected?}
    C -->|No| D[Show Offline Mode]
    D --> E[Load Cached Data]
    C -->|Yes| F[Authenticate User]
    F --> G{Auth Success?}
    G -->|No| H[Show Login Screen]
    G -->|Yes| I[Sync Data]
    I --> J[Download New Data]
    J --> K[Upload Pending Changes]
    K --> L[Update Local Cache]
    L --> M[Refresh UI]
    M --> N[Enable Real-time Updates]
    N --> O{New Data Available?}
    O -->|Yes| P[Push Notification]
    P --> Q[Update UI]
    O -->|No| R[Wait for Changes]
    Q --> R
    R --> S{App Active?}
    S -->|Yes| O
    S -->|No| T[Background Sync]
    T --> U[End]
    E --> V[Limited Functionality]
    V --> U
    H --> W[User Login]
    W --> F
```

## 9. Activity Diagram - Data Backup & Restore

```mermaid
graph TD
    A[Scheduled Backup Time] --> B[Check System Status]
    B --> C{System Busy?}
    C -->|Yes| D[Wait 5 Minutes]
    D --> B
    C -->|No| E[Start Backup Process]
    E --> F[Lock Database]
    F --> G[Export Database]
    G --> H[Backup Files]
    H --> I[Compress Backup]
    I --> J[Upload to Cloud Storage]
    J --> K{Upload Success?}
    K -->|No| L[Retry Upload]
    L --> M{Max Retries?}
    M -->|No| J
    M -->|Yes| N[Log Backup Failure]
    K -->|Yes| O[Verify Backup Integrity]
    O --> P{Backup Valid?}
    P -->|No| Q[Log Corruption Error]
    P -->|Yes| R[Update Backup Log]
    R --> S[Clean Old Backups]
    S --> T[Unlock Database]
    T --> U[Send Success Notification]
    U --> V[End]
    
    N --> T
    Q --> T
```

## 10. Activity Diagram - Analytics & Reporting

```mermaid
graph TD
    A[Generate Report Request] --> B{Report Type}
    B -->|Daily| C[Collect Daily Data]
    B -->|Weekly| D[Collect Weekly Data]
    B -->|Monthly| E[Collect Monthly Data]
    B -->|Custom| F[Collect Custom Range Data]
    
    C --> G[Process Visitor Stats]
    D --> G
    E --> G
    F --> G
    
    G --> H[Calculate Peak Hours]
    H --> I[Analyze Visitor Types]
    I --> J[Generate Trends]
    J --> K[Create Charts/Graphs]
    K --> L{Export Format}
    L -->|PDF| M[Generate PDF Report]
    L -->|Excel| N[Generate Excel Report]
    L -->|Dashboard| O[Update Dashboard]
    
    M --> P[Email Report]
    N --> P
    O --> Q[Refresh Analytics]
    
    P --> R[Log Report Generation]
    Q --> R
    R --> S[End]
```
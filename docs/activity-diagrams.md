# Activity Diagrams - Sistem Admin Tamu Perumahan

## 1. Activity Diagram - Login Satpam

```mermaid
graph TD
    A[Start] --> B[Buka Halaman Login]
    B --> C[Input Email & Password]
    C --> D{Validasi Data}
    D -->|Invalid| E[Tampilkan Error Message]
    E --> C
    D -->|Valid| F[Cek Kredensial di Database]
    F --> G{Kredensial Benar?}
    G -->|No| H[Tampilkan Error Login]
    H --> C
    G -->|Yes| I[Buat Session]
    I --> J[Redirect ke Dashboard]
    J --> K[Tampilkan Welcome Message]
    K --> L[End]
```

## 2. Activity Diagram - Tambah Tamu Baru

```mermaid
graph TD
    A[Start] --> B[Satpam Klik Tambah Tamu]
    B --> C[Buka Form Tambah Tamu]
    C --> D[Input Data Tamu]
    D --> E[Upload Foto Tamu]
    E --> F[Pilih Jenis Tamu]
    F --> G[Input Plat Nomor]
    G --> H[Set Tanggal & Jam Masuk]
    H --> I[Input Tujuan]
    I --> J[Klik Submit]
    J --> K{Validasi Form}
    K -->|Invalid| L[Tampilkan Error Validasi]
    L --> D
    K -->|Valid| M[Simpan Foto ke Storage]
    M --> N[Simpan Data ke Database]
    N --> O[Catat Log Aktivitas]
    O --> P[Tampilkan Success Message]
    P --> Q[Redirect ke Daftar Tamu]
    Q --> R[End]
```

## 3. Activity Diagram - Logout Tamu

```mermaid
graph TD
    A[Start] --> B[Satpam Lihat Daftar Tamu]
    B --> C[Pilih Tamu yang Akan Logout]
    C --> D[Klik Tombol Logout]
    D --> E[Tampilkan Konfirmasi Dialog]
    E --> F{Konfirmasi Logout?}
    F -->|No| G[Batal Logout]
    G --> B
    F -->|Yes| H[Update Status Tamu]
    H --> I[Set Jam Keluar]
    I --> J[Update Posisi ke 'Sudah Keluar']
    J --> K[Catat Log Aktivitas]
    K --> L[Tampilkan Success Message]
    L --> M[Refresh Daftar Tamu]
    M --> N[End]
```

## 4. Activity Diagram - Export Data Tamu

```mermaid
graph TD
    A[Start] --> B[Satpam Buka Daftar Tamu]
    B --> C[Klik Tombol Export]
    C --> D[Pilih Format Export]
    D --> E{Format Export}
    E -->|PDF| F[Generate PDF]
    E -->|Excel| G[Generate Excel]
    F --> H[Set Layout Landscape]
    G --> I[Create Excel Sheet]
    H --> J[Load Data Tamu]
    I --> J
    J --> K[Apply Filter Jika Ada]
    K --> L[Format Data]
    L --> M[Generate File]
    M --> N[Download File]
    N --> O[End]
```

## 5. Activity Diagram - Dashboard Monitoring

```mermaid
graph TD
    A[Start] --> B[Satpam Login Berhasil]
    B --> C[Load Dashboard]
    C --> D[Hitung Tamu Hari Ini]
    D --> E[Hitung Tamu Masuk]
    E --> F[Hitung Tamu Keluar]
    F --> G[Load Jadwal Satpam]
    G --> H[Load Tamu Terbaru]
    H --> I[Tampilkan Statistik]
    I --> J[Tampilkan Jadwal 3 Hari]
    J --> K[Tampilkan Tabel Tamu Terbaru]
    K --> L{Auto Refresh?}
    L -->|Yes| M[Wait 30 Detik]
    M --> D
    L -->|No| N[End]
```

## 6. Activity Diagram - Admin Panel (Filament)

```mermaid
graph TD
    A[Start] --> B[Admin Login ke Filament]
    B --> C{Pilih Menu}
    C -->|Data Tamu| D[Kelola Data Tamu]
    C -->|User Management| E[Kelola User]
    C -->|Log Aktivitas| F[Lihat Log]
    C -->|Jadwal Satpam| G[Kelola Jadwal]
    
    D --> D1[CRUD Tamu]
    D1 --> D2[Filter & Search]
    D2 --> D3[Bulk Actions]
    
    E --> E1[CRUD User]
    E1 --> E2[Assign Roles]
    E2 --> E3[Manage Permissions]
    
    F --> F1[View Activity Logs]
    F1 --> F2[Filter by User/Date]
    
    G --> G1[CRUD Jadwal]
    G1 --> G2[Set Shift Satpam]
    
    D3 --> H[End]
    E3 --> H
    F2 --> H
    G2 --> H
```

## 7. Activity Diagram - Search & Filter Tamu

```mermaid
graph TD
    A[Start] --> B[Buka Daftar Tamu]
    B --> C{Pilih Action}
    C -->|Search| D[Input Keyword]
    C -->|Filter| E[Pilih Filter]
    C -->|View All| F[Load All Data]
    
    D --> G[Search by Plat/Jenis Tamu]
    E --> H{Jenis Filter}
    H -->|Today| I[Filter Tamu Hari Ini]
    H -->|Status| J[Filter by Posisi]
    H -->|Date Range| K[Filter by Tanggal]
    
    G --> L[Execute Query]
    I --> L
    J --> L
    K --> L
    F --> L
    
    L --> M[Display Results]
    M --> N[Pagination]
    N --> O{More Actions?}
    O -->|Yes| C
    O -->|No| P[End]
```

## 8. Activity Diagram - Edit Data Tamu

```mermaid
graph TD
    A[Start] --> B[Pilih Tamu dari Daftar]
    B --> C[Klik Edit]
    C --> D[Load Data Tamu]
    D --> E[Tampilkan Form Edit]
    E --> F[Ubah Data yang Diperlukan]
    F --> G[Klik Update]
    G --> H{Validasi Data}
    H -->|Invalid| I[Tampilkan Error]
    I --> F
    H -->|Valid| J[Update Database]
    J --> K[Catat Log Aktivitas]
    K --> L[Tampilkan Success Message]
    L --> M[Redirect ke Daftar]
    M --> N[End]
```

## 9. Activity Diagram - Sistem Keseluruhan

```mermaid
graph TD
    A[Start System] --> B{User Type}
    B -->|Satpam| C[Satpam Login]
    B -->|Admin| D[Admin Login]
    
    C --> E[Satpam Dashboard]
    E --> F{Satpam Actions}
    F -->|Tambah Tamu| G[Process Tambah Tamu]
    F -->|Lihat Daftar| H[Process Daftar Tamu]
    F -->|Export Data| I[Process Export]
    F -->|Logout Tamu| J[Process Logout Tamu]
    
    D --> K[Admin Panel]
    K --> L{Admin Actions}
    L -->|Manage Tamu| M[CRUD Tamu]
    L -->|Manage Users| N[CRUD Users]
    L -->|View Logs| O[View Activity Logs]
    L -->|Manage Schedule| P[CRUD Jadwal]
    
    G --> Q[Log Activity]
    H --> Q
    I --> Q
    J --> Q
    M --> Q
    N --> Q
    O --> Q
    P --> Q
    
    Q --> R[Update Dashboard]
    R --> S[End Process]
```

## 10. Activity Diagram - Error Handling

```mermaid
graph TD
    A[System Error Occurred] --> B{Error Type}
    B -->|Validation Error| C[Display Form Errors]
    B -->|Database Error| D[Log Error]
    B -->|File Upload Error| E[Display Upload Error]
    B -->|Authentication Error| F[Redirect to Login]
    B -->|Authorization Error| G[Display 403 Page]
    
    C --> H[User Corrects Input]
    D --> I[Display Generic Error]
    E --> J[User Retries Upload]
    F --> K[User Re-authenticates]
    G --> L[User Contacts Admin]
    
    H --> M[Retry Operation]
    I --> N[Admin Investigates]
    J --> M
    K --> M
    L --> N
    
    M --> O{Operation Success?}
    O -->|Yes| P[Continue Normal Flow]
    O -->|No| A
    
    N --> Q[Fix System Issue]
    Q --> P
    P --> R[End]
```
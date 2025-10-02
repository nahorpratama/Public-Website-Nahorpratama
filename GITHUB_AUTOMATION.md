# 🤖 Sistem Otomatisasi GitHub

Dokumentasi untuk sistem otomatis commit dan push ke GitHub.

## 🚀 Cara Penggunaan

### 1. Script Manual (Recommended)
```bash
# Commit dan push dengan pesan custom
./auto-commit-push.sh "Pesan commit Anda"

# Commit dan push dengan pesan otomatis (timestamp)
./auto-commit-push.sh
```

### 2. Git Alias (Cepat)
```bash
# Menggunakan alias git acp
git acp "Pesan commit Anda"
```

### 3. Monitoring Otomatis
```bash
# Mulai monitoring perubahan file (berjalan di background)
./watch-changes.sh
```

### 4. Git Hook (Otomatis)
Git hook sudah diaktifkan dan akan otomatis push setiap kali ada commit.

## 📋 Fitur

- ✅ **Auto Add**: Otomatis menambahkan semua perubahan
- ✅ **Auto Commit**: Commit dengan pesan yang Anda tentukan
- ✅ **Auto Push**: Otomatis push ke GitHub
- ✅ **Error Handling**: Menampilkan status sukses/gagal
- ✅ **Color Output**: Output berwarna untuk kemudahan membaca
- ✅ **File Monitoring**: Memantau perubahan file secara real-time

## 🔧 Troubleshooting

### Jika push gagal:
1. Cek koneksi internet
2. Cek token GitHub
3. Cek apakah ada konflik dengan remote

### Jika script tidak bisa dijalankan:
```bash
chmod +x auto-commit-push.sh
chmod +x watch-changes.sh
```

## 📝 Tips

- Gunakan pesan commit yang deskriptif
- Cek status dengan `git status` sebelum commit
- Monitor log dengan `git log --oneline -5`

---
*Dibuat untuk memastikan semua perubahan selalu tersimpan di GitHub* 🎯
# 🎨 Panduan Mengganti Background About Section

## Cara Mengganti Background

### 1. **Menggunakan Preset yang Sudah Tersedia**

Ganti class pada HTML di file `index.html` baris 849:

```html
<!-- Ganti dari: -->
<div class="content-section about-section-professional bg-construction">

<!-- Menjadi salah satu dari: -->
<div class="content-section about-section-professional bg-project1">
<div class="content-section about-section-professional bg-project2">
<div class="content-section about-section-professional bg-work1">
<div class="content-section about-section-professional bg-work2">
<div class="content-section about-section-professional bg-work3">
<div class="content-section about-section-professional bg-work4">
<div class="content-section about-section-professional bg-work5">
<div class="content-section about-section-professional bg-pattern1">
<div class="content-section about-section-professional bg-pattern2">
<div class="content-section about-section-professional bg-gradient-only">
```

### 2. **Menggunakan Gambar Sendiri**

#### Langkah 1: Upload Gambar
- Masukkan gambar ke folder `images/`
- Pastikan nama file tidak ada spasi (gunakan underscore atau dash)

#### Langkah 2: Tambahkan Preset Baru
Buka file `index.html` dan tambahkan preset baru di bagian CSS (sekitar baris 334):

```css
/* Preset Baru: Nama Background Anda */
.about-section-professional.bg-custom {
  --about-bg-image: url('images/nama-gambar-anda.jpg');
  --about-bg-fallback: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
}
```

#### Langkah 3: Gunakan Preset Baru
Ganti class di HTML:
```html
<div class="content-section about-section-professional bg-custom">
```

### 3. **Mengatur Overlay (Lapisan Gelap di Atas Gambar)**

Tambahkan class overlay untuk mengatur tingkat kegelapan:

```html
<!-- Overlay Ringan -->
<div class="content-section about-section-professional bg-project1 bg-light-overlay">

<!-- Overlay Sedang -->
<div class="content-section about-section-professional bg-project1 bg-medium-overlay">

<!-- Overlay Gelap -->
<div class="content-section about-section-professional bg-project1 bg-dark-overlay">
```

### 4. **Mengatur Background Secara Manual**

Jika ingin mengatur sendiri, edit CSS custom properties di bagian `:root` (baris 84-98):

```css
:root {
  /* Ganti URL gambar di sini */
  --about-bg-image: url('images/gambar-anda.jpg');
  
  /* Ganti warna fallback (jika gambar tidak load) */
  --about-bg-fallback: linear-gradient(135deg, #2c3e50 0%, #34495e 100%);
  
  /* Posisi gambar */
  --about-bg-position: center; /* center, top, bottom, left, right */
  
  /* Ukuran gambar */
  --about-bg-size: cover; /* cover, contain, 100% 100% */
  
  /* Pengulangan gambar */
  --about-bg-repeat: no-repeat; /* no-repeat, repeat, repeat-x, repeat-y */
  
  /* Efek parallax */
  --about-bg-attachment: fixed; /* fixed, scroll */
  
  /* Tingkat kegelapan overlay (0.1 = sangat terang, 0.9 = sangat gelap) */
  --about-overlay-opacity: 0.7;
}
```

## 📋 Daftar Preset yang Tersedia

| Class | Gambar | Deskripsi |
|-------|--------|-----------|
| `bg-construction` | construction-hero-bg.svg | Background default (konstruksi) |
| `bg-project1` | Copy-of-ENP-WEB-1.jpg | Proyek konstruksi 1 |
| `bg-project2` | Copy-of-ENP-WEB-4.jpg | Proyek konstruksi 2 |
| `bg-work1` | IMG_20220623_091905.jpg | Pekerjaan konstruksi 1 |
| `bg-work2` | IMG_20220719_091458.jpg | Pekerjaan konstruksi 2 |
| `bg-work3` | IMG_20220729_164508.jpg | Pekerjaan konstruksi 3 |
| `bg-work4` | IMG_20220807_110604.jpg | Pekerjaan konstruksi 4 |
| `bg-work5` | IMG_20221029_132108.jpg | Pekerjaan konstruksi 5 |
| `bg-pattern1` | BGP-1.jpg | Pattern background 1 |
| `bg-pattern2` | BGP.jpg | Pattern background 2 |
| `bg-gradient-only` | none | Hanya gradient (tanpa gambar) |

## 🎛️ Class Overlay

| Class | Opacity | Deskripsi |
|-------|---------|-----------|
| `bg-light-overlay` | 0.4 | Overlay ringan (gambar terlihat jelas) |
| `bg-medium-overlay` | 0.6 | Overlay sedang (default) |
| `bg-dark-overlay` | 0.8 | Overlay gelap (gambar agak tertutup) |

## 💡 Tips

1. **Ukuran Gambar**: Gunakan gambar dengan resolusi tinggi (minimal 1920x1080) untuk hasil terbaik
2. **Format File**: JPG untuk foto, PNG untuk gambar dengan transparansi, SVG untuk vektor
3. **Nama File**: Hindari spasi, gunakan huruf kecil dan underscore
4. **Testing**: Selalu test di berbagai ukuran layar (desktop, tablet, mobile)
5. **Fallback**: Selalu sediakan gradient fallback jika gambar tidak load

## 🔧 Troubleshooting

**Gambar tidak muncul?**
- Periksa path file (harus `images/nama-file.jpg`)
- Pastikan file ada di folder images
- Cek nama file (case sensitive)

**Gambar terlihat buram?**
- Gunakan gambar resolusi tinggi
- Coba ubah `--about-bg-size` menjadi `contain`

**Text tidak terbaca?**
- Tambahkan class overlay: `bg-dark-overlay`
- Atau ubah `--about-overlay-opacity` menjadi nilai yang lebih besar

**Background tidak responsive?**
- Pastikan menggunakan `--about-bg-attachment: scroll` di mobile
- Test di berbagai ukuran layar
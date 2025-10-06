#!/bin/bash

# Script untuk mengatasi masalah divergent branches
# Penggunaan: ./fix-divergent-branches.sh

# Warna untuk output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
NC='\033[0m' # No Color

echo -e "${BLUE}🔧 Mengatasi masalah divergent branches...${NC}"

# Cek status git
echo -e "${YELLOW}📊 Memeriksa status repository...${NC}"
git status

# Fetch terbaru dari remote
echo -e "${YELLOW}📥 Mengambil perubahan terbaru dari remote...${NC}"
git fetch origin

# Cek apakah ada divergent branches
LOCAL_COMMITS=$(git log --oneline origin/main..HEAD | wc -l)
REMOTE_COMMITS=$(git log --oneline HEAD..origin/main | wc -l)

echo -e "${YELLOW}📈 Analisis divergent branches:${NC}"
echo -e "   Local commits ahead: $LOCAL_COMMITS"
echo -e "   Remote commits ahead: $REMOTE_COMMITS"

if [ $LOCAL_COMMITS -eq 0 ] && [ $REMOTE_COMMITS -eq 0 ]; then
    echo -e "${GREEN}✅ Tidak ada divergent branches. Repository sudah up-to-date!${NC}"
    exit 0
fi

# Pilihan strategi
echo -e "${YELLOW}🤔 Pilih strategi untuk mengatasi divergent branches:${NC}"
echo -e "1. Merge (rekomendasi) - menggabungkan perubahan"
echo -e "2. Rebase - memindahkan commit lokal ke atas remote"
echo -e "3. Reset hard - menghapus perubahan lokal (HATI-HATI!)"
echo -e "4. Cancel - batalkan operasi"

read -p "Pilih opsi (1-4): " choice

case $choice in
    1)
        echo -e "${YELLOW}🔄 Melakukan merge...${NC}"
        git pull --no-rebase origin main
        if [ $? -eq 0 ]; then
            echo -e "${GREEN}✅ Merge berhasil!${NC}"
        else
            echo -e "${RED}❌ Merge gagal! Ada konflik yang perlu diselesaikan manual.${NC}"
            exit 1
        fi
        ;;
    2)
        echo -e "${YELLOW}🔄 Melakukan rebase...${NC}"
        git pull --rebase origin main
        if [ $? -eq 0 ]; then
            echo -e "${GREEN}✅ Rebase berhasil!${NC}"
        else
            echo -e "${RED}❌ Rebase gagal! Ada konflik yang perlu diselesaikan manual.${NC}"
            exit 1
        fi
        ;;
    3)
        echo -e "${RED}⚠️  PERINGATAN: Ini akan menghapus semua perubahan lokal!${NC}"
        read -p "Apakah Anda yakin? (y/N): " confirm
        if [ "$confirm" = "y" ] || [ "$confirm" = "Y" ]; then
            echo -e "${YELLOW}🔄 Melakukan reset hard...${NC}"
            git reset --hard origin/main
            echo -e "${GREEN}✅ Reset hard berhasil!${NC}"
        else
            echo -e "${YELLOW}❌ Operasi dibatalkan.${NC}"
            exit 0
        fi
        ;;
    4)
        echo -e "${YELLOW}❌ Operasi dibatalkan.${NC}"
        exit 0
        ;;
    *)
        echo -e "${RED}❌ Opsi tidak valid!${NC}"
        exit 1
        ;;
esac

# Push perubahan jika ada
echo -e "${YELLOW}🚀 Mendorong perubahan ke GitHub...${NC}"
git push origin main

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✅ Push berhasil! Divergent branches telah diselesaikan.${NC}"
else
    echo -e "${RED}❌ Push gagal! Periksa koneksi atau konflik.${NC}"
    exit 1
fi

echo -e "${GREEN}🎉 Masalah divergent branches telah diselesaikan!${NC}"
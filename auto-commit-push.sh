#!/bin/bash

# Script untuk otomatis commit dan push perubahan ke GitHub
# Penggunaan: ./auto-commit-push.sh "pesan commit"

# Warna untuk output
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m' # No Color

echo -e "${YELLOW}🔄 Memulai proses auto commit dan push...${NC}"

# Pull terlebih dahulu untuk menghindari divergent branches
echo -e "${YELLOW}📥 Memperbarui dari remote...${NC}"
git pull origin main

# Cek apakah ada perubahan
if [ -z "$(git status --porcelain)" ]; then
    echo -e "${YELLOW}ℹ️  Tidak ada perubahan untuk di-commit${NC}"
    exit 0
fi

# Ambil pesan commit dari parameter atau gunakan default
COMMIT_MSG=${1:-"Auto commit: $(date '+%Y-%m-%d %H:%M:%S')"}

echo -e "${YELLOW}📝 Menambahkan semua perubahan...${NC}"
git add .

echo -e "${YELLOW}💾 Melakukan commit dengan pesan: '$COMMIT_MSG'${NC}"
git commit -m "$COMMIT_MSG"

if [ $? -eq 0 ]; then
    echo -e "${GREEN}✅ Commit berhasil!${NC}"
    
    echo -e "${YELLOW}🚀 Mendorong perubahan ke GitHub...${NC}"
    git push origin main
    
    if [ $? -eq 0 ]; then
        echo -e "${GREEN}✅ Push ke GitHub berhasil!${NC}"
        echo -e "${GREEN}🎉 Semua perubahan telah tersimpan di GitHub!${NC}"
    else
        echo -e "${RED}❌ Gagal push ke GitHub!${NC}"
        exit 1
    fi
else
    echo -e "${RED}❌ Gagal melakukan commit!${NC}"
    exit 1
fi
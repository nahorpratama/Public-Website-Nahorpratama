#!/bin/bash

# Script untuk memantau perubahan file dan otomatis commit & push
# Penggunaan: ./watch-changes.sh

# Warna untuk output
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
NC='\033[0m'

echo -e "${YELLOW}👀 Memulai monitoring perubahan file...${NC}"
echo -e "${YELLOW}Tekan Ctrl+C untuk berhenti${NC}"

# Fungsi untuk commit dan push
commit_and_push() {
    echo -e "${YELLOW}📝 Perubahan terdeteksi! Melakukan commit dan push...${NC}"
    ./auto-commit-push.sh "Auto commit: $(date '+%Y-%m-%d %H:%M:%S')"
}

# Monitor perubahan menggunakan inotifywait (jika tersedia)
if command -v inotifywait &> /dev/null; then
    echo -e "${GREEN}✅ Menggunakan inotifywait untuk monitoring${NC}"
    inotifywait -m -r -e modify,create,delete,move /workspace --exclude '\.git' | while read path action file; do
        echo -e "${YELLOW}📁 Perubahan: $action $path$file${NC}"
        sleep 2  # Tunggu sebentar untuk memastikan file selesai diubah
        commit_and_push
    done
else
    echo -e "${YELLOW}⚠️  inotifywait tidak tersedia, menggunakan polling...${NC}"
    LAST_CHECK=$(git status --porcelain)
    
    while true; do
        sleep 10  # Cek setiap 10 detik
        CURRENT_STATUS=$(git status --porcelain)
        
        if [ "$CURRENT_STATUS" != "$LAST_CHECK" ]; then
            commit_and_push
            LAST_CHECK="$CURRENT_STATUS"
        fi
    done
fi
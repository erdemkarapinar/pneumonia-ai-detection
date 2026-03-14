FROM python:3.11-slim

# OpenCV ve diğer kütüphaneler için gerekli sistem bağımlılıkları (Güncel Paketler)
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libgl1 \
    libglib2.0-0 \
    libxcb1 \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /app

COPY requirements.txt .
RUN pip install --no-cache-dir --upgrade pip && \
    pip install --no-cache-dir -r requirements.txt

COPY . .

CMD ["uvicorn", "main:app", "--host", "0.0.0.0", "--port", "8000"]
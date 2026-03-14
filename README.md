# Pneumonia Detection System

**Transfer Learning + Deep Learning + Laravel + FastAPI Web App**  
Bu proje, Transfer Learning ile derin öğrenme yapılıp oluşturulmuş olan best_model.h5 yapay zekasının kullanıcıların akciğer röntgenlerini yükleyerek **zatürre (pneumonia) tespiti** yapmasını sağlayan bir web uygulamasıdır. Kullanıcı bazlı kayıt sistemi ve analiz geçmişi ile tam bir **AI Web Dashboard Uygulaması** sunar.

---

## Özellikler

- Kullanıcı kayıt ve login sistemi (Laravel Breeze)  
- X-ray fotoğraf yükleme ve otomatik analiz  
- AI modeli TensorFlow Keras ile transfer learning kullanılarak eğitildi  
- AI modeli FastAPI üzerinden deploy edildi  
- Kullanıcıya özel analiz geçmişi ve sonuçlar  
- Prediction confidence gösterimi  
- AI Heatmap (Grad-CAM) ile hastalığın bulunduğu alanın görselleştirilmesi  
- Dashboard ve grafiklerle veri analizi  
- Docker ile kolay deploy  

---

## Teknolojiler

| Katman         | Teknoloji                                |
|----------------|-----------------------------------------|
| Transfer Learning  | TensorFlow, Matplotlib, Numpy (Python)                            |
| Web Framework  | Laravel (PHP)                            |
| AI API         | FastAPI (Python)                         |
| ML Framework   | TensorFlow + Keras                       |
| Database       | MySQL / MariaDB                           |
| Frontend       | Blade, Tailwind CSS, Chart.js            |
| Deployment     | Docker, Docker Compose                   |

---

## Proje Yapısı
zature_tespit
├──pneumonia-project/
├   │
├    ├── laravel-app/ # Laravel Web App
├    │ ├── app/
├    │ ├── routes/
├    │ ├── resources/views/
├    │ └── ...
├    │
├    ├── ai-api/ # Python AI API
├    │ ├── main.py
├    │ ├── best_model.h5
├    │ └── venv/
├    │
├    ├── docker-compose.yml
├    └── requirements.txt
├──README.md
├──transfer_learning.py
# Laravel-Ai-Pneumonia-Project

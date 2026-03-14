#FastAPI structure for uploading photos and transferring them to AI
from fastapi import FastAPI, File, UploadFile
import tensorflow as tf
import numpy as np
from PIL import Image
import io
import matplotlib.pyplot as plt
import cv2
import base64

app = FastAPI()

model = tf.keras.models.load_model("best_model.h5")

def preprocess(image):

    image = image.resize((224,224))
    image = np.array(image)/255.0
    image = np.expand_dims(image, axis=0)

    return image


@app.post("/predict")
async def predict(file: UploadFile = File(...)):

    contents = await file.read()

    image = Image.open(io.BytesIO(contents)).convert("RGB")

    img = preprocess(image)

    prediction = model.predict(img)[0][0]

    if prediction > 0.5:
        result = "Pneumonia"
    else:
        result = "Normal"

    return {
        "prediction": result,
        "confidence": float(prediction)
    }

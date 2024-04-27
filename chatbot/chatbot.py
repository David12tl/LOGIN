import http.client
import json

def obtener_respuesta_del_chatbot(mensaje_usuario):
    conn = http.client.HTTPSConnection("open-ai21.p.rapidapi.com")

    payload = {
        "messages": [{"role": "user", "content": mensaje_usuario}],
        "web_access": False,
        "system_prompt": "",
        "temperature": 0.9,
        "top_k": 5,
        "top_p": 0.9,
        "max_tokens": 256
    }

    headers = {
        'content-type': "application/json",
        'X-RapidAPI-Key': "1a7cc01117mshb2fdbd9b431d086p1287c6jsn4a7190de9bf0",
        'X-RapidAPI-Host': "open-ai21.p.rapidapi.com"
    }

    try:
        conn.request("POST", "/conversationgpt35", json.dumps(payload), headers)
        res = conn.getresponse()
        data = res.read()
        respuesta_json = json.loads(data.decode("utf-8"))
        respuesta_chatbot = respuesta_json['result']
        return respuesta_chatbot
    except Exception as e:
        print("Error al enviar la solicitud:", e)
        return "Lo siento, hubo un error al procesar tu solicitud."

# Ejemplo de uso
mensaje_usuario = input("Usuario: ")
respuesta_chatbot = obtener_respuesta_del_chatbot(mensaje_usuario)
print("Chatbot:", respuesta_chatbot)
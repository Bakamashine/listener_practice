import logging
import requests
from vk.methods import get_credentials, get_user_credentials, get_message, send_message
from vk.types import Message, EventMessage
import asyncio
import requests

def PostResponse(url, data):
    response = requests.post(url, data)
    return response.status_code


async def main(server, key, ts, vk_chat_ids, access_token, cookie, pts):
    print(f"Всего chat_id: {len(vk_chat_ids)}")
    print("Отправка сообщений...")
    text ="Должно прийти в 21.52"
    for chat_id in vk_chat_ids:
        try:
            send_message(access_token, chat_id, text)
            await asyncio.sleep(1)
        except Exception as e:
            logging.exception(f"Ошибка при отправке сообщения в чат {chat_id}: {e}")
    print("Сообщения отправлены!")
    result = PostResponse("http://localhost:9001/post.php", {"name": text})
    print("Результат отправки POST запроса: ", result)
    exit(0)

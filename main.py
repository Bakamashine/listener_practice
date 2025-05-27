import logging
import requests
from vk.methods import get_credentials, get_user_credentials, get_message, send_message
from vk.types import Message, EventMessage
import asyncio
import requests
from random import choice

PRODUCTION = "http://dadamapt.beget.tech/post.php"
DEV = "http://localhost:9001/post.php"

def PostResponse(url, data):
    response = requests.post(url, data)
    return response.status_code

def random_text():
    words = [
        "Редактирую техническое задание",
        "Разрабатываю веб-сайт",
        "Знакомлюсь с технологиями Борхиммаш",
        "",
    ]

    return f"Филиппович Иван Александрович. Приступил к практике. {choice(words)}"


async def main(server, key, ts, vk_chat_ids, access_token, cookie, pts):
    # print(f"Всего chat_id: {len(vk_chat_ids)}")
    print("Отправка сообщений...")
    text = random_text()
    for chat_id in vk_chat_ids:
        try:
            send_message(access_token, chat_id, text)
            await asyncio.sleep(1)
        except Exception as e:
            logging.exception(f"Ошибка при отправке сообщения в чат {chat_id}: {e}")
    print("Сообщения отправлены!")
    result = PostResponse(PRODUCTION, {"name": text})
    print("Результат отправки POST запроса: ", result)
    exit(0)

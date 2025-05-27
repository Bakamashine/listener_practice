import asyncio
import logging
from os import getenv
from dotenv import load_dotenv

from aiogram import Bot
from vk.methods import get_credentials, get_user_credentials
from main import main

load_dotenv()

logging.basicConfig(
    filename="./sferum_in.log",
    encoding="utf-8",
    level=logging.INFO,
    datefmt="%m/%d/%Y %I:%M:%S %p",
)
ID = "2000000025"
ID_SLIZOV = "795499845"

vk_chat_ids = [ID]

# Перейдите по ссылке: Sferum >> Ctrl + Shift + C >> Приложение>> Хранилище>> Файлы cookie >> https://web.vk.me
# После этого вы должны увидеть таблицу со всеми файлами cookie с этого сайта
# Найдите remixdsid и скопируйте данные из столбца Cookie Value.
cookie = "vk1.a.jJAFL6NujMz5fCJHmzr3KPjF47SEfGHSo8akuYtG1jzXiQm9iDBABMIaJnAB8kKBudwKVsUKk2J2G-MSPVg1_pe-Ix_SRLGRhmV85egN9kdvMV3s5BqaE_qWehxW4L-NdPOptaWOR9iUn1unWIYA3mmoMSVun0TZfJ6PgdZe7Aw"

user = get_user_credentials(cookie)
access_token = user.access_token
creds = get_credentials(access_token)

loop = asyncio.get_event_loop()

try:
    task2 = loop.create_task(
        main(
            creds.server,
            creds.key,
            creds.ts,
            vk_chat_ids,
            access_token,
            cookie,
            creds.pts,
        )
    )

    logging.info("Loop starting")
    loop.run_forever()

except KeyboardInterrupt:
    pass
except Exception as e:
    logging.exception(e)
finally:
    logging.info("Closing loop...")
    loop.close()
    logging.info("Loop closed")

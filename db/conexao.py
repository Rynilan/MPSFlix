from mysql.connector import connect
from json import load
from os import path


def conectar():
    with open(
        path.abspath(__file__).removesuffix('db/conexao.py') + 'info.json', 'r'
    ) as json:
        data = load(json)
    banco = connect(
        **data['free_database']
    )
    cursor = banco.cursor()
    return banco, cursor

from conexao import conectar
from hashlib import sha256
from sys import argv
from json import dumps


try:
    email = argv[1]
    senha = sha256(argv[2].encode()).hexdigest()
    banco, cursor = conectar()

    cursor.execute(
        'select nome, email, senha from tb_usuarios where email=%s and senha=%s;',
        (email, senha)
    )
    dados = cursor.fetchall()
    retorno = {
        'sucesso': False,
        'mensagem': None,
        'nome': None,
        'email': None
    }
    if (len(dados) == 1 and len(dados) > 0 and len(dados) < 2):
        retorno['sucesso'] = True
        retorno['nome'] = dados[0][0]
        retorno['mensagem'] = 'Resultado encontrado.'
        retorno['email'] = dados[0][1]
    else:
        retorno['mensagem'] = 'Sem resultado correspondente.'
        retorno['dados'] = str((email, argv[2]))

except Exception as erro:
    retorno = {
        'sucesso': False,
        'mensagem': erro.__str__(),
        'nome': None
    }
finally:
    try:
        cursor.close()
        banco.close()
    except Exception:
        pass
print(dumps(retorno))

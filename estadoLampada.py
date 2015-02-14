#!/usr/bin/env python
# -*- coding: utf-8 -*-
'''
Por: Humberto Vieira 
'''
import urllib2
import json
import RPi.GPIO as GPIO

#Formata JSON em ASCII
#Antes estava aparecendo u nos objetos
def ascii_encode_dict(data):
    ascii_encode = lambda x: x.encode('ascii')
    return dict(map(ascii_encode, pair) for pair in data.items())

def acessa_url():
	#Busca o que está na URL
	jsonurl = urllib2.urlopen('linkdowebservice')

	#Converte os dados para JSON e coloca em ASCII
	lampada = json.load(jsonurl,  object_hook=ascii_encode_dict)

	#Exibe os resultados
	#print lampada[0]['id_lampada'] 
	#print lampada[0]['ligada'] 
	#print lampada[0]['descricao'] 

	jsonurl.close()
	return lampada[0]['ligada']

i = 0
valorAnt = acessa_url()
GPIO.setmode(GPIO.BOARD)
GPIO.setup(12, GPIO.OUT)

#será um laço infinito que testará se houve alguma alteração no valor
while(i < 50):
	if(valorAnt != acessa_url()):
		#Ativa manda sinal para o bluetooth acender a luz
		valorAnt = acessa_url()
		GPIO.output(12, valorAnt)
		print "Funfa"

	i = i + 1
	print "Iteracao: " + str(i)

GPIO.cleanup()
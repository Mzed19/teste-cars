v  = input("tag: ")

from os import system
from time import sleep
import sys


system('docker login -u ggbr12 -p Ggbr215@215')

system('docker build  . -t  ggbr12/prime-erp:' + v)
system('docker push  ggbr12/prime-erp:' + v)

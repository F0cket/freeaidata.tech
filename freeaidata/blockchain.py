import sys
import os
args = sys.argv
chain = {}

uploader = args[1]

content = args[2]

numOfFiles = args[3]

date = args[4]

blockNum = 0

blockHash = ""

last_line = ""

def hashMethod(lastHash):
    hashString = uploader + content + numOfFiles + lastHash
    return hash(hashString)
    

with open("chain.txt", 'r+') as file:
    for line in file:
        last_line = line

with open("chain.txt", 'a+') as file:
    print(last_line)
    subString = last_line.split(' : ')
    subString[1] = subString[1].strip()
    newNum = str(int(subString[0]) + 1)
    file.write("\n" + newNum + " : " + str(hashMethod(subString[1])))
    
 
        
with open("info.txt", 'a+') as file:
    print(last_line)
    file.write(("\nBlock Number: " + newNum))
    file.write(("\nBlock Hash: " + subString[1]))
    file.write(("\nUploader: " + uploader))
    file.write(("\nContent Subject: " + content))
    file.write(("\nNumber of Files uploaded: " + numOfFiles))
    file.write(("\nTimestamp: " + date))
    file.write(("\n\n"))


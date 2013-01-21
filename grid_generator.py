# Author: Abhishek Shrivastava <i.abhi27[at]gmail.com> 
# Description: Grid generator script for creating mapping grids for the Grid Encoder

import sys
import random

gridcount = 10
gridinrange = 100
gridoutrange = [(65,90),(97,122),(48,57)]

gridin = [str(x) for x in range(gridinrange)]
#for i in range(10):
#    gridin[i] = '0' + gridin[i]

out_list = reduce(lambda p,q: p+q, map(lambda x: [chr(i) for i in range(x[0],x[1]+1)], gridoutrange))
gridout = reduce(lambda p,q: p+q, map(lambda x: [x+y for y in out_list], out_list))

grids = []
for i in range(gridcount):
    random.shuffle(gridout)
    subgrid = dict(zip(gridin, gridout))
    grids.append(subgrid)

outfile = open('grids','w')    
for i in gridin:
    row = i + " "
    for x in range(gridcount):
        row = row + grids[x][i] + " "
    outfile.write(row+"\n")

outfile2 = open('grids_encoder.lib.php','w')
outfile2.write('<?php\n$GRIDENCODE = array(\n')
for i in range(gridcount):
    outfile2.write(str(i)+" => array(\n")
    for x in gridin:
        outfile2.write(str(x)+" => '"+grids[i][x]+"',\n")
    outfile2.write("),\n")
outfile2.write(");")    
    
outfile3 = open('grids_decoder.lib.php','w')
outfile3.write('<?php\n$GRIDDECODE = array(\n')
for i in range(gridcount):
    outfile3.write(str(i)+" => array(\n")
    for x in gridin:
	if len(x) == 1:
		strx = '0'+str(x)
	else:
		strx = str(x)
        outfile3.write("'"+grids[i][x]+"' => '"+strx+"',\n")
    outfile3.write("),\n")
outfile3.write(");")    
        


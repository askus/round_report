import re 

f = open("corpus_data_short.txt" )
out_set = set() 
for l in f:
	word = re.sub("\d+", "", l.strip() )
	out_set.add( word )
f.close()

outf = open("corpus_data_short_trim.txt", "w")
js_outf = open("../js/ac.js", "w")

for title in out_set:
	print >> outf,  title 

outf.close()
print >> js_outf ," var ac_data = [ \"%s \"];"  % ( "\",\"".join( list(out_set)) )  
js_outf.close() 

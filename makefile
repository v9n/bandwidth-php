all: gen

gen: 
		alpaca --no-python --no-node --no-ruby .
	
clean:
		rm -rf python node php ruby

build:
	git checkout master
	cp -rf php/* ./


all: gen

gen: 
		alpaca --no-python --no-node --no-ruby .
	
clean:
		rm -rf python node php ruby

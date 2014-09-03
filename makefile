VERSION = 0.2.0
SOURCE_DIR = $(pwd)

all: clean gen

gen:
		mkdir /tmp/bandwidth-api-kurei
		cd /tmp/bandwidth-api-kurei
		alpaca --no-python --no-node --no-ruby $(SOURCE_DIR)
	
clean:
		rm -rf python node php ruby

build:
	git checkout master
	cp -rf php/* ./


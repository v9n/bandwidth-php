VERSION = 0.2.0
SOURCE_DIR = $(shell pwd)
OUT_DIR=/tmp/bandwidth-api-kurei

all: clean gen

gen:
		mkdir $(OUT_DIR) 
		alpaca --no-python --no-node --no-ruby $(SOURCE_DIR)
		mv php "$(OUT_DIR)/"
	
clean:
		rm -rf python node php ruby $(OUT_DIR)

build:
	git checkout master
	cp -rf $(OUT_DIR)/php/* .
	rm -rf $(OUT_DIR)


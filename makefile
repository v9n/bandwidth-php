VERSION=$(shell jq '.version' pkg.json)
SOURCE_DIR=$(shell pwd)
OUT_DIR=/tmp/bandwidth-api-kurei
BUILD_DIR=/tmp/bandwidth-api-build

all: clean gen 

gen:
		echo $(VERSION)
		mkdir $(OUT_DIR) 
		mkdir $(BUILD_DIR) 
		alpaca --no-python --no-node --no-ruby $(SOURCE_DIR)
		mv php "$(OUT_DIR)/"
	
clean:
		rm -rf python node php ruby $(OUT_DIR) $(BUILD_DIR)

build:
	git checkout master
	git pull origin master
	git checkout alpaca
	cp -rf "$(SOURCE_DIR)" "$(BUILD_DIR)"
	cd $(BUILD_DIR)/bandwidth ; \
		pwd ; \
		git checkout .;\
		git checkout master;\
		git pull origin master ; \
		cp -rf $(OUT_DIR)/php/* . ; \
		cp -rf $(SOURCE_DIR)/example.md .; \
		git add .; \
		git commit -m "Deploy v$(VERSION) generate on $(shell date)"; \
		git tag -a $(VERSION) -m "Publish $(VERSION)" \
		git push origin master; \
		git push --tags; \
		echo "Finish at $(shell date)";


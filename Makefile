
INSTALL=tools/install-sh
INSTALL_DATA=$(INSTALL)  -m 644
INSTALL_DIR=$(INSTALL)  -m 755 -d

install:
	$(INSTALL_DIR) ../html ../html/js ../html/css ../html/img
	$(INSTALL_DATA) html/*.php ../html/
	$(INSTALL_DATA) html/js/*.js ../html/js/
	$(INSTALL_DATA) html/css/*.css ../html/css/
	$(INSTALL_DATA) html/img/*.png ../html/img/


config/config.php: config/major_versions.json config/releases.json $(wildcard config/enterprise_*.json)
	@echo '🏗  Build configuration file $(@)…'
	build/config_builder > $(@)

.ONESHELL:

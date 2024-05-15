config/config.php: config/major_versions.json config/releases.json $(wildcard config/enterprise_releases.json)
	@echo '🏗  Build configuration file $(@)…'
	build/config_builder > $(@)

.ONESHELL:

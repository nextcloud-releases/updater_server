const core = require('@actions/core');

const configs = JSON.parse(core.getInput('configs'))

// Extract, process and filter configs
const extractConfigs = function (configs = {}, channel = 'stable') {
	return Object.keys(configs[channel])
		// flatten arrays
		.reduce((prev, base) => {
			// Install time delivery chance percentage
			const weightedConfigs = configs[channel][base]
			const percents = Object.keys(weightedConfigs)
			const major = parseInt(base.split('.')[0])

			// We add the percentage and channel to the config
			const data = percents.map(percent => Object.assign({
				channel,
				percent,
				base,
				major,
			}, weightedConfigs[percent]))

			// Compute EOL state from date
			data.forEach(function (data) {
				core.info(data.eol);
				data.eol = new Date().toISOString().slice(0, 10) > (data.eol ? data.eol : '9999-99-99');
				core.info(data.eol);
			});

			// We add the config to the list
			prev.push(...data)
			return prev
		}, [])
		// And filter out the EOL configs
		.filter(config => config.eol === false)
}

const stableConfigs = extractConfigs(configs, 'stable')
const betaConfigs = extractConfigs(configs, 'beta')

core.setOutput('configs', JSON.stringify([...stableConfigs, ...betaConfigs]))

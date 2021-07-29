const core = require('@actions/core');

const configs = JSON.parse(core.getInput('configs'))


// Extract, process and filter configs
const extractConfigs = function(configs = {}, channel = 'stable') {
	return Object.keys(configs[channel])
		// flatten arrays
		.reduce((prev, base) => {
			// Install time delivery chance percentage
			const weightedConfigs = configs[channel][base]
			const percents = Object.keys(weightedConfigs)

			// We add the percentage and channel to the config
			const data = percents.map(percent => Object.assign({
				channel,
				percent,
				base,
			}, weightedConfigs[percent]))

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

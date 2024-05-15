## Configuration builder

Generates the `config/config.php` file

### Configuration files 
#### `major_versions.json`
List all major versions 
```json
    "29": {
        "eol": "2025-04",  // End of life as YYYY-mm. Optional, default to no end of life
        "minPHP": "8.0"    // Minimal PHP version
    },
```

#### `releases.json`
```json
    "29.0.0": {
        "internalVersion": "29.0.0.19",    // Internal version number
        "signature": "<Base64 signature>", // Signature on one line
        "deploy": 70                       // Deploy percentage. Optional, default to 100%
    }
```

### Build 
Check if the `config.php` needs update and update it: 
```bash
make config/config.php
```
Can be forced with `make -B config/config.php`

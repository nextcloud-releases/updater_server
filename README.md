This is the server that is called from Nextcloud to check if a new version of the server is available.

## How to release a new update

1. Adjust config/config.php for the update
2. Adjust tests/integration/features/update.feature for the integration tests

If the tests are not passing the TravisCI test execution will fail.

## Example calls

Deployed URL: https://updates.nextcloud.org/server/
Example call: update-server/?version=9x0x0x12x1448709225.0768x1448709281xstablexx2015-10-19T18:44:30+00:00%208ee2009de36e01a9866404f07722892f84c16e3e
```xml
<?xml version="1.0" encoding="UTF-8"?>
<nextcloud>
 <version>9.0.51</version>
 <versionstring>Nextcloud 9.0.51</versionstring>
 <url>https://download.nextcloud.com/server/releases/nextcloud-9.0.51.zip</url>
 <web>https://docs.nextcloud.org/server/9/admin_manual/maintenance/upgrade.html</web>
</nextcloud>
```

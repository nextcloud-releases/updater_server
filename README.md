# Extract supported versions action

This is a custom action that read the updater config, filter out EOL entries and add required data

This is used by the Upgrade testing workflow

## Output data example

```js
[
  {
    channel: "stable",
    percent: "100",
    base: "21",
    latest: "21.0.3",
    internalVersion: "21.0.3.1",
    downloadUrl: "download.nextcloud.com/server/releases/nextcloud-21.0.3.zip",
    web: "docs.nextcloud.com/server/21/admin_manual/maintenance/upgrade.html",
    eol: false,
    minPHPVersion: "7.3",
    signature: "SIGNATURE"
  },
  {
    channel: "stable",
    percent: "30",
    base: "22",
    latest: "22.0.0",
    internalVersion: "22.0.0.11",
    downloadUrl: "download.nextcloud.com/server/releases/nextcloud-22.0.0.zip",
    web: "docs.nextcloud.com/server/22/admin_manual/maintenance/upgrade.html",
    eol: false,
    minPHPVersion: "7.3",
    signature: "SIGNATURE"
  },
  {
    channel: "stable",
    percent: "70",
    base: "22",
    latest: "22.0.0",
    internalVersion: "22.0.0.11",
    downloadUrl: "download.nextcloud.com/server/releases/nextcloud-22.0.0.zip",
    web: "docs.nextcloud.com/server/22/admin_manual/maintenance/upgrade.html",
    eol: false,
    minPHPVersion: "7.3",
    signature: "SIGNATURE"
  },
  {
    channel: "beta",
    percent: "100",
    base: "21",
    latest: "21.0.4 RC1",
    internalVersion: "21.0.4.0",
    downloadUrl: "https://download.nextcloud.com/server/prereleases/nextcloud-21.0.4rc1.zip",
    web: "https://docs.nextcloud.com/server/21/admin_manual/maintenance/upgrade.html",
    eol: false,
    minPHPVersion: "7.3",
    signature: "SIGNATURE"
  },
  {
    channel: "beta",
    percent: "100",
    base: "22",
    latest: "22.1.0 RC1",
    internalVersion: "22.1.0.0",
    downloadUrl: "https://download.nextcloud.com/server/prereleases/nextcloud-22.1.0rc1.zip",
    web: "https://docs.nextcloud.com/server/22/admin_manual/maintenance/upgrade.html",
    eol: false,
    minPHPVersion: "7.3",
    signature: "SIGNATURE"
  },
  {
    channel: "beta",
    percent: "100",
    base: "21.0.3",
    latest: "22.1.0 RC1",
    internalVersion: "22.1.0.0",
    downloadUrl: "https://download.nextcloud.com/server/prereleases/nextcloud-22.1.0rc1.zip",
    web: "https://docs.nextcloud.com/server/22/admin_manual/maintenance/upgrade.html",
    eol: false,
    minPHPVersion: "7.3",
    signature: "SIGNATURE"
  }
]
```

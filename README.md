# Duo Column Dashboard Module for Icinga Web 2

This module provides an alternative dashboard layout where dashlets are displayed in **two columns** (side by side) instead of the default responsive multi-column grid layout.

## Features

- **Two-column layout**: Each dashlet takes exactly 50% of the available width
- **Consistent layout**: Always two columns regardless of screen size (falls back to single column on mobile)
- **Side-by-side display**: Compare dashlets easily with the dual column view
- **Easy switching**: Quickly toggle between duo column and grid view
- **All dashboards supported**: Works with all your existing dashboard panes
- **Responsive**: Falls back to single column on smaller screens (< 900px)
- **Print-friendly**: Maintains two-column layout when printing

## Layout Comparison

### Default Grid Layout (responsive 1-3 columns)
```
+----------+----------+----------+
| Dashlet1 | Dashlet2 | Dashlet3 |
+----------+----------+----------+
| Dashlet4 | Dashlet5 | Dashlet6 |
+----------+----------+----------+
```

### Duo Column Layout (always 2 columns)
```
+----------------+----------------+
|    Dashlet1    |    Dashlet2    |
+----------------+----------------+
|    Dashlet3    |    Dashlet4    |
+----------------+----------------+
|    Dashlet5    |    Dashlet6    |
+----------------+----------------+
```

## Requirements

- Icinga Web 2 (>= 2.9.0)

## Installation

### Manual Installation

1. Extract the archive to your Icinga Web 2 modules directory:

```bash
tar -xzf duocolumn-1.0.0.tar.gz -C /usr/share/icingaweb2/modules/
```

2. Enable the module:

```bash
icingacli module enable duocolumn
```

Or enable via the web interface:
- Go to **Configuration** → **Modules**
- Find "duocolumn" and click **Enable**

## Usage

After enabling the module, you can access the duo column dashboard in two ways:

### Via Menu
1. Click on **Dashboard** in the main menu
2. Select **Duo Column**

### Via URL
Navigate directly to: `https://your-icinga-server/icingaweb2/duocolumn/dashboard`

### Switching Between Views

- When viewing the duo column dashboard, click **"Grid View"** tab to return to the normal grid layout
- When viewing the normal dashboard, use the menu to access duo column view

### Selecting Dashboard Panes

Just like the normal dashboard, you can switch between different panes using the tabs. All your existing dashboard panes are available in duo column mode.

## Configuration

This module works out of the box with no configuration required. It uses your existing dashboard configuration from Icinga Web 2.

## Related Modules

- **singlecolumn**: If you prefer a single column layout where each dashlet takes 100% width, check out the singlecolumn module.

## License

This module is licensed under the GNU General Public License version 2 or later (GPLv2+).

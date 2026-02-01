# Duo Column Dashboard Module

## About

The Duo Column Dashboard module provides an alternative way to view your Icinga Web 2 dashboards. Instead of the default responsive multi-column grid layout (1-3 columns depending on screen width), this module displays all dashlets in exactly two columns side by side.

## Why Use Duo Column?

- **Comparison view**: Easily compare two related dashlets side by side
- **Consistent layout**: Always two columns, regardless of screen size
- **Better organization**: Group related information in pairs
- **Balanced display**: Equal space for each dashlet
- **Predictable behavior**: No layout shifts when resizing browser

## How It Works

The module adds a new view (`/duocolumn/dashboard`) that loads your existing dashboard configuration but applies different CSS styling to create a consistent two-column layout. No changes are made to your actual dashboard data - you can switch between grid and duo column views at any time.

## Navigation

- **URL**: `your-server/icingaweb2/duocolumn/dashboard`
- **Tabs**: Use "Grid View" tab to switch back to normal layout

## Technical Details

- Module directory: `/usr/share/icingaweb2/modules/duocolumn`
- Configuration: None required (uses existing dashboard config)
- CSS file: `public/css/duocolumn.less`

# Menu Builder Components

This module provides reusable menu components that follow the same design pattern as your mobile navigation in `layout.blade.php`.

## Components

### 1. Menu Component (`x-menu`)
Renders a complete menu structure with dropdown support.

**Usage:**
```blade
<x-menu menu="1" class="nav-links" />
```

**Parameters:**
- `menu`: Menu ID or Menu object
- `class`: CSS class for the main ul element (default: 'nav-links')

### 2. Mobile Menu Component (`x-mobile-menu`)
Renders a mobile-specific menu that matches your mobile navigation design exactly.

**Usage:**
```blade
<x-mobile-menu menu="1" />
```

**Parameters:**
- `menu`: Menu ID or Menu object

### 3. Menu Item Component (`x-menu-item`)
Renders individual menu items with support for nested dropdowns.

**Usage:**
```blade
<x-menu-item :menuItem="$menuItem" :level="0" />
```

**Parameters:**
- `menuItem`: MenuItem object
- `level`: Nesting level (for styling)

## Helper Functions

### render_menu($menuId, $class = 'nav-links')
Renders a menu using the helper function.

**Usage:**
```blade
{!! render_menu(1, 'nav-links') !!}
```

### render_mobile_menu($menuId)
Renders a mobile menu using the helper function.

**Usage:**
```blade
{!! render_mobile_menu(1) !!}
```

## Features

### ✅ **Design Consistency**
- Follows the exact same HTML structure as your mobile navigation
- Uses the same CSS classes (`nav-links`, `d-menu`, `dropdown`)
- Maintains the same dropdown arrow design (`fa-solid fa-angle-down`)

### ✅ **Multi-level Support**
- Supports unlimited nested levels
- Proper dropdown structure for each level
- Maintains hierarchy in mobile view

### ✅ **Icon Support**
- Displays Font Awesome icons from menu items
- Icons appear before the menu text
- Supports all Font Awesome icon classes

### ✅ **Target Support**
- Supports `_blank`, `_self`, `_parent`, `_top` targets
- Properly applied to all menu links

### ✅ **CSS Class Support**
- Applies custom CSS classes to menu items
- Maintains styling consistency

### ✅ **Translation Support**
- Uses translated titles from menu translations
- Falls back to default title if translation not found

### ✅ **Active State**
- Automatically detects active menu items
- Adds `active` class to current page menu items

## Implementation Examples

### 1. Replace Static Mobile Navigation
Replace your current mobile navigation in `layout.blade.php`:

```blade
<!-- Before -->
<ul class="nav-links">
    <li class="dropdown">
        <a href="javascript:;">{{ __('Home') }}
            <span><i class="fa-solid fa-angle-down"></i></span>
        </a>
        <ul class="d-menu">
            <!-- Static menu items -->
        </ul>
    </li>
</ul>

<!-- After -->
<x-mobile-menu menu="1" />
```

### 2. Add to Any Layout
```blade
<!-- Desktop Menu -->
<x-menu menu="1" class="nav-links" />

<!-- Mobile Menu -->
<x-mobile-menu menu="1" />
```

### 3. Custom Styling
```blade
<!-- Custom CSS class -->
<x-menu menu="1" class="custom-nav-links" />

<!-- Using helper function -->
{!! render_menu(1, 'custom-nav-links') !!}
```

## Menu Structure

The components generate HTML that matches your mobile navigation:

```html
<ul class="nav-links">
    <li class="dropdown">
        <a href="/about-us" target="_self" class="menu-item">
            <i class="fas fa-info-circle"></i>
            About Us
            <span><i class="fa-solid fa-angle-down"></i></span>
        </a>
        <ul class="d-menu">
            <li>
                <a href="/about-us/team" target="_self" class="submenu-item">
                    <i class="fas fa-users"></i>
                    Our Team
                </a>
            </li>
        </ul>
    </li>
</ul>
```

## CSS Classes Used

- `nav-links`: Main menu container
- `dropdown`: Menu items with children
- `d-menu`: Dropdown submenu
- `active`: Currently active menu item
- Custom classes from menu items are applied to `<a>` tags

## Demo

Visit `/menu-demo` to see the components in action.

## Requirements

- Font Awesome for icons
- Bootstrap CSS framework
- Menu items must have proper translations set up 
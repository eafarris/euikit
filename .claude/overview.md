# EUIKit Framework

## Overview
EUIKit is a custom Laravel Blade component library created by Eric Farris. It provides a consistent set of UI components for rapid Laravel application development with a focus on forms, layouts, and common UI patterns.

**Repository:** https://github.com/eafarris/euikit  
**Package Name:** eafarris/euikit  
**Namespace:** EaFarris\EuiKit

## Package Structure
```
vendor/eafarris/euikit/
├── src/
│   ├── EuiKitServiceProvider.php
│   ├── View/
│   │   └── Components/          # Blade component classes
│   └── resources/
│       └── views/
│           └── components/       # Blade component templates
├── composer.json
└── README.md
```

## Installation
In projects using EUIKit, the package is installed via Composer:
```bash
composer require eafarris/euikit
```

The service provider auto-registers, making components available immediately.

## Component Usage Pattern
All components use the `x-euikit::` prefix:
```blade
<x-euikit::component-name attribute="value" />
```

## Core Philosophy
- **Convention over configuration** - Sensible defaults for rapid development
- **Laravel-first** - Deeply integrated with Laravel patterns (validation, old input, routing)
- **Minimal markup** - Components handle repetitive HTML/CSS
- **Accessibility** - Proper labels, ARIA attributes, semantic HTML
- **Extensibility** - Slots and attributes for customization

## Component Categories
1. **Form Components** - Input fields, textareas, selects, buttons, form wrappers
2. **Layout Components** - Page layouts, cards, sections, containers
3. **Display Components** - Alerts, tables, badges, modals
4. **Navigation Components** - Menus, breadcrumbs, pagination

## Integration with Laravel Features

### Validation Errors
All form components automatically display validation errors:
```blade
<x-euikit::input name="email" label="Email" />
{{-- Automatically shows errors from $errors->get('email') --}}
```

### Old Input
Form components automatically repopulate with `old()` values after validation failures.

### CSRF Protection
The `<x-euikit::form>` component includes CSRF tokens automatically.

## Naming Conventions
- Component files: kebab-case (e.g., `text-input.blade.php`)
- Component usage: kebab-case (e.g., `<x-euikit::text-input>`)
- Attributes: kebab-case or camelCase accepted
- Classes: PascalCase (e.g., `TextInput.php`)

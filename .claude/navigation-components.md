# Navigation Components

## `<x-euikit::nav>`
Main navigation menu component.

### Attributes
- `type` - Navigation style: `primary`, `secondary`, `sidebar` (default: `primary`)
- `class` - Additional CSS classes

### Slots
- **default** - Navigation items
- **brand** - Brand/logo area (for primary nav)
- **actions** - Right-aligned action items (for primary nav)

### Usage with `<x-euikit::nav-item>`
```blade
{{-- Primary navigation --}}
<x-euikit::nav type="primary">
    <x-slot:brand>
        <a href="{{ route('home') }}">
            <img src="/logo.png" alt="Logo">
        </a>
    </x-slot:brand>
    
    <x-euikit::nav-item href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        Dashboard
    </x-euikit::nav-item>
    <x-euikit::nav-item href="{{ route('posts.index') }}" :active="request()->routeIs('posts.*')">
        Posts
    </x-euikit::nav-item>
    <x-euikit::nav-item href="{{ route('users.index') }}" :active="request()->routeIs('users.*')">
        Users
    </x-euikit::nav-item>
    
    <x-slot:actions>
        <x-euikit::nav-item href="{{ route('profile') }}">
            {{ auth()->user()->name }}
        </x-euikit::nav-item>
        <x-euikit::nav-item href="{{ route('logout') }}">
            Logout
        </x-euikit::nav-item>
    </x-slot:actions>
</x-euikit::nav>

{{-- Sidebar navigation --}}
<x-euikit::nav type="sidebar">
    <x-euikit::nav-item href="{{ route('settings.profile') }}" :active="request()->routeIs('settings.profile')">
        Profile
    </x-euikit::nav-item>
    <x-euikit::nav-item href="{{ route('settings.security') }}" :active="request()->routeIs('settings.security')">
        Security
    </x-euikit::nav-item>
    <x-euikit::nav-item href="{{ route('settings.notifications') }}" :active="request()->routeIs('settings.notifications')">
        Notifications
    </x-euikit::nav-item>
</x-euikit::nav>

{{-- Secondary navigation (tabs style) --}}
<x-euikit::nav type="secondary">
    <x-euikit::nav-item href="{{ route('reports.overview') }}" :active="request()->routeIs('reports.overview')">
        Overview
    </x-euikit::nav-item>
    <x-euikit::nav-item href="{{ route('reports.sales') }}" :active="request()->routeIs('reports.sales')">
        Sales
    </x-euikit::nav-item>
    <x-euikit::nav-item href="{{ route('reports.analytics') }}" :active="request()->routeIs('reports.analytics')">
        Analytics
    </x-euikit::nav-item>
</x-euikit::nav>
```

---

## `<x-euikit::nav-item>`
Individual navigation item/link.

### Attributes
- `href` (required) - Link destination
- `active` - Whether this item is currently active (boolean)
- `disabled` - Disable the link (boolean, default: `false`)
- `icon` - Optional icon class (e.g., FontAwesome)
- `badge` - Optional badge text/count
- `class` - Additional CSS classes

### Usage
```blade
{{-- Basic nav item --}}
<x-euikit::nav-item href="{{ route('dashboard') }}">
    Dashboard
</x-euikit::nav-item>

{{-- Active item --}}
<x-euikit::nav-item href="{{ route('posts.index') }}" :active="request()->routeIs('posts.*')">
    Posts
</x-euikit::nav-item>

{{-- With icon --}}
<x-euikit::nav-item href="{{ route('settings') }}" icon="fas fa-cog">
    Settings
</x-euikit::nav-item>

{{-- With badge --}}
<x-euikit::nav-item href="{{ route('notifications') }}" badge="{{ $notificationCount }}">
    Notifications
</x-euikit::nav-item>

{{-- Disabled item --}}
<x-euikit::nav-item href="#" disabled>
    Coming Soon
</x-euikit::nav-item>

{{-- With icon and badge --}}
<x-euikit::nav-item 
    href="{{ route('messages') }}" 
    icon="fas fa-envelope"
    badge="{{ $unreadCount }}"
    :active="request()->routeIs('messages.*')"
>
    Messages
</x-euikit::nav-item>
```

---

## `<x-euikit::breadcrumbs>`
Breadcrumb navigation for showing page hierarchy.

### Attributes
- `items` (required) - Array of breadcrumb items
- `class` - Additional CSS classes

### Item Format
```php
[
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Posts', 'url' => route('posts.index')],
    ['label' => $post->title]  // Last item (no URL = current page)
]
```

### Usage
```blade
{{-- Basic breadcrumbs --}}
<x-euikit::breadcrumbs 
    :items="[
        ['label' => 'Home', 'url' => route('home')],
        ['label' => 'Posts']
    ]"
/>

{{-- Multi-level breadcrumbs --}}
<x-euikit::breadcrumbs 
    :items="[
        ['label' => 'Dashboard', 'url' => route('dashboard')],
        ['label' => 'Posts', 'url' => route('posts.index')],
        ['label' => $post->title, 'url' => route('posts.show', $post)],
        ['label' => 'Edit']
    ]"
/>

{{-- In controller --}}
$breadcrumbs = [
    ['label' => 'Home', 'url' => route('home')],
    ['label' => 'Categories', 'url' => route('categories.index')],
    ['label' => $category->name, 'url' => route('categories.show', $category)],
    ['label' => 'Products']
];

return view('products.index', compact('breadcrumbs'));

{{-- In view --}}
<x-euikit::breadcrumbs :items="$breadcrumbs" />
```

---

## `<x-euikit::dropdown>`
Dropdown menu component.

### Attributes
- `label` (required) - Dropdown button text
- `variant` - Button style: `primary`, `secondary`, etc. (default: `primary`)
- `size` - Button size: `sm`, `md`, `lg` (default: `md`)
- `direction` - Dropdown direction: `down`, `up`, `left`, `right` (default: `down`)
- `class` - Additional CSS classes

### Slots
- **default** - Dropdown menu items

### Usage with `<x-euikit::dropdown-item>`
```blade
{{-- Basic dropdown --}}
<x-euikit::dropdown label="Actions">
    <x-euikit::dropdown-item href="{{ route('posts.create') }}">
        New Post
    </x-euikit::dropdown-item>
    <x-euikit::dropdown-item href="{{ route('posts.drafts') }}">
        View Drafts
    </x-euikit::dropdown-item>
    <x-euikit::dropdown-divider />
    <x-euikit::dropdown-item href="{{ route('posts.archived') }}">
        Archived
    </x-euikit::dropdown-item>
</x-euikit::dropdown>

{{-- User menu dropdown --}}
<x-euikit::dropdown label="{{ auth()->user()->name }}" variant="secondary">
    <x-euikit::dropdown-item href="{{ route('profile') }}" icon="fas fa-user">
        My Profile
    </x-euikit::dropdown-item>
    <x-euikit::dropdown-item href="{{ route('settings') }}" icon="fas fa-cog">
        Settings
    </x-euikit::dropdown-item>
    <x-euikit::dropdown-divider />
    <x-euikit::dropdown-item href="{{ route('logout') }}" icon="fas fa-sign-out-alt">
        Logout
    </x-euikit::dropdown-item>
</x-euikit::dropdown>

{{-- Dropdown with header --}}
<x-euikit::dropdown label="More Options">
    <x-euikit::dropdown-header>Export Options</x-euikit::dropdown-header>
    <x-euikit::dropdown-item href="{{ route('export.pdf') }}">
        Export as PDF
    </x-euikit::dropdown-item>
    <x-euikit::dropdown-item href="{{ route('export.csv') }}">
        Export as CSV
    </x-euikit::dropdown-item>
    <x-euikit::dropdown-divider />
    <x-euikit::dropdown-header>Other Actions</x-euikit::dropdown-header>
    <x-euikit::dropdown-item href="{{ route('archive') }}">
        Archive
    </x-euikit::dropdown-item>
</x-euikit::dropdown>

{{-- Dropdown in table actions --}}
<x-euikit::table :data="$posts">
    <x-slot:actions="{ item }">
        <x-euikit::dropdown label="Actions" size="sm" variant="secondary">
            <x-euikit::dropdown-item href="{{ route('posts.show', $item) }}">
                View
            </x-euikit::dropdown-item>
            <x-euikit::dropdown-item href="{{ route('posts.edit', $item) }}">
                Edit
            </x-euikit::dropdown-item>
            <x-euikit::dropdown-divider />
            <x-euikit::dropdown-item 
                href="{{ route('posts.destroy', $item) }}"
                data-method="delete"
                data-confirm="Are you sure?"
            >
                Delete
            </x-euikit::dropdown-item>
        </x-euikit::dropdown>
    </x-slot:actions>
</x-euikit::table>
```

---

## `<x-euikit::dropdown-item>`
Individual item within a dropdown menu.

### Attributes
- `href` (required) - Link destination
- `icon` - Optional icon class
- `disabled` - Disable the item (boolean)
- `class` - Additional CSS classes

### Usage
```blade
<x-euikit::dropdown-item href="{{ route('profile') }}">
    Profile
</x-euikit::dropdown-item>

<x-euikit::dropdown-item href="{{ route('settings') }}" icon="fas fa-cog">
    Settings
</x-euikit::dropdown-item>

<x-euikit::dropdown-item href="#" disabled>
    Coming Soon
</x-euikit::dropdown-item>
```

---

## `<x-euikit::menu>`
Vertical menu component (useful for sidebars and settings pages).

### Attributes
- `class` - Additional CSS classes

### Usage with `<x-euikit::menu-item>`
```blade
{{-- Settings menu --}}
<x-euikit::menu>
    <x-euikit::menu-item 
        href="{{ route('settings.profile') }}"
        :active="request()->routeIs('settings.profile')"
        icon="fas fa-user"
    >
        Profile Settings
    </x-euikit::menu-item>
    
    <x-euikit::menu-item 
        href="{{ route('settings.security') }}"
        :active="request()->routeIs('settings.security')"
        icon="fas fa-lock"
    >
        Security
    </x-euikit::menu-item>
    
    <x-euikit::menu-item 
        href="{{ route('settings.notifications') }}"
        :active="request()->routeIs('settings.notifications')"
        icon="fas fa-bell"
    >
        Notifications
    </x-euikit::menu-item>
    
    <x-euikit::menu-divider />
    
    <x-euikit::menu-item 
        href="{{ route('settings.billing') }}"
        :active="request()->routeIs('settings.billing')"
        icon="fas fa-credit-card"
    >
        Billing
    </x-euikit::menu-item>
</x-euikit::menu>

{{-- Admin menu with sections --}}
<x-euikit::menu>
    <x-euikit::menu-header>Content Management</x-euikit::menu-header>
    <x-euikit::menu-item href="{{ route('admin.posts') }}" icon="fas fa-file-alt">
        Posts
    </x-euikit::menu-item>
    <x-euikit::menu-item href="{{ route('admin.pages') }}" icon="fas fa-file">
        Pages
    </x-euikit::menu-item>
    
    <x-euikit::menu-header>User Management</x-euikit::menu-header>
    <x-euikit::menu-item href="{{ route('admin.users') }}" icon="fas fa-users">
        Users
    </x-euikit::menu-item>
    <x-euikit::menu-item href="{{ route('admin.roles') }}" icon="fas fa-shield-alt">
        Roles & Permissions
    </x-euikit::menu-item>
</x-euikit::menu>
```

---

## Navigation Patterns

### Main Application Navigation
```blade
{{-- In layout component --}}
<x-euikit::layout title="Dashboard">
    <x-slot:header>
        <x-euikit::nav type="primary">
            <x-slot:brand>
                <a href="{{ route('home') }}">
                    <h1>MyApp</h1>
                </a>
            </x-slot:brand>
            
            <x-euikit::nav-item 
                href="{{ route('dashboard') }}"
                :active="request()->routeIs('dashboard')"
            >
                Dashboard
            </x-euikit::nav-item>
            
            <x-euikit::nav-item 
                href="{{ route('posts.index') }}"
                :active="request()->routeIs('posts.*')"
            >
                Posts
            </x-euikit::nav-item>
            
            <x-euikit::nav-item 
                href="{{ route('users.index') }}"
                :active="request()->routeIs('users.*')"
            >
                Users
            </x-euikit::nav-item>
            
            <x-slot:actions>
                <x-euikit::nav-item 
                    href="{{ route('notifications') }}"
                    icon="fas fa-bell"
                    badge="{{ $notificationCount }}"
                >
                    Notifications
                </x-euikit::nav-item>
                
                <x-euikit::dropdown label="{{ auth()->user()->name }}">
                    <x-euikit::dropdown-item href="{{ route('profile') }}">
                        Profile
                    </x-euikit::dropdown-item>
                    <x-euikit::dropdown-item href="{{ route('settings') }}">
                        Settings
                    </x-euikit::dropdown-item>
                    <x-euikit::dropdown-divider />
                    <x-euikit::dropdown-item href="{{ route('logout') }}">
                        Logout
                    </x-euikit::dropdown-item>
                </x-euikit::dropdown>
            </x-slot:actions>
        </x-euikit::nav>
    </x-slot:header>
    
    {{-- Page content --}}
</x-euikit::layout>
```

### Settings Page with Sidebar Menu
```blade
<x-euikit::layout title="Settings">
    <x-euikit::grid columns="4">
        {{-- Sidebar with menu --}}
        <div>
            <x-euikit::menu>
                <x-euikit::menu-item 
                    href="{{ route('settings.profile') }}"
                    :active="request()->routeIs('settings.profile')"
                    icon="fas fa-user"
                >
                    Profile
                </x-euikit::menu-item>
                
                <x-euikit::menu-item 
                    href="{{ route('settings.account') }}"
                    :active="request()->routeIs('settings.account')"
                    icon="fas fa-id-card"
                >
                    Account
                </x-euikit::menu-item>
                
                <x-euikit::menu-item 
                    href="{{ route('settings.security') }}"
                    :active="request()->routeIs('settings.security')"
                    icon="fas fa-lock"
                >
                    Security
                </x-euikit::menu-item>
                
                <x-euikit::menu-item 
                    href="{{ route('settings.notifications') }}"
                    :active="request()->routeIs('settings.notifications')"
                    icon="fas fa-bell"
                >
                    Notifications
                </x-euikit::menu-item>
            </x-euikit::menu>
        </div>
        
        {{-- Main content (3 columns) --}}
        <div class="col-span-3">
            @yield('content')
        </div>
    </x-euikit::grid>
</x-euikit::layout>
```

### Page with Breadcrumbs and Secondary Nav
```blade
<x-euikit::layout title="Post: {{ $post->title }}">
    {{-- Breadcrumbs --}}
    <x-euikit::breadcrumbs 
        :items="[
            ['label' => 'Home', 'url' => route('home')],
            ['label' => 'Posts', 'url' => route('posts.index')],
            ['label' => $post->title]
        ]"
    />
    
    {{-- Secondary navigation --}}
    <x-euikit::nav type="secondary">
        <x-euikit::nav-item 
            href="{{ route('posts.show', $post) }}"
            :active="request()->routeIs('posts.show')"
        >
            View
        </x-euikit::nav-item>
        
        <x-euikit::nav-item 
            href="{{ route('posts.edit', $post) }}"
            :active="request()->routeIs('posts.edit')"
        >
            Edit
        </x-euikit::nav-item>
        
        <x-euikit::nav-item 
            href="{{ route('posts.comments', $post) }}"
            :active="request()->routeIs('posts.comments')"
        >
            Comments ({{ $post->comments_count }})
        </x-euikit::nav-item>
        
        <x-euikit::nav-item 
            href="{{ route('posts.history', $post) }}"
            :active="request()->routeIs('posts.history')"
        >
            History
        </x-euikit::nav-item>
    </x-euikit::nav>
    
    {{-- Main content --}}
    <x-euikit::card>
        @yield('content')
    </x-euikit::card>
</x-euikit::layout>
```

### Mobile-Responsive Navigation
```blade
<x-euikit::nav type="primary">
    <x-slot:brand>
        <a href="{{ route('home') }}">Logo</a>
    </x-slot:brand>
    
    {{-- Mobile menu toggle --}}
    <button class="mobile-toggle" data-toggle="nav-menu">
        <span class="hamburger"></span>
    </button>
    
    {{-- Collapsible menu --}}
    <div class="nav-menu" id="nav-menu">
        <x-euikit::nav-item href="{{ route('dashboard') }}">
            Dashboard
        </x-euikit::nav-item>
        <x-euikit::nav-item href="{{ route('posts.index') }}">
            Posts
        </x-euikit::nav-item>
        
        {{-- Mobile: user dropdown becomes regular items --}}
        <x-euikit::nav-item href="{{ route('profile') }}" class="mobile-only">
            Profile
        </x-euikit::nav-item>
        <x-euikit::nav-item href="{{ route('logout') }}" class="mobile-only">
            Logout
        </x-euikit::nav-item>
    </div>
    
    {{-- Desktop: user dropdown --}}
    <x-slot:actions>
        <x-euikit::dropdown label="{{ auth()->user()->name }}" class="desktop-only">
            <x-euikit::dropdown-item href="{{ route('profile') }}">Profile</x-euikit::dropdown-item>
            <x-euikit::dropdown-item href="{{ route('logout') }}">Logout</x-euikit::dropdown-item>
        </x-euikit::dropdown>
    </x-slot:actions>
</x-euikit::nav>
```

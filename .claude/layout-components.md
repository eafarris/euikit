# Layout Components

## `<x-euikit::layout>`
Main page layout wrapper that provides consistent structure across the application.

### Attributes
- `title` - Page title (displays in header and browser title)
- `breadcrumbs` - Array of breadcrumb items (optional)
- `class` - Additional CSS classes for the main container

### Slots
- **default** - Main content area (required)
- **header** - Custom header content (optional)
- **sidebar** - Sidebar content (optional)
- **footer** - Custom footer content (optional)

### Features
- Consistent page structure
- Responsive design
- Navigation integration
- Flash message display area
- Optional sidebar layout

### Usage
```blade
{{-- Basic layout --}}
<x-euikit::layout title="Dashboard">
    <h1>Welcome to the Dashboard</h1>
    <p>Your content here...</p>
</x-euikit::layout>

{{-- Layout with sidebar --}}
<x-euikit::layout title="User Profile">
    <x-slot:sidebar>
        <nav>
            <a href="{{ route('profile.edit') }}">Edit Profile</a>
            <a href="{{ route('profile.settings') }}">Settings</a>
            <a href="{{ route('profile.security') }}">Security</a>
        </nav>
    </x-slot:sidebar>
    
    <div class="profile-content">
        {{-- Main content --}}
    </div>
</x-euikit::layout>

{{-- Layout with breadcrumbs --}}
<x-euikit::layout 
    title="Edit Post"
    :breadcrumbs="[
        ['label' => 'Dashboard', 'url' => route('dashboard')],
        ['label' => 'Posts', 'url' => route('posts.index')],
        ['label' => $post->title, 'url' => route('posts.show', $post)],
        ['label' => 'Edit']
    ]"
>
    {{-- Form content --}}
</x-euikit::layout>

{{-- Layout with custom header --}}
<x-euikit::layout title="Reports">
    <x-slot:header>
        <div class="page-actions">
            <x-euikit::button variant="primary">Generate Report</x-euikit::button>
        </div>
    </x-slot:header>
    
    {{-- Report content --}}
</x-euikit::layout>
```

---

## `<x-euikit::card>`
Content card for grouping related information.

### Attributes
- `title` - Card title/heading (optional)
- `class` - Additional CSS classes
- `collapsible` - Make card collapsible (boolean, default: `false`)
- `collapsed` - Start collapsed (boolean, default: `false`)

### Slots
- **default** - Main card content
- **header** - Custom header content (replaces title)
- **footer** - Card footer content

### Usage
```blade
{{-- Basic card --}}
<x-euikit::card title="User Information">
    <p>Name: {{ $user->name }}</p>
    <p>Email: {{ $user->email }}</p>
</x-euikit::card>

{{-- Card with footer --}}
<x-euikit::card title="Post Details">
    <p>{{ $post->body }}</p>
    
    <x-slot:footer>
        <small>Posted on {{ $post->created_at->format('M d, Y') }}</small>
    </x-slot:footer>
</x-euikit::card>

{{-- Card with custom header --}}
<x-euikit::card>
    <x-slot:header>
        <div class="card-header-actions">
            <h3>Settings</h3>
            <x-euikit::button size="sm">Edit</x-euikit::button>
        </div>
    </x-slot:header>
    
    <div class="settings-content">
        {{-- Settings form --}}
    </div>
</x-euikit::card>

{{-- Collapsible card --}}
<x-euikit::card title="Advanced Options" collapsible collapsed>
    <p>These options are for advanced users only.</p>
</x-euikit::card>

{{-- Multiple cards in a grid --}}
<div class="card-grid">
    <x-euikit::card title="Statistics">
        <p>Total Users: {{ $stats->users }}</p>
        <p>Total Posts: {{ $stats->posts }}</p>
    </x-euikit::card>
    
    <x-euikit::card title="Recent Activity">
        <ul>
            @foreach($activities as $activity)
                <li>{{ $activity->description }}</li>
            @endforeach
        </ul>
    </x-euikit::card>
</div>
```

---

## `<x-euikit::section>`
Content section with optional heading and description.

### Attributes
- `title` - Section title (optional)
- `description` - Section description text (optional)
- `class` - Additional CSS classes

### Slots
- **default** - Section content
- **actions** - Action buttons/links in section header

### Usage
```blade
{{-- Basic section --}}
<x-euikit::section title="Personal Information">
    <x-euikit::input name="name" label="Name" />
    <x-euikit::input name="email" label="Email" />
</x-euikit::section>

{{-- Section with description --}}
<x-euikit::section 
    title="Privacy Settings"
    description="Control who can see your information and how we use your data."
>
    <x-euikit::checkbox name="profile_public" label="Make profile public" />
    <x-euikit::checkbox name="show_email" label="Show email address" />
</x-euikit::section>

{{-- Section with actions --}}
<x-euikit::section title="Team Members">
    <x-slot:actions>
        <x-euikit::button size="sm">Invite Member</x-euikit::button>
    </x-slot:actions>
    
    <table>
        @foreach($members as $member)
            <tr>
                <td>{{ $member->name }}</td>
                <td>{{ $member->role }}</td>
            </tr>
        @endforeach
    </table>
</x-euikit::section>
```

---

## `<x-euikit::container>`
Responsive container for centering and constraining content width.

### Attributes
- `size` - Container width: `sm`, `md`, `lg`, `xl`, `fluid` (default: `lg`)
- `class` - Additional CSS classes

### Usage
```blade
{{-- Default container (lg) --}}
<x-euikit::container>
    <h1>Page Content</h1>
    <p>This content is centered and constrained to a max width.</p>
</x-euikit::container>

{{-- Small container --}}
<x-euikit::container size="sm">
    <x-euikit::card title="Login">
        <x-euikit::form action="{{ route('login') }}">
            <x-euikit::input name="email" label="Email" type="email" />
            <x-euikit::input name="password" label="Password" type="password" />
            <x-euikit::button type="submit">Login</x-euikit::button>
        </x-euikit::form>
    </x-euikit::card>
</x-euikit::container>

{{-- Fluid container (no max width) --}}
<x-euikit::container size="fluid">
    <x-euikit::table :data="$items" />
</x-euikit::container>
```

---

## `<x-euikit::grid>`
Responsive grid layout system.

### Attributes
- `columns` - Number of columns: `1`, `2`, `3`, `4`, `6`, `12` (default: `3`)
- `gap` - Gap size: `sm`, `md`, `lg` (default: `md`)
- `class` - Additional CSS classes

### Usage
```blade
{{-- 3-column grid --}}
<x-euikit::grid columns="3">
    <x-euikit::card title="Card 1">Content</x-euikit::card>
    <x-euikit::card title="Card 2">Content</x-euikit::card>
    <x-euikit::card title="Card 3">Content</x-euikit::card>
</x-euikit::grid>

{{-- 2-column grid with large gap --}}
<x-euikit::grid columns="2" gap="lg">
    <div>
        <h3>Left Column</h3>
        <p>Content here...</p>
    </div>
    <div>
        <h3>Right Column</h3>
        <p>Content here...</p>
    </div>
</x-euikit::grid>

{{-- Responsive dashboard --}}
<x-euikit::grid columns="4">
    <x-euikit::card title="Users">
        <p class="stat">1,234</p>
    </x-euikit::card>
    <x-euikit::card title="Posts">
        <p class="stat">5,678</p>
    </x-euikit::card>
    <x-euikit::card title="Comments">
        <p class="stat">9,012</p>
    </x-euikit::card>
    <x-euikit::card title="Revenue">
        <p class="stat">$12,345</p>
    </x-euikit::card>
</x-euikit::grid>
```

---

## Layout Patterns

### Standard Page Layout
```blade
<x-euikit::layout title="Posts">
    <x-euikit::container>
        <x-euikit::card title="All Posts">
            <x-slot:header>
                <div class="header-actions">
                    <h2>All Posts</h2>
                    <x-euikit::button variant="primary">
                        <a href="{{ route('posts.create') }}">New Post</a>
                    </x-euikit::button>
                </div>
            </x-slot:header>
            
            <x-euikit::table :data="$posts" />
        </x-euikit::card>
    </x-euikit::container>
</x-euikit::layout>
```

### Dashboard Layout
```blade
<x-euikit::layout title="Dashboard">
    <x-euikit::container size="fluid">
        {{-- Stats row --}}
        <x-euikit::grid columns="4">
            <x-euikit::card title="Total Users">
                <p class="stat-number">{{ $stats->users }}</p>
            </x-euikit::card>
            <x-euikit::card title="Active Posts">
                <p class="stat-number">{{ $stats->posts }}</p>
            </x-euikit::card>
            <x-euikit::card title="Comments">
                <p class="stat-number">{{ $stats->comments }}</p>
            </x-euikit::card>
            <x-euikit::card title="Revenue">
                <p class="stat-number">${{ number_format($stats->revenue) }}</p>
            </x-euikit::card>
        </x-euikit::grid>
        
        {{-- Main content row --}}
        <x-euikit::grid columns="2">
            <x-euikit::card title="Recent Activity">
                <ul>
                    @foreach($activities as $activity)
                        <li>{{ $activity->description }}</li>
                    @endforeach
                </ul>
            </x-euikit::card>
            
            <x-euikit::card title="Quick Actions">
                <div class="action-buttons">
                    <x-euikit::button>Create Post</x-euikit::button>
                    <x-euikit::button variant="secondary">Manage Users</x-euikit::button>
                    <x-euikit::button variant="info">View Reports</x-euikit::button>
                </div>
            </x-euikit::card>
        </x-euikit::grid>
    </x-euikit::container>
</x-euikit::layout>
```

### Form Page Layout
```blade
<x-euikit::layout title="Create Post">
    <x-euikit::container size="md">
        <x-euikit::card>
            <x-euikit::form action="{{ route('posts.store') }}">
                <x-euikit::section title="Basic Information">
                    <x-euikit::input name="title" label="Title" required />
                    <x-euikit::textarea name="excerpt" label="Excerpt" rows="3" />
                </x-euikit::section>
                
                <x-euikit::section title="Content">
                    <x-euikit::textarea name="body" label="Post Content" rows="12" required />
                </x-euikit::section>
                
                <x-euikit::section title="Settings">
                    <x-euikit::select 
                        name="category_id" 
                        label="Category"
                        :options="$categories->pluck('name', 'id')"
                        required
                    />
                    <x-euikit::checkbox name="featured" label="Featured Post" />
                    <x-euikit::checkbox name="published" label="Publish immediately" />
                </x-euikit::section>
                
                <div class="form-actions">
                    <x-euikit::button type="submit">Create Post</x-euikit::button>
                    <x-euikit::button type="button" variant="secondary">Cancel</x-euikit::button>
                </div>
            </x-euikit::form>
        </x-euikit::card>
    </x-euikit::container>
</x-euikit::layout>
```

### Settings Page with Sidebar
```blade
<x-euikit::layout title="Account Settings">
    <x-slot:sidebar>
        <nav class="settings-nav">
            <a href="{{ route('settings.profile') }}" class="active">Profile</a>
            <a href="{{ route('settings.security') }}">Security</a>
            <a href="{{ route('settings.notifications') }}">Notifications</a>
            <a href="{{ route('settings.billing') }}">Billing</a>
        </nav>
    </x-slot:sidebar>
    
    <x-euikit::container>
        <x-euikit::card title="Profile Settings">
            <x-euikit::form action="{{ route('settings.profile.update') }}" method="PUT">
                <x-euikit::input name="name" label="Name" :value="$user->name" required />
                <x-euikit::input name="email" label="Email" type="email" :value="$user->email" required />
                <x-euikit::textarea name="bio" label="Bio" :value="$user->bio" rows="4" />
                <x-euikit::button type="submit">Save Changes</x-euikit::button>
            </x-euikit::form>
        </x-euikit::card>
    </x-euikit::container>
</x-euikit::layout>
```

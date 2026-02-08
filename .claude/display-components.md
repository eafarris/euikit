# Display Components

## `<x-euikit::alert>`
Display alert messages for success, error, warning, and informational feedback.

### Attributes
- `type` (required) - Alert type: `success`, `error`, `warning`, `info`
- `dismissible` - Allow user to close alert (boolean, default: `false`)
- `class` - Additional CSS classes

### Slots
- **default** - Alert message content
- **title** - Optional alert title

### Features
- Automatic styling based on type
- Optional close button
- Icon display for each type
- Accessible ARIA attributes

### Usage
```blade
{{-- Success alert --}}
<x-euikit::alert type="success">
    Your changes have been saved successfully!
</x-euikit::alert>

{{-- Error alert --}}
<x-euikit::alert type="error">
    There was an error processing your request.
</x-euikit::alert>

{{-- Warning alert --}}
<x-euikit::alert type="warning">
    Your subscription will expire in 3 days.
</x-euikit::alert>

{{-- Info alert --}}
<x-euikit::alert type="info">
    New features are now available. Check them out!
</x-euikit::alert>

{{-- Dismissible alert --}}
<x-euikit::alert type="success" dismissible>
    Account created successfully. Welcome aboard!
</x-euikit::alert>

{{-- Alert with title --}}
<x-euikit::alert type="error">
    <x-slot:title>Upload Failed</x-slot:title>
    The file you selected is too large. Maximum size is 10MB.
</x-euikit::alert>

{{-- Display validation errors --}}
@if($errors->any())
    <x-euikit::alert type="error">
        <x-slot:title>Please correct the following errors:</x-slot:title>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </x-euikit::alert>
@endif

{{-- Display flash messages --}}
@if(session('success'))
    <x-euikit::alert type="success" dismissible>
        {{ session('success') }}
    </x-euikit::alert>
@endif
```

---

## `<x-euikit::table>`
Data table with sorting, pagination, and action support.

### Attributes
- `data` (required) - Collection or array of data
- `columns` - Array of column definitions (optional, auto-detects from data)
- `sortable` - Enable column sorting (boolean, default: `false`)
- `striped` - Striped rows (boolean, default: `true`)
- `hoverable` - Hover effect on rows (boolean, default: `true`)
- `class` - Additional CSS classes

### Column Definition Format
```php
[
    'key' => 'name',           // Data key
    'label' => 'Name',         // Column header
    'sortable' => true,        // Can this column be sorted?
    'format' => fn($value) => strtoupper($value)  // Optional formatter
]
```

### Slots
- **actions** - Custom actions column (receives `$item` variable)
- **empty** - Content to show when data is empty

### Usage
```blade
{{-- Basic table (auto-detects columns) --}}
<x-euikit::table :data="$users" />

{{-- Table with custom columns --}}
<x-euikit::table 
    :data="$posts"
    :columns="[
        ['key' => 'title', 'label' => 'Post Title', 'sortable' => true],
        ['key' => 'author.name', 'label' => 'Author'],
        ['key' => 'created_at', 'label' => 'Published', 'format' => fn($date) => $date->format('M d, Y')],
        ['key' => 'status', 'label' => 'Status']
    ]"
/>

{{-- Table with actions column --}}
<x-euikit::table :data="$posts">
    <x-slot:actions="{ item }">
        <a href="{{ route('posts.show', $item) }}">View</a>
        <a href="{{ route('posts.edit', $item) }}">Edit</a>
        <form action="{{ route('posts.destroy', $item) }}" method="POST" style="display: inline;">
            @csrf
            @method('DELETE')
            <button type="submit">Delete</button>
        </form>
    </x-slot:actions>
</x-euikit::table>

{{-- Table with empty state --}}
<x-euikit::table :data="$posts">
    <x-slot:empty>
        <p>No posts found. <a href="{{ route('posts.create') }}">Create your first post</a></p>
    </x-slot:empty>
</x-euikit::table>

{{-- Sortable table --}}
<x-euikit::table :data="$users" sortable />

{{-- Table without stripes --}}
<x-euikit::table :data="$items" :striped="false" />
```

---

## `<x-euikit::badge>`
Small label or status indicator.

### Attributes
- `variant` - Badge style: `primary`, `secondary`, `success`, `danger`, `warning`, `info`, `light`, `dark` (default: `primary`)
- `size` - Badge size: `sm`, `md`, `lg` (default: `md`)
- `pill` - Rounded pill style (boolean, default: `false`)
- `class` - Additional CSS classes

### Usage
```blade
{{-- Basic badge --}}
<x-euikit::badge>New</x-euikit::badge>

{{-- Success badge --}}
<x-euikit::badge variant="success">Active</x-euikit::badge>

{{-- Danger badge --}}
<x-euikit::badge variant="danger">Deleted</x-euikit::badge>

{{-- Warning badge --}}
<x-euikit::badge variant="warning">Pending</x-euikit::badge>

{{-- Pill badge --}}
<x-euikit::badge variant="info" pill>Beta</x-euikit::badge>

{{-- Small badge --}}
<x-euikit::badge size="sm" variant="secondary">Draft</x-euikit::badge>

{{-- In table cells --}}
<x-euikit::table :data="$posts">
    <x-slot:columns>
        @foreach($posts as $post)
            <tr>
                <td>{{ $post->title }}</td>
                <td>
                    @if($post->published)
                        <x-euikit::badge variant="success">Published</x-euikit::badge>
                    @else
                        <x-euikit::badge variant="warning">Draft</x-euikit::badge>
                    @endif
                </td>
            </tr>
        @endforeach
    </x-slot:columns>
</x-euikit::table>

{{-- Count badges --}}
<h3>
    Notifications 
    <x-euikit::badge variant="danger" pill>{{ $notificationCount }}</x-euikit::badge>
</h3>
```

---

## `<x-euikit::modal>`
Modal dialog for overlays and confirmations.

### Attributes
- `id` (required) - Unique modal identifier
- `title` - Modal title
- `size` - Modal size: `sm`, `md`, `lg`, `xl` (default: `md`)
- `dismissible` - Allow closing via X button or backdrop click (boolean, default: `true`)
- `class` - Additional CSS classes

### Slots
- **default** - Modal body content
- **header** - Custom header content (replaces title)
- **footer** - Modal footer (buttons, actions)

### Usage
```blade
{{-- Basic modal --}}
<x-euikit::modal id="info-modal" title="Information">
    <p>This is some important information.</p>
    
    <x-slot:footer>
        <x-euikit::button data-dismiss="modal">Close</x-euikit::button>
    </x-slot:footer>
</x-euikit::modal>

{{-- Trigger button --}}
<x-euikit::button data-toggle="modal" data-target="#info-modal">
    Show Info
</x-euikit::button>

{{-- Confirmation modal --}}
<x-euikit::modal id="delete-modal" title="Confirm Deletion" size="sm">
    <p>Are you sure you want to delete this item? This action cannot be undone.</p>
    
    <x-slot:footer>
        <x-euikit::form action="{{ route('posts.destroy', $post) }}" method="DELETE">
            <x-euikit::button type="submit" variant="danger">Delete</x-euikit::button>
            <x-euikit::button type="button" variant="secondary" data-dismiss="modal">
                Cancel
            </x-euikit::button>
        </x-euikit::form>
    </x-slot:footer>
</x-euikit::modal>

{{-- Large modal with form --}}
<x-euikit::modal id="edit-modal" title="Edit User" size="lg">
    <x-euikit::form action="{{ route('users.update', $user) }}" method="PUT">
        <x-euikit::input name="name" label="Name" :value="$user->name" />
        <x-euikit::input name="email" label="Email" :value="$user->email" />
        
        <x-slot:footer>
            <x-euikit::button type="submit" variant="primary">Save Changes</x-euikit::button>
            <x-euikit::button type="button" variant="secondary" data-dismiss="modal">
                Cancel
            </x-euikit::button>
        </x-slot:footer>
    </x-euikit::form>
</x-euikit::modal>

{{-- Non-dismissible modal --}}
<x-euikit::modal id="loading-modal" title="Processing..." :dismissible="false">
    <p>Please wait while we process your request...</p>
    <div class="spinner"></div>
</x-euikit::modal>
```

---

## `<x-euikit::tabs>`
Tabbed interface for organizing content.

### Attributes
- `active` - ID of the initially active tab (default: first tab)
- `class` - Additional CSS classes

### Tab Format
Use `<x-euikit::tab>` components inside:
- `id` (required) - Unique tab identifier
- `label` (required) - Tab label text

### Usage
```blade
<x-euikit::tabs active="profile">
    <x-euikit::tab id="profile" label="Profile">
        <h3>Profile Information</h3>
        <x-euikit::input name="name" label="Name" :value="$user->name" />
        <x-euikit::input name="email" label="Email" :value="$user->email" />
    </x-euikit::tab>
    
    <x-euikit::tab id="security" label="Security">
        <h3>Security Settings</h3>
        <x-euikit::input name="current_password" label="Current Password" type="password" />
        <x-euikit::input name="new_password" label="New Password" type="password" />
    </x-euikit::tab>
    
    <x-euikit::tab id="preferences" label="Preferences">
        <h3>User Preferences</h3>
        <x-euikit::checkbox name="notifications" label="Email Notifications" />
        <x-euikit::checkbox name="newsletter" label="Newsletter Subscription" />
    </x-euikit::tab>
</x-euikit::tabs>
```

---

## `<x-euikit::pagination>`
Pagination controls for large datasets.

### Attributes
- `paginator` (required) - Laravel paginator instance
- `class` - Additional CSS classes

### Usage
```blade
{{-- In controller --}}
$posts = Post::paginate(15);

{{-- In view --}}
<x-euikit::table :data="$posts" />

<x-euikit::pagination :paginator="$posts" />

{{-- With custom query strings --}}
$posts = Post::where('status', 'published')->paginate(15);

<x-euikit::pagination :paginator="$posts" />
```

---

## `<x-euikit::loading>`
Loading spinner or skeleton placeholder.

### Attributes
- `type` - Loading type: `spinner`, `skeleton`, `pulse` (default: `spinner`)
- `size` - Size: `sm`, `md`, `lg` (default: `md`)
- `text` - Optional loading text
- `class` - Additional CSS classes

### Usage
```blade
{{-- Basic spinner --}}
<x-euikit::loading />

{{-- Spinner with text --}}
<x-euikit::loading text="Loading posts..." />

{{-- Large spinner --}}
<x-euikit::loading size="lg" />

{{-- Skeleton loader for content placeholder --}}
<x-euikit::loading type="skeleton" />

{{-- Conditional loading --}}
@if($loading)
    <x-euikit::loading text="Please wait..." />
@else
    <x-euikit::table :data="$items" />
@endif
```

---

## Display Patterns

### Success/Error Feedback
```blade
{{-- After form submission --}}
@if(session('success'))
    <x-euikit::alert type="success" dismissible>
        {{ session('success') }}
    </x-euikit::alert>
@endif

@if(session('error'))
    <x-euikit::alert type="error" dismissible>
        {{ session('error') }}
    </x-euikit::alert>
@endif

{{-- Controller --}}
return to_route('posts.index')->with('success', 'Post created successfully!');
```

### Data Table with Actions
```blade
<x-euikit::card title="Posts">
    <x-euikit::table :data="$posts">
        <x-slot:actions="{ item }">
            <a href="{{ route('posts.show', $item) }}">
                <x-euikit::badge variant="info">View</x-euikit::badge>
            </a>
            <a href="{{ route('posts.edit', $item) }}">
                <x-euikit::badge variant="secondary">Edit</x-euikit::badge>
            </a>
            <button 
                data-toggle="modal" 
                data-target="#delete-modal-{{ $item->id }}"
            >
                <x-euikit::badge variant="danger">Delete</x-euikit::badge>
            </button>
        </x-slot:actions>
    </x-euikit::table>
    
    <x-euikit::pagination :paginator="$posts" />
</x-euikit::card>
```

### Status Indicators
```blade
<x-euikit::table :data="$orders">
    @foreach($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->customer }}</td>
            <td>
                @switch($order->status)
                    @case('pending')
                        <x-euikit::badge variant="warning">Pending</x-euikit::badge>
                        @break
                    @case('processing')
                        <x-euikit::badge variant="info">Processing</x-euikit::badge>
                        @break
                    @case('completed')
                        <x-euikit::badge variant="success">Completed</x-euikit::badge>
                        @break
                    @case('cancelled')
                        <x-euikit::badge variant="danger">Cancelled</x-euikit::badge>
                        @break
                @endswitch
            </td>
        </tr>
    @endforeach
</x-euikit::table>
```

### Tabbed Form
```blade
<x-euikit::card title="Edit Product">
    <x-euikit::form action="{{ route('products.update', $product) }}" method="PUT">
        <x-euikit::tabs>
            <x-euikit::tab id="basic" label="Basic Info">
                <x-euikit::input name="name" label="Product Name" :value="$product->name" required />
                <x-euikit::input name="sku" label="SKU" :value="$product->sku" required />
                <x-euikit::textarea name="description" label="Description" :value="$product->description" />
            </x-euikit::tab>
            
            <x-euikit::tab id="pricing" label="Pricing">
                <x-euikit::input name="price" label="Price" type="number" :value="$product->price" step="0.01" />
                <x-euikit::input name="cost" label="Cost" type="number" :value="$product->cost" step="0.01" />
            </x-euikit::tab>
            
            <x-euikit::tab id="inventory" label="Inventory">
                <x-euikit::input name="quantity" label="Quantity" type="number" :value="$product->quantity" />
                <x-euikit::checkbox name="track_inventory" label="Track Inventory" :checked="$product->track_inventory" />
            </x-euikit::tab>
        </x-euikit::tabs>
        
        <div class="form-actions">
            <x-euikit::button type="submit">Update Product</x-euikit::button>
        </div>
    </x-euikit::form>
</x-euikit::card>
```

# EUIKit Quick Reference

## Component Prefix
All components use: `<x-euikit::component-name>`

## Most Common Components

### Forms
```blade
{{-- Form wrapper --}}
<x-euikit::form action="{{ route('resource.store') }}" method="POST">

{{-- Text input --}}
<x-euikit::input name="title" label="Title" required />

{{-- Textarea --}}
<x-euikit::textarea name="body" label="Content" rows="10" />

{{-- Select dropdown --}}
<x-euikit::select name="category_id" label="Category" :options="$categories->pluck('name', 'id')" />

{{-- Checkbox --}}
<x-euikit::checkbox name="active" label="Active" />

{{-- Submit button --}}
<x-euikit::button type="submit">Save</x-euikit::button>
```

### Layout
```blade
{{-- Page layout --}}
<x-euikit::layout title="Page Title">
    {{-- Content --}}
</x-euikit::layout>

{{-- Container --}}
<x-euikit::container size="md">
    {{-- Constrained content --}}
</x-euikit::container>

{{-- Card --}}
<x-euikit::card title="Section Title">
    {{-- Card content --}}
</x-euikit::card>

{{-- Grid --}}
<x-euikit::grid columns="3">
    {{-- Grid items --}}
</x-euikit::grid>
```

### Display
```blade
{{-- Alert --}}
<x-euikit::alert type="success">Message</x-euikit::alert>

{{-- Table --}}
<x-euikit::table :data="$items" />

{{-- Badge --}}
<x-euikit::badge variant="success">Active</x-euikit::badge>

{{-- Pagination --}}
<x-euikit::pagination :paginator="$items" />
```

### Navigation
```blade
{{-- Main nav --}}
<x-euikit::nav type="primary">
    <x-euikit::nav-item href="{{ route('dashboard') }}">Dashboard</x-euikit::nav-item>
</x-euikit::nav>

{{-- Breadcrumbs --}}
<x-euikit::breadcrumbs :items="[['label' => 'Home', 'url' => route('home')]]" />

{{-- Dropdown --}}
<x-euikit::dropdown label="Actions">
    <x-euikit::dropdown-item href="{{ route('edit') }}">Edit</x-euikit::dropdown-item>
</x-euikit::dropdown>
```

## Common Patterns

### Complete CRUD Index Page
```blade
<x-euikit::layout title="Posts">
    <x-euikit::container>
        @if(session('success'))
            <x-euikit::alert type="success" dismissible>
                {{ session('success') }}
            </x-euikit::alert>
        @endif
        
        <x-euikit::card title="All Posts">
            <x-slot:header>
                <div class="header-actions">
                    <h2>All Posts</h2>
                    <x-euikit::button href="{{ route('posts.create') }}">New Post</x-euikit::button>
                </div>
            </x-slot:header>
            
            <x-euikit::table :data="$posts">
                <x-slot:actions="{ item }">
                    <a href="{{ route('posts.edit', $item) }}">Edit</a>
                </x-slot:actions>
            </x-euikit::table>
            
            <x-euikit::pagination :paginator="$posts" />
        </x-euikit::card>
    </x-euikit::container>
</x-euikit::layout>
```

### Complete Create Form
```blade
<x-euikit::layout title="Create Post">
    <x-euikit::container size="md">
        <x-euikit::card>
            <x-euikit::form action="{{ route('posts.store') }}">
                <x-euikit::input name="title" label="Title" required />
                <x-euikit::textarea name="body" label="Content" rows="10" required />
                <x-euikit::select 
                    name="category_id" 
                    label="Category"
                    :options="$categories->pluck('name', 'id')"
                    required
                />
                <x-euikit::checkbox name="published" label="Publish immediately" />
                
                <div class="form-actions">
                    <x-euikit::button type="submit">Create</x-euikit::button>
                    <x-euikit::button type="button" variant="secondary">Cancel</x-euikit::button>
                </div>
            </x-euikit::form>
        </x-euikit::card>
    </x-euikit::container>
</x-euikit::layout>
```

### Complete Edit Form
```blade
<x-euikit::layout title="Edit Post">
    <x-euikit::container size="md">
        <x-euikit::card>
            <x-euikit::form action="{{ route('posts.update', $post) }}" method="PUT">
                <x-euikit::input name="title" label="Title" :value="$post->title" required />
                <x-euikit::textarea name="body" label="Content" :value="$post->body" rows="10" required />
                <x-euikit::select 
                    name="category_id" 
                    label="Category"
                    :options="$categories->pluck('name', 'id')"
                    :value="$post->category_id"
                    required
                />
                <x-euikit::checkbox name="published" label="Published" :checked="$post->published" />
                
                <div class="form-actions">
                    <x-euikit::button type="submit">Update</x-euikit::button>
                    <x-euikit::button type="button" variant="secondary">Cancel</x-euikit::button>
                </div>
            </x-euikit::form>
        </x-euikit::card>
    </x-euikit::container>
</x-euikit::layout>
```

## Controller Patterns

### Index
```php
public function index()
{
    $posts = Post::with('category')->paginate(15);
    return view('posts.index', compact('posts'));
}
```

### Create
```php
public function create()
{
    $categories = Category::all();
    return view('posts.create', compact('categories'));
}
```

### Store
```php
public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required',
        'category_id' => 'required|exists:categories,id',
    ]);
    
    Post::create($validated);
    
    return to_route('posts.index')->with('success', 'Post created!');
}
```

### Edit
```php
public function edit(Post $post)
{
    $this->authorize('update', $post);
    $categories = Category::all();
    return view('posts.edit', compact('post', 'categories'));
}
```

### Update
```php
public function update(Request $request, Post $post)
{
    $this->authorize('update', $post);
    
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'body' => 'required',
        'category_id' => 'required|exists:categories,id',
    ]);
    
    $post->update($validated);
    
    return to_route('posts.show', $post)->with('success', 'Post updated!');
}
```

### Destroy
```php
public function destroy(Post $post)
{
    $this->authorize('delete', $post);
    $post->delete();
    
    return to_route('posts.index')->with('success', 'Post deleted!');
}
```

## Common Attributes

### Form Components
- `name` - Field name (required)
- `label` - Field label (required)
- `value` - Default/current value
- `required` - Mark as required
- `disabled` - Disable field
- `placeholder` - Placeholder text

### Button
- `type` - `button`, `submit`, `reset`
- `variant` - `primary`, `secondary`, `danger`, `success`, `warning`, `info`
- `size` - `sm`, `md`, `lg`
- `disabled` - Disable button

### Layout
- `title` - Page/section title
- `class` - Additional CSS classes
- `size` - Size variant (for containers, buttons, etc.)

### Alert
- `type` - `success`, `error`, `warning`, `info`
- `dismissible` - Can be closed by user

### Badge
- `variant` - `primary`, `secondary`, `success`, `danger`, `warning`, `info`
- `size` - `sm`, `md`, `lg`
- `pill` - Rounded pill style

## Automatic Features

✅ **Forms automatically include:**
- CSRF token (`@csrf`)
- Method spoofing for PUT/PATCH/DELETE
- Old input repopulation
- Validation error display

✅ **No need to manually:**
- Add `@csrf` tokens
- Add `@method('PUT')` directives
- Call `old('field')` 
- Display `@error('field')` messages

## Active State Detection

```blade
{{-- Check if on specific route --}}
:active="request()->routeIs('posts.index')"

{{-- Check if in route group --}}
:active="request()->routeIs('posts.*')"

{{-- Multiple routes --}}
:active="request()->routeIs(['posts.index', 'posts.create'])"
```

## Select Options Formats

```blade
{{-- From database --}}
:options="Category::pluck('name', 'id')"

{{-- From controller variable --}}
:options="$categories->pluck('name', 'id')"

{{-- Static array --}}
:options="['draft' => 'Draft', 'published' => 'Published']"

{{-- Simple array (value = label) --}}
:options="['Draft', 'Published', 'Archived']"
```

## Flash Messages

**Controller:**
```php
return to_route('posts.index')->with('success', 'Post created!');
return to_route('posts.index')->with('error', 'Something went wrong!');
```

**View:**
```blade
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
```

## Common Slots

```blade
{{-- Card slots --}}
<x-euikit::card>
    <x-slot:header>Header content</x-slot:header>
    Main content
    <x-slot:footer>Footer content</x-slot:footer>
</x-euikit::card>

{{-- Layout slots --}}
<x-euikit::layout title="Page">
    <x-slot:sidebar>Sidebar content</x-slot:sidebar>
    Main content
</x-euikit::layout>

{{-- Nav slots --}}
<x-euikit::nav>
    <x-slot:brand>Logo</x-slot:brand>
    Nav items
    <x-slot:actions>Action buttons</x-slot:actions>
</x-euikit::nav>
```

## File Uploads

```blade
{{-- Form must have enctype --}}
<x-euikit::form action="{{ route('upload') }}" enctype="multipart/form-data">
    <x-euikit::file name="document" label="Upload File" accept=".pdf,.doc" />
    <x-euikit::button type="submit">Upload</x-euikit::button>
</x-euikit::form>
```

**Controller:**
```php
public function store(Request $request)
{
    $request->validate([
        'document' => 'required|file|mimes:pdf,doc,docx|max:10240',
    ]);
    
    $path = $request->file('document')->store('documents');
    
    return to_route('index')->with('success', 'File uploaded!');
}
```

## Authorization Checks

```blade
{{-- Can directive --}}
@can('create', App\Models\Post::class)
    <x-euikit::button href="{{ route('posts.create') }}">New Post</x-euikit::button>
@endcan

@can('update', $post)
    <x-euikit::button href="{{ route('posts.edit', $post) }}">Edit</x-euikit::button>
@endcan

{{-- Cannot directive --}}
@cannot('delete', $post)
    <p>You cannot delete this post.</p>
@endcannot
```

## Validation Messages

**Controller:**
```php
$request->validate([
    'email' => 'required|email',
    'password' => 'required|min:8',
]);
```

**View:** (Errors display automatically in components)
```blade
<x-euikit::input name="email" label="Email" type="email" required />
<x-euikit::input name="password" label="Password" type="password" required />
```

## Responsive Grid

```blade
{{-- 3 columns on desktop, stacks on mobile --}}
<x-euikit::grid columns="3">
    <x-euikit::card title="Card 1">Content</x-euikit::card>
    <x-euikit::card title="Card 2">Content</x-euikit::card>
    <x-euikit::card title="Card 3">Content</x-euikit::card>
</x-euikit::grid>
```

## Key Reminders

1. **Always use `:` for dynamic attributes**: `:value="$var"` not `value="{{ $var }}"`
2. **Use `to_route()` for redirects**: `return to_route('posts.index')`
3. **Eager load relationships**: `Post::with('category')->get()`
4. **Paginate large datasets**: `Post::paginate(15)`
5. **Authorize actions**: `$this->authorize('update', $post)`
6. **Flash messages for feedback**: `->with('success', 'Message')`

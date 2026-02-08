# EUIKit Conventions & Best Practices

## General Conventions

### Component Naming
- **Component files**: kebab-case (e.g., `text-input.blade.php`, `nav-item.blade.php`)
- **Component usage**: kebab-case with `x-euikit::` prefix (e.g., `<x-euikit::text-input>`)
- **Component classes**: PascalCase (e.g., `TextInput.php`, `NavItem.php`)
- **Slots**: camelCase or kebab-case accepted

### Attribute Naming
- Use kebab-case for consistency: `form-action`, `button-type`, `nav-item`
- Boolean attributes can be valueless: `<x-euikit::input required />` instead of `required="true"`
- Bind dynamic values with `:attribute="$value"`

### Required vs Optional Attributes
Components indicate required attributes in their documentation. Common patterns:
- Form fields: `name` and `label` are always required
- Navigation: `href` is required for links
- Layout: `title` is often required for context

## Laravel Integration Patterns

### Automatic Features

#### Old Input Repopulation
Form components automatically repopulate values after validation failures:
```blade
{{-- No need to manually handle old() --}}
<x-euikit::input name="email" label="Email" />

{{-- Equivalent to: --}}
<input name="email" value="{{ old('email') }}">
```

#### Validation Error Display
Components automatically show validation errors below fields:
```blade
{{-- Errors appear automatically --}}
<x-euikit::input name="email" label="Email" />

{{-- No need for: --}}
@error('email')
    <span class="error">{{ $message }}</span>
@enderror
```

#### CSRF Protection
Form component includes CSRF token automatically:
```blade
<x-euikit::form action="{{ route('posts.store') }}">
    {{-- @csrf is included automatically --}}
</x-euikit::form>
```

#### Method Spoofing
Form component handles PUT/PATCH/DELETE automatically:
```blade
<x-euikit::form action="{{ route('posts.update', $post) }}" method="PUT">
    {{-- @method('PUT') is included automatically --}}
</x-euikit::form>
```

### Route Integration
Components work seamlessly with Laravel's routing:
```blade
{{-- Named routes --}}
<x-euikit::form action="{{ route('posts.store') }}">

{{-- Route parameters --}}
<x-euikit::nav-item href="{{ route('posts.show', $post) }}">

{{-- Active state detection --}}
<x-euikit::nav-item 
    href="{{ route('dashboard') }}"
    :active="request()->routeIs('dashboard')"
>
```

### Authorization Integration
Components work with Laravel policies:
```blade
@can('create', App\Models\Post::class)
    <x-euikit::button href="{{ route('posts.create') }}">
        New Post
    </x-euikit::button>
@endcan

@can('update', $post)
    <x-euikit::button href="{{ route('posts.edit', $post) }}">
        Edit
    </x-euikit::button>
@endcan
```

## Form Patterns

### Standard CRUD Operations

#### Create Form
```blade
<x-euikit::form action="{{ route('resource.store') }}">
    <x-euikit::input name="name" label="Name" required />
    <x-euikit::textarea name="description" label="Description" />
    <x-euikit::button type="submit">Create</x-euikit::button>
</x-euikit::form>
```

#### Edit Form
```blade
<x-euikit::form action="{{ route('resource.update', $item) }}" method="PUT">
    <x-euikit::input name="name" label="Name" :value="$item->name" required />
    <x-euikit::textarea name="description" label="Description" :value="$item->description" />
    <x-euikit::button type="submit">Update</x-euikit::button>
</x-euikit::form>
```

#### Delete Action
```blade
<x-euikit::form action="{{ route('resource.destroy', $item) }}" method="DELETE">
    <x-euikit::button type="submit" variant="danger">Delete</x-euikit::button>
</x-euikit::form>
```

### Form Validation Pattern

**Controller:**
```php
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:8|confirmed',
    ]);
    
    // Create resource...
    
    return to_route('resource.index')
        ->with('success', 'Resource created successfully!');
}
```

**View:**
```blade
{{-- Errors display automatically in components --}}
<x-euikit::form action="{{ route('users.store') }}">
    <x-euikit::input name="name" label="Name" required />
    <x-euikit::input name="email" label="Email" type="email" required />
    <x-euikit::input name="password" label="Password" type="password" required />
    <x-euikit::input name="password_confirmation" label="Confirm Password" type="password" required />
    <x-euikit::button type="submit">Create User</x-euikit::button>
</x-euikit::form>
```

### Select Options Patterns

**From Collection:**
```blade
{{-- Get options from database --}}
<x-euikit::select 
    name="category_id" 
    label="Category"
    :options="App\Models\Category::pluck('name', 'id')"
/>
```

**From Controller:**
```php
public function create()
{
    $categories = Category::all();
    return view('posts.create', compact('categories'));
}
```
```blade
<x-euikit::select 
    name="category_id" 
    label="Category"
    :options="$categories->pluck('name', 'id')"
/>
```

**Static Options:**
```blade
<x-euikit::select 
    name="status" 
    label="Status"
    :options="['draft' => 'Draft', 'published' => 'Published', 'archived' => 'Archived']"
/>
```

## Layout Patterns

### Standard Page Structure
```blade
<x-euikit::layout title="Page Title">
    <x-euikit::container>
        <x-euikit::card title="Section Title">
            {{-- Content here --}}
        </x-euikit::card>
    </x-euikit::container>
</x-euikit::layout>
```

### Index Page Pattern
```blade
<x-euikit::layout title="Posts">
    <x-euikit::container>
        {{-- Flash messages --}}
        @if(session('success'))
            <x-euikit::alert type="success" dismissible>
                {{ session('success') }}
            </x-euikit::alert>
        @endif
        
        <x-euikit::card title="All Posts">
            {{-- Action button in header --}}
            <x-slot:header>
                <div class="header-actions">
                    <h2>All Posts</h2>
                    @can('create', App\Models\Post::class)
                        <x-euikit::button href="{{ route('posts.create') }}">
                            New Post
                        </x-euikit::button>
                    @endcan
                </div>
            </x-slot:header>
            
            {{-- Data table --}}
            <x-euikit::table :data="$posts">
                <x-slot:actions="{ item }">
                    <a href="{{ route('posts.show', $item) }}">View</a>
                    @can('update', $item)
                        <a href="{{ route('posts.edit', $item) }}">Edit</a>
                    @endcan
                    @can('delete', $item)
                        <form action="{{ route('posts.destroy', $item) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    @endcan
                </x-slot:actions>
            </x-euikit::table>
            
            {{-- Pagination --}}
            <x-euikit::pagination :paginator="$posts" />
        </x-euikit::card>
    </x-euikit::container>
</x-euikit::layout>
```

### Form Page Pattern
```blade
<x-euikit::layout title="Create Post">
    <x-euikit::container size="md">
        <x-euikit::card>
            <x-euikit::form action="{{ route('posts.store') }}">
                {{-- Form sections --}}
                <x-euikit::section title="Basic Information">
                    <x-euikit::input name="title" label="Title" required />
                    <x-euikit::textarea name="excerpt" label="Excerpt" rows="3" />
                </x-euikit::section>
                
                <x-euikit::section title="Content">
                    <x-euikit::textarea name="body" label="Content" rows="12" required />
                </x-euikit::section>
                
                <x-euikit::section title="Settings">
                    <x-euikit::select 
                        name="category_id" 
                        label="Category"
                        :options="$categories->pluck('name', 'id')"
                        required
                    />
                    <x-euikit::checkbox name="published" label="Publish immediately" />
                </x-euikit::section>
                
                {{-- Form actions --}}
                <div class="form-actions">
                    <x-euikit::button type="submit">Create Post</x-euikit::button>
                    <x-euikit::button type="button" variant="secondary" onclick="history.back()">
                        Cancel
                    </x-euikit::button>
                </div>
            </x-euikit::form>
        </x-euikit::card>
    </x-euikit::container>
</x-euikit::layout>
```

## Controller Patterns

### Standard Resource Controller Methods

```php
namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('category', 'author')->paginate(15);
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('posts.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        
        $post = Post::create($validated);
        
        return to_route('posts.index')
            ->with('success', 'Post created successfully!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        $this->authorize('update', $post);
        $categories = Category::all();
        return view('posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, Post $post)
    {
        $this->authorize('update', $post);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required',
            'category_id' => 'required|exists:categories,id',
        ]);
        
        $post->update($validated);
        
        return to_route('posts.show', $post)
            ->with('success', 'Post updated successfully!');
    }

    public function destroy(Post $post)
    {
        $this->authorize('delete', $post);
        $post->delete();
        
        return to_route('posts.index')
            ->with('success', 'Post deleted successfully!');
    }
}
```

## Common Mistakes to Avoid

### ❌ Don't manually add CSRF tokens
```blade
{{-- WRONG --}}
<x-euikit::form action="{{ route('posts.store') }}">
    @csrf  {{-- Already included by form component --}}
</x-euikit::form>
```

### ❌ Don't manually handle old() values
```blade
{{-- WRONG --}}
<x-euikit::input 
    name="email" 
    label="Email" 
    :value="old('email')"  {{-- Component handles this --}}
/>
```

### ❌ Don't manually display validation errors
```blade
{{-- WRONG --}}
<x-euikit::input name="email" label="Email" />
@error('email')  {{-- Component displays errors --}}
    <span class="error">{{ $message }}</span>
@enderror
```

### ❌ Don't use redirect()->route() when to_route() works
```php
// WRONG
return redirect()->route('posts.index');

// RIGHT
return to_route('posts.index');
```

### ❌ Don't forget to authorize actions
```php
// WRONG
public function edit(Post $post)
{
    // Missing authorization check
    return view('posts.edit', compact('post'));
}

// RIGHT
public function edit(Post $post)
{
    $this->authorize('update', $post);
    return view('posts.edit', compact('post'));
}
```

## Performance Considerations

### Eager Loading
Always eager load relationships when displaying collections:
```php
// GOOD
$posts = Post::with('category', 'author')->paginate(15);

// BAD (N+1 queries)
$posts = Post::paginate(15);
// Then accessing $post->category in the view
```

### Select Only Needed Columns
For dropdowns and selects, only retrieve necessary columns:
```php
// GOOD
$categories = Category::select('id', 'name')->get();
$options = $categories->pluck('name', 'id');

// ACCEPTABLE (but less efficient)
$categories = Category::all();
$options = $categories->pluck('name', 'id');
```

### Pagination
Always paginate large datasets:
```php
// GOOD
$posts = Post::paginate(15);

// BAD (for large tables)
$posts = Post::all();
```

## Accessibility

EUIKit components are built with accessibility in mind:
- Proper label/input associations (for/id attributes)
- ARIA attributes where appropriate
- Keyboard navigation support
- Semantic HTML structure
- Color contrast compliance

When customizing components, maintain these accessibility features.

## Styling Customization

### Adding Custom Classes
All components accept a `class` attribute:
```blade
<x-euikit::button class="my-custom-class">
    Click Me
</x-euikit::button>

<x-euikit::card class="shadow-lg border-primary" title="Custom Card">
    Content
</x-euikit::card>
```

### Overriding Component Styles
Create custom CSS that targets EUIKit classes:
```css
/* In your app.css */
.euikit-button {
    /* Your custom button styles */
}

.euikit-card {
    /* Your custom card styles */
}
```

## Testing Considerations

When testing views that use EUIKit components:
```php
// Feature test example
public function test_user_can_create_post()
{
    $this->actingAs($user)
        ->post(route('posts.store'), [
            'title' => 'Test Post',
            'body' => 'Test content',
            'category_id' => $category->id,
        ])
        ->assertRedirect(route('posts.index'))
        ->assertSessionHas('success');
}

// View test example
public function test_create_form_displays_correctly()
{
    $categories = Category::factory()->count(3)->create();
    
    $this->actingAs($user)
        ->get(route('posts.create'))
        ->assertOk()
        ->assertSee('Create Post')
        ->assertSee('Category');
}
```

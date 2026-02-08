# Form Components

## `<x-euikit::form>`
Form wrapper that handles CSRF protection and method spoofing.

### Attributes
- `action` (required) - Form submission URL
- `method` - HTTP method (default: `POST`)
- `enctype` - For file uploads, use `multipart/form-data`
- `class` - Additional CSS classes

### Features
- Automatically includes `@csrf` token
- Handles `PUT`, `PATCH`, `DELETE` via method spoofing (`@method`)
- Wraps content in semantic `<form>` element

### Usage
```blade
{{-- Basic form --}}
<x-euikit::form action="{{ route('posts.store') }}">
    <x-euikit::input name="title" label="Title" />
    <x-euikit::button type="submit">Save</x-euikit::button>
</x-euikit::form>

{{-- Update form (PUT method) --}}
<x-euikit::form action="{{ route('posts.update', $post) }}" method="PUT">
    <x-euikit::input name="title" label="Title" :value="$post->title" />
    <x-euikit::button type="submit">Update</x-euikit::button>
</x-euikit::form>

{{-- File upload form --}}
<x-euikit::form action="{{ route('files.store') }}" enctype="multipart/form-data">
    <x-euikit::file name="attachment" label="Upload File" />
    <x-euikit::button type="submit">Upload</x-euikit::button>
</x-euikit::form>
```

---

## `<x-euikit::input>`
Text input field with automatic label, error display, and old value handling.

### Attributes
- `name` (required) - Input name attribute
- `label` (required) - Display label for the field
- `type` - Input type (default: `text`)
  - Common types: `text`, `email`, `password`, `number`, `tel`, `url`, `date`, `time`
- `value` - Default value (use for edit forms)
- `placeholder` - Placeholder text
- `required` - Mark field as required (boolean)
- `disabled` - Disable the input (boolean)
- `readonly` - Make input read-only (boolean)
- `min`, `max` - For number/date inputs
- `step` - For number inputs
- `pattern` - HTML5 validation pattern
- `class` - Additional CSS classes

### Features
- Automatically displays validation errors below field
- Repopulates with `old()` value after validation failure
- Proper label/input association via `for`/`id` attributes
- Required asterisk when `required` is set

### Usage
```blade
{{-- Basic text input --}}
<x-euikit::input name="title" label="Post Title" required />

{{-- Email input --}}
<x-euikit::input 
    name="email" 
    label="Email Address" 
    type="email" 
    placeholder="user@example.com"
    required 
/>

{{-- Number input with constraints --}}
<x-euikit::input 
    name="quantity" 
    label="Quantity" 
    type="number" 
    min="1" 
    max="100" 
    step="1" 
/>

{{-- Edit form with existing value --}}
<x-euikit::input 
    name="title" 
    label="Post Title" 
    :value="$post->title" 
/>

{{-- Password input --}}
<x-euikit::input 
    name="password" 
    label="Password" 
    type="password" 
    required 
/>

{{-- Date input --}}
<x-euikit::input 
    name="published_at" 
    label="Publish Date" 
    type="date" 
/>
```

---

## `<x-euikit::textarea>`
Multi-line text input field.

### Attributes
- `name` (required) - Input name attribute
- `label` (required) - Display label
- `value` - Default value
- `rows` - Number of visible rows (default: `5`)
- `placeholder` - Placeholder text
- `required` - Mark as required (boolean)
- `disabled` - Disable the textarea (boolean)
- `readonly` - Make read-only (boolean)
- `class` - Additional CSS classes

### Features
- Auto-resizes based on `rows` attribute
- Displays validation errors
- Repopulates with `old()` value

### Usage
```blade
{{-- Basic textarea --}}
<x-euikit::textarea name="description" label="Description" />

{{-- Larger textarea --}}
<x-euikit::textarea 
    name="body" 
    label="Post Content" 
    rows="10" 
    required 
/>

{{-- With existing value --}}
<x-euikit::textarea 
    name="notes" 
    label="Notes" 
    :value="$item->notes" 
    rows="8" 
/>

{{-- With placeholder --}}
<x-euikit::textarea 
    name="comments" 
    label="Comments" 
    placeholder="Enter your comments here..." 
/>
```

---

## `<x-euikit::select>`
Dropdown select field with support for simple arrays, associative arrays, and collections.

### Attributes
- `name` (required) - Select name attribute
- `label` (required) - Display label
- `options` (required) - Array or collection of options
- `value` - Pre-selected value
- `placeholder` - First disabled option (e.g., "Select one...")
- `required` - Mark as required (boolean)
- `disabled` - Disable the select (boolean)
- `class` - Additional CSS classes

### Options Format
```php
// Simple array (value = label)
['Option 1', 'Option 2', 'Option 3']

// Associative array (key = value, value = label)
['1' => 'Option 1', '2' => 'Option 2']

// Collection (commonly used with models)
$categories->pluck('name', 'id')  // ['1' => 'Category Name', ...]
```

### Features
- Automatically selects `old()` value or provided `value`
- Displays validation errors
- Supports empty placeholder option

### Usage
```blade
{{-- Simple array options --}}
<x-euikit::select 
    name="status" 
    label="Status"
    :options="['draft', 'published', 'archived']"
/>

{{-- With associative array --}}
<x-euikit::select 
    name="priority" 
    label="Priority"
    :options="['low' => 'Low', 'medium' => 'Medium', 'high' => 'High']"
/>

{{-- With model collection --}}
<x-euikit::select 
    name="category_id" 
    label="Category"
    :options="$categories->pluck('name', 'id')"
    placeholder="Select a category..."
    required
/>

{{-- With pre-selected value (edit form) --}}
<x-euikit::select 
    name="category_id" 
    label="Category"
    :options="$categories->pluck('name', 'id')"
    :value="$post->category_id"
/>

{{-- Multiple select --}}
<x-euikit::select 
    name="tags[]" 
    label="Tags"
    :options="$tags->pluck('name', 'id')"
    multiple
/>
```

---

## `<x-euikit::checkbox>`
Checkbox input with proper label association.

### Attributes
- `name` (required) - Input name attribute
- `label` (required) - Display label
- `value` - Checkbox value (default: `1`)
- `checked` - Whether checked by default (boolean)
- `disabled` - Disable the checkbox (boolean)
- `class` - Additional CSS classes

### Usage
```blade
{{-- Basic checkbox --}}
<x-euikit::checkbox name="active" label="Active" />

{{-- Checked by default --}}
<x-euikit::checkbox 
    name="featured" 
    label="Featured Post" 
    checked 
/>

{{-- With existing value --}}
<x-euikit::checkbox 
    name="active" 
    label="Active" 
    :checked="$item->active" 
/>

{{-- Custom value --}}
<x-euikit::checkbox 
    name="agreement" 
    label="I agree to the terms" 
    value="agreed" 
    required 
/>
```

---

## `<x-euikit::radio>`
Radio button input with label.

### Attributes
- `name` (required) - Input name attribute (same for all radios in group)
- `label` (required) - Display label
- `value` (required) - Radio button value
- `checked` - Whether checked by default (boolean)
- `disabled` - Disable this option (boolean)

### Usage
```blade
{{-- Radio group --}}
<x-euikit::radio name="visibility" label="Public" value="public" checked />
<x-euikit::radio name="visibility" label="Private" value="private" />
<x-euikit::radio name="visibility" label="Draft" value="draft" />

{{-- With existing value --}}
<x-euikit::radio 
    name="status" 
    label="Active" 
    value="active" 
    :checked="$item->status === 'active'" 
/>
<x-euikit::radio 
    name="status" 
    label="Inactive" 
    value="inactive" 
    :checked="$item->status === 'inactive'" 
/>
```

---

## `<x-euikit::file>`
File upload input.

### Attributes
- `name` (required) - Input name attribute
- `label` (required) - Display label
- `accept` - Accepted file types (e.g., `image/*`, `.pdf`)
- `multiple` - Allow multiple file selection (boolean)
- `required` - Mark as required (boolean)
- `class` - Additional CSS classes

### Usage
```blade
{{-- Basic file upload --}}
<x-euikit::file name="document" label="Upload Document" />

{{-- Image only --}}
<x-euikit::file 
    name="avatar" 
    label="Profile Picture" 
    accept="image/*" 
    required 
/>

{{-- Multiple files --}}
<x-euikit::file 
    name="attachments[]" 
    label="Attachments" 
    multiple 
/>

{{-- Specific file types --}}
<x-euikit::file 
    name="resume" 
    label="Resume" 
    accept=".pdf,.doc,.docx" 
/>
```

**Note:** Remember to add `enctype="multipart/form-data"` to the form component.

---

## `<x-euikit::button>`
Button element with consistent styling.

### Attributes
- `type` - Button type: `button`, `submit`, `reset` (default: `button`)
- `variant` - Visual style: `primary`, `secondary`, `danger`, `success`, `warning`, `info` (default: `primary`)
- `size` - Button size: `sm`, `md`, `lg` (default: `md`)
- `disabled` - Disable the button (boolean)
- `class` - Additional CSS classes

### Slot
- Default slot for button text/content

### Usage
```blade
{{-- Submit button --}}
<x-euikit::button type="submit">Save</x-euikit::button>

{{-- Cancel button --}}
<x-euikit::button type="button" variant="secondary">
    Cancel
</x-euikit::button>

{{-- Delete button --}}
<x-euikit::button type="submit" variant="danger">
    Delete
</x-euikit::button>

{{-- Disabled button --}}
<x-euikit::button type="submit" disabled>
    Processing...
</x-euikit::button>

{{-- Small button --}}
<x-euikit::button size="sm" variant="info">
    More Info
</x-euikit::button>

{{-- Button with icon (using slot) --}}
<x-euikit::button type="submit" variant="success">
    <i class="fas fa-save"></i> Save Changes
</x-euikit::button>
```

---

## Form Patterns

### Complete CRUD Form Example
```blade
{{-- Create --}}
<x-euikit::form action="{{ route('posts.store') }}">
    <x-euikit::input name="title" label="Title" required />
    
    <x-euikit::textarea name="body" label="Content" rows="10" required />
    
    <x-euikit::select 
        name="category_id" 
        label="Category"
        :options="$categories->pluck('name', 'id')"
        placeholder="Select category..."
        required
    />
    
    <x-euikit::checkbox name="featured" label="Featured Post" />
    
    <div class="button-group">
        <x-euikit::button type="submit">Create Post</x-euikit::button>
        <x-euikit::button type="button" variant="secondary">Cancel</x-euikit::button>
    </div>
</x-euikit::form>

{{-- Edit --}}
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
    
    <x-euikit::checkbox name="featured" label="Featured Post" :checked="$post->featured" />
    
    <x-euikit::button type="submit">Update Post</x-euikit::button>
</x-euikit::form>

{{-- Delete --}}
<x-euikit::form action="{{ route('posts.destroy', $post) }}" method="DELETE">
    <x-euikit::button type="submit" variant="danger">Delete Post</x-euikit::button>
</x-euikit::form>
```

### Validation Error Display
EUIKit components automatically show validation errors. No additional code needed:

```php
// Controller
$request->validate([
    'email' => 'required|email',
    'password' => 'required|min:8',
]);
```

```blade
{{-- Errors automatically appear below fields --}}
<x-euikit::input name="email" label="Email" type="email" required />
<x-euikit::input name="password" label="Password" type="password" required />
```

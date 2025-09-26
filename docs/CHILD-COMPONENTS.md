# Creating Child Components

In a large application, it can be both necessary and tedious to implement
standards for UI elements. While EUIKit is designed to make this easier by
providing consistent styling throughout its components, you may find it
advantageous to go a step further and create your own components based on the
EUIKit components.

## Example: Buttons

Having consistent buttons is a good example of when you might want to add your
own component. Rather than having a snippet that will do something like:

```
<x-euikit::button type="primary" value="Edit" lefticon="heroicon-o-pencil-square" route="{{ route('thing.edit') }}" />
```

You could instead create your own component:

```
<x-edit-button route="{{ route('thing.edit') }}" />
```

In addition to enforcing standardization, this allows for the changing of all
edit buttons by changing just your child "edit-button" component.

## HOWTO

Laravel and Blade make this process simple. Let's say we do want to create a
standard "Edit" button that will be used througout the site.

1. Create a "/resources/views/components" directory if it doesn't exist already.

2. Create "edit-button.blade.php" within this directory:

```language-blade
<x-euikit::button type="primary" value="Edit" lefticon="heroicon-o-pencil-square" route="{{ $route }}" />
```

3. There is no step 3.

Now, anytime you want to add an edit button to your application, you can use
your new component, knowing the styling will be consistent:

```language-blade
<x-edit-button route="{{ route('thing.edit', $thing) }}" />
```

### Passing parameters up to the parent component

In the example above, notice that the `route` attribute gets passed from child
to parent. Any attribute that you may want to adjust in your child component
will need to be passed up in this way. Consult the [EUIKit
Documentation](https://euikit.eafarris.com/) for the list of attributes that
exist for each component. __NOTE__, however, the more things you change, the
more difficult it becomes to ensure a consistent interface throughout your
applciation. If you're changing multiple attributes, it may not make sense to
use your own child component and revert to using EUIKit directly. That's up to
you, of course.



<div><!-- InsideUIKit Textlist component -->
    @unless($nolabel)
        <label for="{{ $field }}" class="is-small label {{ $errors->has($field) ? 'has-text-danger' : ''}}">
            {{ $label ?: ucfirst($field) }}
        </label>
    @endunless
    <div class="field has-addons" id="{{ $field}}">
        <div class="control">
            <input type="text"
                id="{{ $field }}"
                class="input {{ $errors->has($field) ? 'is-danger' : ''}}"
                placeholder="{{ $placeholder ?: $label ?: ucfirst($field) }}"
                wire:model.debounce.50ms="newitem"
                wire:keydown.prevent.enter="add('{{ $newitem }}')"
                @if ($required) required @endif
                {{ $attributes }}
            />
        </div><!-- control -->
        <div class="control">
            <button wire:click.prevent="add('{{ $newitem }}')" class="button is-primary">
                <span class="icon is-right">
                    <i class="fas fa-plus"></i>
                </span>
            </button>
        </div><!-- .control -->
    </div><!-- field -->
    
    @foreach ($items as $index => $item)
        <div class="field has-addons">
            <input type="hidden" value="{{ $item }}" name="{{ $field }}[{{ $index }}]" />
            <div class="control">
                <input type="text" class="input" disabled value="{{ $item }}" name="{{ $field}}[{{ $index }}]" />
            </div><!-- .control -->
            <div class="control">
                <button wire:click.prevent="remove({{$index }})" class="button is-danger">
                    <span class="icon">
                        <i class="fas fa-minus"></i><!-- .fas fa-minus -->
                    </span><!-- .icon -->
                </button><!-- .button is-danger -->    
            </div><!-- .control -->
        </div><!-- .field has-addons -->
    @endforeach
</div><!-- InsideUIKit Textlist component -->

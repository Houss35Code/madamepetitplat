@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
$maxWidth = [
    'sm'  => 'modal-panel--sm',
    'md'  => 'modal-panel--md',
    'lg'  => 'modal-panel--lg',
    'xl'  => 'modal-panel--xl',
    '2xl' => 'modal-panel--2xl',
][$maxWidth];
@endphp

<div
    x-data="{
        show: @js($show),
        focusables() {
            let selector = 'a, button, input:not([type=\'hidden\']), textarea, select, details, [tabindex]:not([tabindex=\'-1\'])'
            return [...$el.querySelectorAll(selector)]
                .filter(el => ! el.hasAttribute('disabled'))
        },
        firstFocusable() { return this.focusables()[0] },
        lastFocusable() { return this.focusables().slice(-1)[0] },
        nextFocusable() { return this.focusables()[this.nextFocusableIndex()] || this.firstFocusable() },
        prevFocusable() { return this.focusables()[this.prevFocusableIndex()] || this.lastFocusable() },
        nextFocusableIndex() { return (this.focusables().indexOf(document.activeElement) + 1) % (this.focusables().length + 1) },
        prevFocusableIndex() { return Math.max(0, this.focusables().indexOf(document.activeElement)) -1 },
    }"
    x-init="$watch('show', value => {
        if (value) {
            document.body.classList.add('overflow-y-hidden');
            {{ $attributes->has('focusable') ? 'setTimeout(() => firstFocusable().focus(), 100)' : '' }}
        } else {
            document.body.classList.remove('overflow-y-hidden');
        }
    })"
    x-on:open-modal.window="$event.detail == '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail == '{{ $name }}' ? show = false : null"
    x-on:close.stop="show = false"
    x-on:keydown.escape.window="show = false"
    x-on:keydown.tab.prevent="$event.shiftKey || nextFocusable().focus()"
    x-on:keydown.shift.tab.prevent="prevFocusable().focus()"
    x-show="show"
    class="modal-wrapper"
    style="display: {{ $show ? 'block' : 'none' }};"
>
    <div
        x-show="show"
        class="modal-backdrop"
        x-on:click="show = false"
        x-transition:enter="modal-transition-fade-enter"
        x-transition:enter-start="modal-fade-start"
        x-transition:enter-end="modal-fade-end"
        x-transition:leave="modal-transition-fade-leave"
        x-transition:leave-start="modal-fade-end"
        x-transition:leave-end="modal-fade-start"
    >
        <div class="modal-backdrop__bg"></div>
    </div>

    <div
        x-show="show"
        class="modal-panel {{ $maxWidth }}"
        x-transition:enter="modal-transition-panel-enter"
        x-transition:enter-start="modal-panel-start"
        x-transition:enter-end="modal-panel-end"
        x-transition:leave="modal-transition-panel-leave"
        x-transition:leave-start="modal-panel-end"
        x-transition:leave-end="modal-panel-start"
    >
        {{ $slot }}
    </div>
</div>
<button {{ $attributes->merge(['type' => 'submit', 'class' => 'postBtn', 'onclick' => 'openPostModal()']) }}>
    {{ $slot }}
</button>

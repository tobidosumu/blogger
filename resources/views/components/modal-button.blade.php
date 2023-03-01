<button {{ $attributes->merge(['type' => 'submit', 'class' => 'postBtn border-0', 'id' => 'postBtnWrapper']) }}>
    {{ $slot }}
</button>
